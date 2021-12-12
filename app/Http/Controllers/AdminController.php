<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends BaseController
{
    private $limit = 10;
    public function viewUsers()
    {
        $users = DB::table('users')->simplePaginate($this->limit);
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
                    ->simplePaginate($this->limit);
        return view('admin.mainLayout', [
            'products' => $products
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
            //'images.required' => 'Hình ảnh sản phẩm không được để trống',
            //'images.min' => 'Hình ảnh tối thiểu phải là 3',
        ];
        $msg = '';
        $validator = Validator::make($res->all(), $rule, $customMessage);
        if ($validator->fails()) {
            return redirect('admin/product-add-new')
                ->withInput()
                ->withErrors($validator);
        } else {
            DB::table('products')->insert([
                'products_name' => $data['name'],
                'quantity' => $data['quantity'],
                'price' => $data['price'],
            ]);
            // $lastItem = DB::table('Products')->latest()->first();
            // $id_Product = $lastItem->id_product;
            // foreach ($res->file('images') as $img) {
            //     // Cấp quyền lưu file
            //     Cloudder::upload($img->getRealPath(),"" ,array("width"=>200, "height"=>200));


            //     $name = Cloudder::getResult();
            //     DB::table('Image')->insert([
            //         'id_product' => $id_Product,
            //         'image' => $name['url'],
            //     ]);
            // }
            // // Cập nhật avatar mặc định cho sản phẩm
            // $images = DB::table('Image')->where('id_product', '=', $id_Product)->get()->first();
            // DB::table('Products')
            //     ->where('id_product', $id_Product)
            //     ->update(['avatar' => $images->image]);
            $msg = "Thêm sản phẩm thành công";
            // if (count($res->file('images')) >= 3) {
                
            // } else {
            //     $msg = "Thêm sản phẩm thất bại, số lượng ảnh tối thiểu phải là 3";
            // }
            // $categories = DB::table('Categories')->get();
            return view('admin.mainLayout')->with('msg', "$msg");
        }
    }
}