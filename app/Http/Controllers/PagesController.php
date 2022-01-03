<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class PagesController extends BaseController
{
    public function Index()
    {
        $categories = DB::table('categories')
                            ->join('images', 'images.id', '=', 'categories.logo_image')
                            ->get();
        $orderDetail = DB::table('order_details')
                            ->select('product_id', DB::raw('SUM(quantity) as total'))
                            ->groupBy('product_id')
                            ->orderBy('total', 'desc')
                            ->take(10);
        $topSaleProducts = DB::table('products')
                            ->joinSub($orderDetail, 'order_detail', function($join){
                                $join->on('products.id', '=', 'order_detail.product_id');
                            })
                            ->join('images', 'images.id', '=', 'products.id_image')
                            ->get();
        $topNewProducts = DB::table('products')
                            ->orderBy('create_at', 'desc')
                            ->join('images', 'images.id', '=', 'products.id_image')
                            ->take(10)
                            ->get();
        return view('users.mainLayoutUser', [
            'categories' => $categories,
            'topNewProducts' => $topNewProducts,
            'topSaleProducts' => $topSaleProducts
        ]);
    }
}
