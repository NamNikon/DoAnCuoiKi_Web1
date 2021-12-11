<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function CartDetail()
    {
        $items = \Cart::getContent();
        $toalMoney = \Cart::gettotal();
        return view('users.account.account')->with([
            "cartList" => $items,
            "totalMoney" => $toalMoney
        ]);
    }

    public function AddItem(Request $request, $productId)
    {
        $data = $request->input();
        $product = DB::table('products')
            ->where('id', '=', $productId)
            ->get()->first();

        // Lấy thông tin hình ảnh sản phẩm
        $imageProduct = DB::table('images')
            ->where("id", '=', $product->id_image)
            ->get()->first();

        \Cart::add([
            'id' => $productId,
            'name' => $product->products_name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'image' => $imageProduct->path
            ]
        ]);
        return redirect('payment/cart');

    }

    public function DeleteItem(Request $request, $productId){
        \Cart::remove($productId);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }
}
