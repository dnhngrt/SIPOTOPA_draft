<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail_model extends Model
{
    protected $table='order_detail';
    protected $primaryKey='order_detail_id';
    protected $fillable=['order_detail_id','product_id','product_att_id','quantity','order_id'];

}
