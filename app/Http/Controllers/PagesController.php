<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class PagesController extends BaseController
{
    public function Index()
    {
        $categories = DB::table('categories')->get();
        $topNewProducts = DB::table('products')
                    ->orderBy('create_at', 'desc')
                    ->take(10)
                    ->get();
        return view('users.mainLayoutUser', [
            'categories' => $categories,
            'topNewProducts' => $topNewProducts
        ]);
    }
}
