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
        return view('users.payment.cartDetails')->with([
            "cartList" => $items,
            "totalMoney" => $toalMoney
        ]);
    }

    public function AddItem(Request $request, $productId)
    {
        $product = DB::table('products')
            ->where('id', '=', $productId)
            ->get()->first();

        // Lấy thông tin hình ảnh sản phẩm
        $imageProduct = DB::table('images')
            ->where("id", '=', $product->id_image)
            ->get()->first();
        if ($product->quantity >= 1) {
            \Cart::add([
                'id' => $productId,
                'name' => $product->products_name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => [
                    'image' => $imageProduct->path
                ]
            ]);
            session()->flash("success", "Add product is successful");
            return redirect()->route('cart.list');
        } else {
            session()->flash("failure", "Add product is successful");
            return redirect()->route('cart.list');
        }

    }

    public function DeleteItem(Request $request, $productId)
    {
        \Cart::remove($productId);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function ProcessCheckout(Request $request)
    {
        //Get user current
        $user = auth()->user();

        $userVerify = DB::table('users')
            ->where('id','=',$user->id)
            ->first();
        if($userVerify->email_verified_at==null){
            return redirect()->route('activeRequired');
        }
        //Get data input
        $data = $request->input();
        //Get product in cart
        $items = \Cart::getContent();
        // Get total price
        $toalMoney = \Cart::gettotal();

        $id = DB::table('orders')->insertGetId(
            [
                'total' => $toalMoney,
                'address' => $data['address'],
                'user_id' => $user->id
            ]
        );
        DB::beginTransaction();
        $result = false;
        foreach ($items as $item) {
            DB::table('products')
                ->where('id', $item->id)
                ->decrement('quantity', $item->quantity);
            $result = DB::table("order_details")->insert(
                [
                    "id_order" => $id,
                    "product_id" => $item->id,
                    "quantity" => $item->quantity
                ]
            );
            if($result==true){
                continue;
            }else{
                DB::rollBack();
                session()->flash("failure", "Payment failed");
                break;
            }
        }

        if ($result == true) {
            DB::commit();
            session()->flash("success", "Payment success");
            \Cart::clear();
        }
        return redirect()->route('cart.list');
    }
}
