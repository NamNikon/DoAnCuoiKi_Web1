<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AdminController extends BaseController
{
    private $limit = 10;
    public function viewUsers()
    {
        $users = DB::table('users')->paginate($this->limit);
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
                    ->join('categories', 'products.category', '=', 'categories.id')
                    ->orderBy('products.id')
                    ->paginate($this->limit);
        return view('admin.mainLayout', [
            'products' => $products
        ]);
    }

    public function getCategories()
    {
        $categories = DB::table('categories')->get();
        return view('admin.mainLayout', [
            'categories' => $categories
        ]);
    }

    public function addProduct(Request $res)
    {
        $data = $res->input();

        $rule = [
            'name' => 'required',
            'price' => 'required',
            //'about' => 'required',
            'quantity' => 'required',
            //'images' => 'required|min:3'

        ];
        $customMessage = [
            // Tên sản phẩm
            'name.required' => 'Tên sản phẩm không được để trống',
            // Giá
            'price.required' => 'Giá sản phẩm không được để trống',

            // Chi tiết
            //'about.required' => 'Chi tiết sản phẩm không được để trống',
            // Sản phẩm
            'quantity.required' => 'Số lượng sản phẩm không được để trống',
            // Hình ảnh
            // 'images.required' => 'Hình ảnh sản phẩm không được để trống',
            // 'images.min' => 'Hình ảnh tối thiểu phải là 3',
        ];
        $msg = 'test';
        $validator = Validator::make($res->all(), $rule, $customMessage);
        if ($validator->fails()) {
            return redirect('admin/product-add-new')
                ->withInput()
                ->withErrors($validator);
        } else {
            if (count($res->file('images')) >= 3)
            {
                $lastItem = DB::table('images')
                            ->orderBy('id', 'desc')
                            ->first();
                $idImage = $lastItem->id + 1;

                foreach ($res->file('images') as $img) {

                    $path = $img->store($idImage, ['disk' => 'my_files']);

                    DB::table('images')->insert([
                        'path' => $path,
                    ]);
                }

                $idInfor = DB::table('information')
                        ->insertGetId([
                            'CPU' => $data['cpu'],
                            'RAM' => $data['ram'],
                            'ROM' => $data['rom'],
                            'GPU' => $data['gpu'],
                            'SCREEN' => $data['screen'],
                            'Operating_system' => $data['operating_system'],
                            'WEIGHT' => $data['weight'],
                        ]);
                DB::table('products')->insert([
                    'products_name' => $data['name'],
                    'quantity' => $data['quantity'],
                    'price' => $data['price'],
                    'category' => $data['catId'],
                    'id_infomation' => $idInfor,
                ]);
                $msg = "Thêm sản phẩm thành công";
            } else {
                $msg = "Thêm sản phẩm thất bại, số lượng ảnh tối thiểu phải là 3";
            }

            $categories = DB::table('categories')->get();
            return view('admin.mainLayout', [
                'categories' => $categories
            ])->with('msg', "$msg");
        }
    }
}