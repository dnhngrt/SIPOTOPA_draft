<?php

namespace App\Http\Controllers;

use App\PaymentConfirm_model;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class PaymentConfirmController extends Controller
{
    public function index(){
        $payments=PaymentConfirm_model::all();
        return view('frontEnd.payment_confirm',compact('payments'));
    }

    public function list(){
        $menu_active=2;
        $payments=PaymentConfirm_model::all();
        return view('backEnd.orders.paymentconfirmation',compact('menu_active','payments'));
    }

    public function paymentconfirm(Request $request){
        $this->validate($request,[
            'order_id'=>'required|numeric',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:1000'
        ]);

        $input_data=$request->all();

        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $image_file_ext = $image_file->getClientOriginalExtension();
            $image_file_name = date("dmY") . "-" . $input_data['order_id'] . "." . $image_file_ext;
            $image_file_path = "payment-confirm";
            $image_file->storeAs("public/" . $image_file_path, $image_file_name);
            $input_data['image'] = $image_file_name;
        }
        
        PaymentConfirm_model::create($input_data);
        return back()->with('message','Confirmation Successfully!');
    }
}