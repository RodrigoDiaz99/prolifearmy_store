<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;
use App\Models\ScoreProduct;
use App\Models\Product;
use App\Models\CommentProduct;
use App\Http\Requests\CommentStore;
use Illuminate\Support\Facades\Mail;
use App\Models\ShoppingCart as Shopping;

//use Mail;
use Illuminate\Http\Request;
use App\Mail\EmailOrder;
use App\Mail\ContactMail;
use App\Models\CategoryProduct;
use App\Models\Colores;
use App\Models\DeliveryData;
use App\Models\User;
use App\Models\ProductList;
use App\Models\SoldProduct;
use App\Models\Talla;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MercadoPago;

class FrontController extends Controller
{

    public function index()
    {
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        $productos = Product::orderBy('id', 'desc')->get()->take(1);

        return view('welcome', compact('productos', 'price'));
    }

    public function show($id)
    {
        $productos = Product::find($id);
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        $comment_products = CommentProduct::where('product_id', $productos->id)->orderBy('comment')->get();
        $categorias = CategoryProduct::orderby('name', 'asc');
        $tallas = Talla::orderBy('talla', 'asc')->get();
        $colores = Colores::orderBy('color', 'asc')->get();
        return view('store.product-detail', compact('productos', 'price', 'comment_products', 'tallas', 'colores', 'categorias'));
    }

    public function indexComment()
    {
        $comment_products = CommentProduct::all();
        return view('store.product-detail', compact('comments'));
    }

    public function createComment()
    {
        $products = Product::orderBy('name', 'ASC')->get();
    }

    public function storeComment(CommentStore $request)
    {
        $comment_products = new CommentProduct();
        $comment_products->comment = $request->comment;
        $comment_products->product_id = $request->product_id;
        $comment_products->user_id = auth()->user()->id;
        $comment_products->save();
        return back();
        return view('store.product-detail', compact('productos', 'price'));
    }

    public function checkout()
    {
        $ShoppingCart = Shopping::where('user_id', Auth::id())->get();
        return view('store.checkout', compact('ShoppingCart'));
    }

    public function payment()
    {
        $shop = Shopping::where('user_id', Auth::id())->get();

        $deliveryCost = DeliveryData::get();

        $to = 0;
        foreach ($shop as $cart) {
            $to += $cart->subtotal;
        }
        $to += $deliveryCost->last()->shipping;

        return view('store.payment', compact('to'));
    }

    public function contact()
    {
        /* $shopingItems = Shopping::where('user_id', auth()->user()->id)->get();*/
        return view('store.contact');
    }

    public function confirm(Request $request)
    {
        MercadoPago\SDK::setAccessToken("TEST-6963721713107031-070300-dcf6791448ca3899b20adb6615093518-226511842");
        //MercadoPago\SDK::setAccessToken("APP_USR-4942454312390960-042305-ef2aaefb8c887d720e6f97ff9ee224f9-235007960");
        $payment = new MercadoPago\Payment();
        $payment->token = $request->MPHiddenInputToken;
        $payment->transaction_amount = (float)$request->MPHiddenInputAmount;
        $payment->installments = (int)$request->installments;
        $payment->payment_method_id = $request->MPHiddenInputPaymentMethod;

        $payer = new MercadoPago\Payer();
        $payer->email = $request->cardholderEmail;

        $payment->payer = $payer;

        $payment->save();

        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );
        echo json_encode($response);

        if ($response['status'] == "approved") {
            $user = User::where('id', auth()->user()->id)->get('email')->first();
            $ShoppingCart = Shopping::where('user_id', Auth::id())->get();

            try {
                DB::beginTransaction();

                $total = 0;
                foreach ($ShoppingCart as $shop) {

                    $sold = SoldProduct::create([
                        'amount' => $shop->quantity
                    ]);

                    //  $shop->product->attach($sold->id);

                    DB::table('sold')->insert([
                        'product_id' => $shop->product_id,
                        'sold_products_id' => $shop->id
                    ]);

                    $total += $shop->subtotal; // sumamos todos los subtotales;
                }

                $productList = ProductList::where('user_id', Auth::id())->get();
                $deliveryCost = DeliveryData::get();

                // Agregamos el precio de envio
                $total = $total + $deliveryCost->last()->shipping;

                // Generamos el voucher;
                Voucher::create([
                    'user_id' => Auth::id(),
                    'expense' => $total,
                    'delivery_id' => $deliveryCost->last()->id,
                ]);

                //Guardamos en score products
                foreach ($ShoppingCart as $sh) {
                    ScoreProduct::create([
                        'user_id' => Auth::id(),
                        //  'product_id' => $sh->id,
                        'total' => $sh->quantity
                    ]);

                    DB::table('score')->insert([
                        'product_id' => $sh->product_id,
                        'score_products_id' => $sh->id
                    ]);
                }

                $folio = Voucher::latest('folio')->first();
                foreach ($ShoppingCart as $sh) {
                    ProductList::create([
                        'quantity' => $sh->quantity,
                        'price' => $sh->price,
                        'subtotal' => $sh->subtotal,
                        'user_id' => Auth::id(),
                        'folio' => $folio->folio
                    ]);

                    // Ajustamos el inventario de cada producto;
                    $inventory = $sh->products->inventories->first()->total_count; // Obtenemos la cantidad que hay en inventario;

                    $rest = ($inventory - $sh->quantity); // Descontamos la cantidad de productos que esta comprando el cliente;

                    // Validamos que el inventario solo tenga números positivos

                    if($rest >= 0){
                        // Actualizamos el inventario en la db;
                        InventoryProduct::where('product_id', $sh->products->id)->first()->update([
                            'total_count' => $rest
                        ]);
                    }else {
                        // NO HACER NADA
                    }

                    DB::table('list')->insert([
                        'product_id' => $sh->product_id,
                        'product_list_id' => $sh->id
                    ]);
                }

                //Limpiamos el carrito por cada usuario
                foreach ($ShoppingCart as $s) {
                    $s->delete();
                }

                DB::commit();

            } catch (\Throwable $th) {
                DB::rollBack();
                return back();
            }

            Mail::to($user->email)->send(new EmailOrder($user));
            return view('store.confirm', compact('response', 'ShoppingCart'));
        } else {
            return back();
        }
    }

    public function shop()
    {
        $productos = Product::all();
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        return view('store.shop', compact('productos', 'price'));
    }

    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->msg,
        ];

        //en teoria todo esta bien jajaj algo tienes mal movido xdxd
        Mail::to('mexicanshop@armyprolife.com')->send(new ContactMail($details));
        return back()->with('Mensaje Enviado', 'Tu mensaje se envio con exito!');
    }
}
