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
                            ->select('products.*', 'images.path')
                            ->get();
        $topNewProducts = DB::table('products')
                            ->orderBy('create_at', 'desc')
                            ->join('images', 'images.id', '=', 'products.id_image')
                            ->select('products.*', 'images.path')
                            ->take(10)
                            ->get();
        return view('users.mainLayoutUser', [
            'categories' => $categories,
            'topNewProducts' => $topNewProducts,
            'topSaleProducts' => $topSaleProducts
        ]);
    }

    public function DetailsProduct($pid) {
        $product = DB::table('products')
                            ->where('products.id', $pid)
                            ->take(1)
                            ->get();

        $images_product = DB::table('image_details_product') 
                        ->join('images', 'images.id', '=', 'image_details_product.id_image')
                        ->where('image_details_product.id_product',  $pid)
                        ->get();

        $information = DB::table('information')
                    ->join('products', 'products.id_infomation', '=', 'information.id')
                    ->where('products.id',  $pid)
                    ->get();

        return view('users.products.productDetails', [
            'product' => $product,
            'images_product' => $images_product,
            'information' =>  $information
        ]);
    }

    public function SearchProduct() {
        $key = request()->get('prd');
         
        $products = DB::table('products')
                    ->where('products.products_name', 'like', '%'. $key.'%')
                    ->join('images', 'images.id', '=', 'products.id_image')
                    ->select('products.*', 'images.path')
                    ->get();

        return view('users.search.searchPage', [ 'products'=>$products]);
    }
}
