<?php

namespace App\Http\Controllers;
use App\ProductType;

use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function getList(){
    	$type_product = ProductType::all();
    	return view('admin.type_product.list',['type_product' => $type_product]);
    }

    public function getAdd(){
    	return view('admin.type_product.add');
    }

    public function postAdd(Request $req){
    	$this->validate($req,
            [
                'name'=>'required|unique:type_products,name|min:2|max:100',
                //'name'=>'required|min:2|max:100|'
                //'image'=>'required',
            ],
            [
                'name.required'=>'Vui lòng nhập tên sản phẩm.',
                //'image.required'=>'Vui lòng chọn ảnh của sản phẩm.',
                'name.unique' => 'Tên sản phẩm đã tồn tại.',
                'name.min'=>'Mật khẩu ít nhất 2 kí tự.',
                'name.max'=>'Mật khẩu không quá 100 kí tự.'
            ]
        );
        $type_product = new ProductType;
        $type_product->name = $req->name;
        //$product->id_type = $req->id_type;
        $type_product->save();
        return redirect()->back()->with('thanhcong','Thêm loại sản phẩm thành công');
    }

    // public function getEdit($id){
    // 	$product = Product::find($id);
    // 	return view('admin.product.edit', ['product'=>$product]);
    // }

    // public function postEdit(Request $req, $id){
    // 	$product = Product::find($id);
    // 	$this->validate($req,
    // 	// mang chua loi
    // 	[
    // 		'name'=>'required|unique:products,name|min:2|max:100',
    // 	],

    // 	// mang chua thong bao loi
    // 	[
    // 		'name.required' =>'Bạn chưa nhập tên sản phẩm',
    // 		'name.unique' => 'Tên sản phẩm đã tồn tại',
    // 		'name.min'=>'Mật khẩu ít nhất 2 kí tự',
    //         'name.max'=>'Mật khẩu không quá 100 kí tự'
    // 	]);

    // 	$product = new Product;
    // 	$product->name = $req->name;
    // 	$product->save();

    // 	return redirect('admin/product/edit/'.$id)->with('thanhcong','Sửa sản phẩm thành công');
    // }

    // public function getDelete($id){
    // 	$product = Product::find($id);
    // 	$product->delete();

    // 	return redirect('admin/product/list')->with('thanhcong','Xóa sản phẩm thành công');
    // }

}
