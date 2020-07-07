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
    public function confirm(Request $request){
        $this->validate($request,[
            'order_id'=>'required|numeric',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:1000'
        ]);
        $input_data=$request->all();
        return redirect()->with('message','Confirmation Successfully!');
     }
}