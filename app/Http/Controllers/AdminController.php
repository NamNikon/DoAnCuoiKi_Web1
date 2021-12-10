<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class AdminController extends BaseController
{
    public function viewUsers()
    {
        $users = DB::table('users')->get();
        $roles = DB::table('auth')->get();
        return view('admin.mainLayout', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function removeUser($id){
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('admin/user-manage');
    }

    public function changeRole(Request $res)
    {
        $data = $res->input();
        DB::table('users')
            ->where('id', '=', $data['id'])
            ->update(['role' => $data['value']]);
    }

    public function viewProducts()
    {
        $products = DB::table('products')
                    ->join('information', 'products.id_infomation', '=', 'information.id')
                    ->get();
        return view('admin.mainLayout', [
            'products' => $products
        ]);
    }
}