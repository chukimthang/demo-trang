<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TypeProductsAddRequest;
use App\Http\Controllers\Controller;
use App\TypeProduct;
use App\Product;

class ProductTypesController extends Controller
{
    public function index() 
    {
    	$type_products = TypeProduct::all();

    	return view('admin.type_product.index', compact('type_products'));
    }

    public function create()
    {
    	return view('admin.type_product.create');
    }

    public function store(TypeProductsAddRequest $request){
        $data = $request->only('name', 'description');
        TypeProduct::create($data);

        return redirect()->route('admin.type_products.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm bài viết thành công'
        ]);
    }

    public function edit($id){
    	$type_product = TypeProduct::find($id);

        if (!$type_product) {
            return redirect()->route('admin.type_producs.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Không tìm thấy loại sản phẩm'
            ]);
        }

    	return view('admin.type_product.edit', compact('type_product'));
    }

    public function update(Request $request, $id){
    	$type_product = TypeProduct::find($id);

        if (!$type_product) {
            return redirect()->route('admin.type_products.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Không tìm thấy loại sản phẩm'
            ]);
        }

    	$this->validate($request,
    	[
    		"name"=>"required|min:2|max:100|unique:type_products,name,$id"
    	],
    	[
    		'name.required' =>'Bạn chưa nhập tên loại sản phẩm',
    		'name.unique' => 'Tên loại sản phẩm đã tồn tại',
    		'name.min' => 'Tên loại sản phẩm ít nhất 2 kí tự',
            'name.max' => 'Tên loại sản phẩm không quá 100 kí tự'
    	]);

    	$data = $request->only('name', 'description');
    	$type_product->update($data);

        return redirect()->route('admin.type_products.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Sửa loại sản phẩm thành công'
        ]);
    }

    public function destroy($id){
        $type_product = TypeProduct::find($id);

        if (!$type_product) {
            return redirect()->route('admin.type_products.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Xóa thành công'
            ]);
        }

        $type_product->delete();
        
        return redirect()->route('admin.type_products.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa loại sản phẩm thành công'
        ]);
    }
}
