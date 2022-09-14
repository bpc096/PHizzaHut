<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $table = "pizzas";

    protected $fillable = [
        'pizza_name', 'pizza_price', 'pizza_description', 'pizza_image'
    ];

    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail', 'pizza_id', 'id');
    }
}
