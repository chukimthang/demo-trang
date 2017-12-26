<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TypeProduct;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = ['name', 'description', 'unit_price', 'discount', 'image', 
        'unit', 'status', 'quantity', 'type_product_id'];

    public function type_product()
    {
    	return $this->belongsTo(TypeProduct::class);
    }

    public function bill_details()
    {
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
}
