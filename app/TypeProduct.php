<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class TypeProduct extends Model
{
    protected $table = "type_products";

    protected $fillable = ['name', 'description'];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
