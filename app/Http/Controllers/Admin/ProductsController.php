<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductsAddRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\TypeProduct;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_products = TypeProduct::all()->pluck('name', 'id');
        $units = config('common.product_unit');
        $status = config('common.product_status');

        return view('admin.product.create', compact('type_products', 'units', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsAddRequest $request)
    {
        $data = $request->only('name', 'unit_price', 'discount', 'quantity', 
            'type_product_id', 'unit', 'description', 'status');

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('upload/images/product');
        $image->move($destinationPath, $name);
        $data['image'] = $name;
        
        Product::create($data);

        return redirect()->route('admin.products.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm sản phẩm thành công'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Không tìm thấy sản phẩm'
            ]);
        }

        $status = config('common.product_status');
        $type_products = TypeProduct::all()->pluck('name', 'id');
        $units = config('common.product_unit');

        return view('admin.product.edit', compact('product', 'type_products', 'units', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsUpdateRequest $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Không tìm thấy sản phẩm'
            ]);
        }

        $this->validate($request, 
            [
                'name' => 'required|unique:products,name,' . $product->id
            ],
            [
                'name.required'=>'Vui lòng nhập tên sản phẩm.',
                'name.unique' => 'Tên sản phẩm đã tồn tại.',
            ]
        );
        
        $data = $request->only('name', 'unit_price', 'discount', 'quantity', 
            'type_product_id', 'unit', 'description', 'status');

        if ($request->file('image')) {
            $name_image = $product->image;
            $path = public_path("upload/images/product/$name_image");

            if(file_exists($path)){
                @unlink($path);
            }

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/images/product');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        } else {
            $data['image'] = $product['image'];
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Sửa sản phẩm thành công'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('admin.products.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Xóa thành công'
            ]);
        }

        $name_image = $product->image;
        $destinationPath = public_path("upload/images/product/$name_image");

        if(file_exists($destinationPath)){
            @unlink($destinationPath);
        }
        
        $product->delete();
        
        return redirect()->route('admin.products.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa bài viết thành công'
        ]);
    }
}
