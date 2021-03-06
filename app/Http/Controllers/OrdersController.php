<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\Orders_model;
use App\OrderDetail_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index(){
        $session_id=Session::get('session_id');
        $cart_datas=Cart_model::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        $shipping_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
        return view('checkout.review_order',compact('shipping_address','cart_datas','total_price'));
    }

    public function list()
    {
        $order=Orders_model::all();
        return view('backEnd.orders.index',compact('menu_active','orders'));
    }

    public function order(Request $request){
        $session_id=Session::get('session_id');
        $cart_datas=Cart_model::where('session_id',$session_id)->get();  
        $input_data=$request->all();
        $payment_method=$input_data['payment_method'];
        $order=Orders_model::create($input_data);
        foreach($cart_datas as $cart_data){
            $order_detail= new OrderDetail_model;
            $order_detail->product_id=$cart_data->products_id;
            $order_detail->product_att_id=$cart_data->product_att_id;
            $order_detail->quantity=$cart_data->quantity;
            $order_detail->order_id=$order->id;
            $order_detail->save();
        }
        if($payment_method=="COD"){
            return redirect('/cod');
        }else{
            return redirect('/paypal');
        }
    }
    public function cod(){
        $user_order=Orders_model::where('users_id',Auth::id())->first();
        $last_row=DB::table('orders')->orderBy('id', 'DESC')->first();
        return view('payment.cod',compact('user_order','last_row'));
    }
    public function paypal(Request $request){
        $who_buying=Orders_model::where('users_id',Auth::id())->first();
        return view('payment.paypal',compact('who_buying'));
    }


}
