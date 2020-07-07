<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirm_model extends Model
{
    protected $table='payment_confirmation';
    protected $primaryKey='id';
    protected $fillable=['order_id','image'];

}