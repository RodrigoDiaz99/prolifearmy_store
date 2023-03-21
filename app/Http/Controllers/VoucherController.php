<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Voucher;
use App\Models\ProductList;
use App\Models\InventoryProduct;
use App\Models\DeliveryData;
use App\Models\User;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $voucher = Voucher::all();
        return view('voucher.index', compact('voucher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voucher = new Voucher();
        $totalCart = 0;
        $delivery_id = DeliveryData::find(auth()->user()->id)->latest()->first();
        $ShoppingCart = ShoppingCart::where('user_id', auth()->user()->id)->get();
        $LastUserShoppingCart = ShoppingCart::where('user_id', auth()->user()->id)->latest();

        $ProductList = ProductList::where('list_id',  $LastUserShoppingCart->first()->list_id)->get();
         foreach ($ProductList as $row) {
            $salePrice = InventoryProduct::select('sale_price')->where('product_id', $row->product_id)->first()->sale_price;
            $totalCart = $totalCart + $salePrice;
        }

        $voucher->user_id = auth()->user()->id;
        $voucher->delivery_id = $delivery_id->id;
        $voucher->expense = $totalCart;
        $voucher->list_id = $ProductList->first()->list_id;
        $voucher->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function status($id){




    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();
        return back()->with('Success', 'Se elimino correctamente');
    }
}
