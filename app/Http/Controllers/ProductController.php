<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getList(){
    	$product = Product::all();
    	return view('admin.product.list',['product' => $product]);
    }

    public function getAdd(){
    	return view('admin.product.add');
    }

    public function postAdd(Request $req){
    	$this->validate($req,
            [
                'name'=>'required|unique:products,name|min:2|max:100',
                //'name'=>'required|min:2|max:100|'
                'id_type'=>'required',
                'unit_price'=>'required',
                'image'=>'required',
                'new'=>'required',
            ],
            [
                'name.required'=>'Vui lòng nhập tên sản phẩm.',
                'id_type.required'=>'Vui lòng nhập loại sản phẩm.',
                'unit_price.required'=>'Vui lòng nhập giá sản phẩm.',
                'image.required'=>'Vui lòng chọn ảnh của sản phẩm.',
                'new.required'=>'Bạn chưa nhập trạng thái sản phẩm. Vui lòng nhập 1 nếu là sản phẩm mới hoặc 0 là sản phẩm cũ.',
                'name.unique' => 'Tên sản phẩm đã tồn tại.',
                'name.min'=>'Tên sản phẩm chứa ít nhất 2 kí tự.',
                'name.max'=>'Tên sản phẩm không quá 100 kí tự.'
            ]
        );
        $product = new Product;
        $product->name = $req->name;
        $product->id_type = $req->id_type;
        $product->description = $req->description;
        $product->content = $req->content;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->image = $req->image;
        $product->unit = $req->unit;
        $product->new = $req->new;
        $product->created_at = $req->created_at;

        $product->save();
        return redirect()->back()->with('thanhcong','Thêm sản phẩm thành công');
    }

    public function getEdit($id){
    	$product = Product::find($id);
    	return view('admin.product.edit', ['product'=>$product]);
    }

    public function postEdit(Request $req, $id){
    	$product = Product::find($id);
    	$this->validate($req,
    	// mang chua loi
    	[
    		'name'=>'required|unique:products,name|min:2|max:100',
    	],

    	// mang chua thong bao loi
    	[
    		'name.required' =>'Bạn chưa nhập tên sản phẩm',
    		'name.unique' => 'Tên sản phẩm đã tồn tại',
    		'name.min'=>'Tên sản phẩm chứa ít nhất 2 kí tự.',
            'name.max'=>'Tên sản phẩm không quá 100 kí tự.'
    	]);

    	$product = new Product;
    	$product->name = $req->name;
        $product->id_type = $req->id_type;
        $product->description = $req->description;
        $product->content = $req->content;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->image = $req->image;
        $product->unit = $req->unit;
        $product->new = $req->new;
        $product->created_at = $req->created_at;
    	$product->save();

    	return redirect('admin/product/edit/'.$id)->with('thanhcong','Sửa sản phẩm thành công');
    }

    public function getDelete($id){
    	$product = Product::find($id);
    	$product->delete();

    	return redirect('admin/product/list')->with('thanhcong','Xóa sản phẩm thành công');
    }

}
