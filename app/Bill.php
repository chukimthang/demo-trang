<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bill;
use App\BillDetail;
use App\ReceiverInfo;
use App\User;

class Bill extends Model
{
    protected $table = "bills";

    protected $fillable = ['total', 'status', 'user_id', 'receiver_info_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver_info()
    {
        return $this->belongsTo(ReceiverInfo::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
