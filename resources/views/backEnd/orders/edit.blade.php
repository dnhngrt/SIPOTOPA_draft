@extends('backEnd.layouts.master')
@section('title','Edit Orders')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('orders.index')}}">Orders</a> <a href="#" class="current">Edit Orders</a> </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Edit Orders</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{route('orders.update',$edit_orders->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{method_field("PUT")}}
                            <div class="control-group">
                                <label class="control-label">Address :</label>
                                <div class="controls">
                                    <textarea name="address" id="address" rows="3">{{$edit_orders->address}}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">City :</label>
                                <div class="controls">
                                    <textarea name="city" id="city" >{{$edit_orders->city}}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">State :</label>
                                <div class="controls">
                                    <textarea name="state" id="state" >{{$edit_orders->state}}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pincode :</label>
                                <div class="controls">
                                    <textarea name="pincode" id="pincode" >{{$edit_orders->pincode}}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Mobile :</label>
                                <div class="controls">
                                    <textarea name="mobile" id="mobile" >{{$edit_orders->mobile}}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="control-label"></label>
                                <div class="controls">
                                    <input type="submit" value="Update" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.uniform.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/matrix.js') }}"></script>
    <script src="{{ asset('js/matrix.form_validation.js') }}"></script>
    <script src="{{ asset('js/matrix.tables.js') }}"></script>
    <script src="{{ asset('js/matrix.popover.js') }}"></script>
@endsection