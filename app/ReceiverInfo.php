<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bill;

class ReceiverInfo extends Model
{
    protected $table = "receiver_info";

    protected $fillable = ['phone', 'address_receive', 'note'];
   
    public function bill()
    {
        return $this->hasOne(Bill::class);
    }
}
