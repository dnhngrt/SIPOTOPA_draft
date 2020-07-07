<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\Orders_model;
use App\OrderDetail_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminOrdersController extends Controller
{
    public function index(){
        $menu_active=0;
        $order=Orders_model::all();
        return view('backEnd.orders.index',compact('menu_active','order'));
    }

    public function destroy($id)
    {
        $delete=Orders_model::findOrFail($id);
        $delete->delete();
        return redirect()->route('orders.index')->with('message','Delete Success!');
    }

    public function edit($id)
    {
        $menu_active=0;
        $categories=Category_model::where('parent_id',0)->pluck('name','id')->all();
        $edit_product=Products_model::findOrFail($id);
        $edit_category=Category_model::findOrFail($edit_product->categories_id);
        return view('backEnd.products.edit',compact('edit_product','menu_active','categories','edit_category'));
    }

    public function changeStatus($id){
        $menu_active=0;
        $update_status=Orders_model::findOrFail($id);
        $request->cstatus;
        $update_status->changeStatus($formInput);
        return view('backEnd.orders.index',compact('menu_active','update_status','request'));
    }
}