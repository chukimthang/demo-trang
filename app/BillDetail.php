<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_details";

    protected $fillable = ['quantity', 'product_id', 'bill_id'];

    public function product(){
    	return $this->belongsTo('App\Product','id_product','id');
    }

    public function bill(){
    	return $this->belongsTo('App\Bill','id_bill','id');
    }
}
