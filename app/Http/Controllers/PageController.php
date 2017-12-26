<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\TypeProduct;
use App\User;
use Hash;
use Auth;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product = Product::where('status', 1)->paginate(4);
        $sanpham_khuyenmai = Product::where('discount','<>',0)->paginate(4);

        $count_product_new = Product::where('status', 1)->count();
        $count_sanpham_khuyenmai = Product::where('discount','<>',0)->count();

        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai', 
            'count_product_new', 'count_sanpham_khuyenmai'));
    }

    public function getLoaiSp($type){
        $sp_theoloai = Product::where('type_product_id',$type)->get();
        $sp_khac = Product::where('type_product_id','<>',$type)->paginate(3);
        $loai = TypeProduct::all();
        $loap_sp = TypeProduct::where('id',$type)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loap_sp'));
    }

    public function getChitiet(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('type_product_id',$sanpham->type_product_id)->take(6)->get();
        $new_product = Product::where('status', 1)->get(); //dd($new_product);
    	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','new_product'));
    }

    public function getLienHe(){
    	return view('page.lienhe');
    }

    public function getGioiThieu(){
    	return view('page.gioithieu');
    }

    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')->orWhere('unit_price',$req->key)->get();
        return view('page.search',compact('product')); // truyen du lieu ve co ten la product
    }    
}
