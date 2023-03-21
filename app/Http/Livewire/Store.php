<?php

namespace App\Http\Livewire;

use App\Models\InventoryProduct;
use Livewire\Component;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\ShoppingCart as ShoppingCartStore;
use Illuminate\Support\Facades\Auth;

class Store extends Component
{
    public function render()
    {
        return view('livewire.store', [
            'products' => Product::all(),
        ]);
    }

    public function AddItem($id) {
        if(Auth::check()){
            $exist = ShoppingCartStore::where('product_id', $id)->where('user_id', Auth::id())->count();
            $price = InventoryProduct::where('product_id', $id)->get('sale_price')->first(); // Obtenemos el precio del producto
    
            if($exist < 1){
    
                ShoppingCartStore::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $id,
                    'quantity' => 1,
                    'price' => $price->sale_price,
                    'subtotal' => $price->sale_price
                ]);
    
                $promotion = Promotion::where('product_id', $id)->get('product_id', 'cash_discount', 'expiration_date')->first(); // Obtenemos la promocion de cada producto
    
                if($promotion != null){
                    $dia = date("d");
                    $mes = date("m");
                    $año = date("y");
    
                    $expiration = explode('-', $promotion['expiration_date']);
    
                    $producId = ShoppingCartStore::latest('id')->first();
    
                    if(($expiration[2] <= $dia) && ($expiration[1] <= $mes) && ($año[0] <= $año)){
                        $discount = ($sale_price * $cash_discount) / 100;
                        $sale_price = $sale_price - $discount;
    
                        ShoppingCart::where('id', $producId->id)->update([
                            'price' => $price->sale_price
                        ]);
    
                    }else{
                       //NOTING
                    }
                }
    
            }else {
                $quantity = ShoppingCartStore::where('product_id', $id)->where('user_id', Auth::id())->get('quantity')->first();
    
                $subtotal = ($quantity['quantity'] + 1)* $price->sale_price; // Calculamos el subtotal por producto
    
                ShoppingCartStore::where('product_id', $id)->update([
                    'quantity' => $quantity['quantity'] + 1,
                    'subtotal' => $subtotal
                ]);
            }
            $this->emit('ShoppingCart:update');
    
            $this->alert('success', 'Agregado al carrito', [
                'position' =>  'center',
                'timer' =>  '4000',
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }else {
            return redirect()->route('login');
        }
    }
}
