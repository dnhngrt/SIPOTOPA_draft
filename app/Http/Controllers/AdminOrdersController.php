<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\Orders_model;
use App\OrderDetail_model;
use App\Products_model;
use App\ProductAtrr_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminOrdersController extends Controller
{
    public function index(){
        $menu_active=2;
        $order=Orders_model::orderBy('created_at','desc')->get();
        return view('backEnd.orders.index',compact('menu_active','order'));
    }

    public function destroy($id)
    {
        $delete=Orders_model::findOrFail($id);
        $delete->delete();
        return back()->with('message','Deleted Success!');
    }

    public function edit($id)
    {
        $menu_active=2;
        $edit_orders=Orders_model::findOrFail($id);
        return view('backEnd.orders.edit',compact('edit_orders','menu_active'));
    }

    public function update(Request $request, $id)
    {
        $update_orders=Orders_model::findOrFail($id);
        $this->validate($request,[
            'address'=>'required|min:5',
            'city'=>'required',
            'state'=>'required',
            'pincode'=>'required',
            'mobile'=>'required|numeric',
        ]);
        //dd($request->all());die();
        $input_data=$request->all();
        if(empty($input_data['status'])){
            $input_data['status']=0;
        }
        $update_orders->update($input_data);
        return redirect()->route('orders.index')->with('message','Updated Success!');
    }

    public function changeStatus($id){
        $order = Orders_model::findOrFail($id);
        $order->update(['order_status' => 'Lunas']);

        $details = $order->details;
        foreach($details as $detail) {
            $product_att = ProductAtrr_model::findOrFail($detail->product_att_id);
            $product_att->stock = $product_att->stock - $detail->quantity;
            $product_att->save();
        }

        $product = Products_model::findOrFail($detail->product_id);

        if ($product_att->stock < 2) {
            $apiURL = "https://eu157.chat-api.com/instance150927/";
            $token = "d73ftd062hym3e1r";

            $message = $product->p_name . " " . $product_att->sku . " " . $product_att->size . " almost sold out.";
            $phone = "6282233231356";

            $data = json_encode(
                array(
                    'chatId' => $phone.'@c.us',
                    'body' => $message
                )
            );

            $url = $apiURL.'sendMessage?token='.$token;

            $options = stream_context_create(
                array('http' =>
                    array(
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/json',
                        'content' => $data
                    )
                )
            );
            $response = file_get_contents($url,false,$options);
            echo $response;
        }

        return redirect()->route('orders.index')->with('message', 'Status for "Order ID ' . $id . '" has updated into "Lunas".');
    }
}