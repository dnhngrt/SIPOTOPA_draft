@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')
    <div class="container">
        <h3 class="text-center">YOUR ORDER HAS BEEN RECORDED</h3>
        <p class="text-center">Thanks for your Order that use Options on Bank Transfer</p>
        <p class="text-center">This Your Order ID (<b>{{$last_row->id}}</b>)</p>
        <p class="text-center">You can make payments through the following bank</p>
        <div class="category-tab shop-details-tab"><!--Bank-tab-->
            <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#BCA" data-toggle="tab">BCA</a></li>
                        <!--li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li-->
                        <li><a href="#Mandiri" data-toggle="tab">Mandiri</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="BCA" >
                        0852465138464132
                    </div>
                    <div class="tab-pane fade" id="Mandiri" >
                        6521686541385156
                    </div>
                    
                    
        </div>
        <!--p class="text-center">We will contact you by Your Email (<b>{{$user_order->users_email}}</b>) or Your Phone Number (<b>{{$user_order->mobile}}</b>)</p-->
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection