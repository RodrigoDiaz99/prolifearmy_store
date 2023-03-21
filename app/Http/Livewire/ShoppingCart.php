<?php

namespace App\Http\Livewire;

use App\Models\InventoryProduct;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart as ShoppingCartModel;


class ShoppingCart extends Component
{

    protected $listeners = [
        'ShoppingCart:update' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.shopping-cart', [
            'shoppingItems' => ShoppingCartModel::where('user_id', Auth::id())->get(),
        ]);
    }

    public function ItemSum($product) {
        $quantity = ShoppingCartModel::where('product_id', $product)->where('user_id', Auth::id())->get()->first();

        $cantidad = $quantity['quantity'] + 1;
        $total = $cantidad * $quantity['price'];

        if($cantidad <= $quantity->products->inventories->first()->total_count){
            ShoppingCartModel::where('product_id', $product)->where('user_id', Auth::id())->update([
                "quantity" => $cantidad,
                "subtotal" => $total
            ]);
        }
    }

    public function ItemRest($product) {
        $quantity = ShoppingCartModel::where('product_id', $product)->where('user_id', Auth::id())->get()->first();

        $cantidad = $quantity['quantity'] - 1;
        $resta = $quantity['subtotal'] - $quantity['price'];

        if($quantity['quantity'] > 1){
            ShoppingCartModel::where('product_id', $product)->where('user_id', Auth::id())->update([
                "quantity" => $cantidad,
                "subtotal" => $resta
            ]);
        }else {
            ShoppingCartModel::where('product_id', $product)->where('user_id', Auth::id())->delete();
        }
    }
}
