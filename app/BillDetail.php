<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_details";

    protected $fillable = ['quantity', 'product_id', 'bill_id'];

    public function scopeListProductOrder($query, $billId)
    {
        return $query->where('bill_id', $billId);
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }

    public function bill(){
    	return $this->belongsTo('App\Bill');
    }
}
