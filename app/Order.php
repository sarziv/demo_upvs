<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_name', 'user_id', 'tech_id','order_status_id','start_time','end_time'
    ];
}
