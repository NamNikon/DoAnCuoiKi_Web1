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

    
    public function removeProduct($id){
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect('admin/product-list');
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
                    ->select('products.*', 'categories.name')
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
                $idProduct = DB::table('products')->insertGetId([
                    'products_name' => $data['name'],
                    'quantity' => $data['quantity'],
                    'price' => $data['price'],
                    'category' => $data['catId'],
                    'id_infomation' => $idInfor,
                ]);

                $lastItem = DB::table('images')
                            ->orderBy('id', 'desc')
                            ->first();
                $folder = $lastItem->id + 1;

                $idImage = 0;

                foreach ($res->file('images') as $img) {

                    $path = $img->store($folder, ['disk' => 'my_files']);

                    $idImage = DB::table('images')
                                ->insertGetId([
                                    'path' => $path,
                                ]);

                    DB::table('image_details_product')->insert([
                        'id_image' => $idImage,
                        'id_product' => $idProduct,
                    ]);
                }
                
                DB::table('products')
                    ->where('id', $idProduct)
                    ->update(['id_image' => $idImage]);
                
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

    public function getPurchages()
    {
        $purchages = DB::table('orders')
                        ->join('order_status', 'order_status.id', '=', 'orders.status_id')
                        ->join('users', 'users.id', '=', 'orders.user_id')
                        ->select('orders.*', 'users.name')
                        ->paginate($this->limit);
        
        $listStatus = DB::table('order_status')->get();

        return view('admin.mainLayout', [
                'purchages' => $purchages,
                'listStatus' => $listStatus,
        ]);
    }

    public function changeStatus(Request $res)
    {
        $data = $res->input();
        DB::table('orders')
            ->where('id', '=', $data['id'])
            ->update(['status_id' => $data['value']]);
    }

    public function statisticDay(Request $res)
    {
        $day = $res->input('value');
        $statistics = DB::table('orders')
                        ->whereDate('orders.create_at', $day)
                        ->get();

        return response()->json(['statistics' => $statistics],200);
    }

    public function statisticMonth(Request $res)
    {
        $month = $res->input('value');
        $year = date("Y");
        $statistics = DB::table('orders')
                        ->whereMonth('orders.create_at', $month)
                        ->whereYear('orders.create_at', $year)
                        ->get();

        return response()->json(['statistics' => $statistics],200);
    }

    public function statisticYear(Request $res)
    {
        $year = $res->input('value');
        $statistics = DB::table('orders')
                        ->whereYear('orders.create_at', $year)
                        ->get();

        return response()->json(['statistics' => $statistics],200);
    }

    public function statisticQuarter(Request $res)
    {
        $number = (int)$res->input('value');
        $year = date("Y");
        
        $statistics = DB::table('orders')
                        ->whereYear('orders.create_at', $year)
                        ->whereMonth('orders.create_at', '1')
                        ->orwhereMonth('orders.create_at', '2')
                        ->orwhereMonth('orders.create_at', '3')
                        ->get();
        switch ($number) {
            case 1:
                $statistics = DB::table('orders')
                    ->whereYear('orders.create_at', $year)
                    ->whereMonth('orders.create_at', '1')
                    ->orwhereMonth('orders.create_at', '2')
                    ->orwhereMonth('orders.create_at', '3')
                    ->get();
              break;
            case 2:
                $statistics = DB::table('orders')
                    ->whereYear('orders.create_at', $year)
                    ->whereMonth('orders.create_at', '4')
                    ->orwhereMonth('orders.create_at', '5')
                    ->orwhereMonth('orders.create_at', '6')
                    ->get();
              break;
            case 3:
                $statistics = DB::table('orders')
                    ->whereYear('orders.create_at', $year)
                    ->whereMonth('orders.create_at', '7')
                    ->orwhereMonth('orders.create_at', '8')
                    ->orwhereMonth('orders.create_at', '9')
                    ->get();
              break;
            case 4:
                $statistics = DB::table('orders')
                    ->whereYear('orders.create_at', $year)
                    ->whereMonth('orders.create_at', '10')
                    ->orwhereMonth('orders.create_at', '11')
                    ->orwhereMonth('orders.create_at', '12')
                    ->get();
              break;
            default:
          }

        
        return response()->json(['statistics' => $statistics],200);
    }

}