@extends('frontEnd.layouts.master')
@section('title','Payment Confirmation')
@section('slider')
@endsection
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--confirmation form-->
                    <h2>Payment Confirmation</h2>
                    <form action="{{url('/payment-confirm')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" placeholder="Order Id" name="order_id"/>
                        <input type="file" name="image" id="image"/>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div><!--/confirmation form-->
            </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection