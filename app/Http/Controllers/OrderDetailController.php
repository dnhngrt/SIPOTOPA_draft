<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\Orders_model;
use App\OrderDetail_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class OrderDetailController extends Controller
{
    public function index()
    {
        $menu_active = 2;
        $orderdetail = OrderDetail_model::all();
        return view('backEnd.orders.orderdetail', compact('menu_active', 'orderdetail'));
    }

    public function destroy($order_detail_id)
    {
        $delete=OrderDetail_model::findOrFail($order_detail_id);
        $delete->delete();
        return back()->with('message','Deleted Success!');
    }


}