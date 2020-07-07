@extends('backEnd.layouts.master')
@section('title','Report')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('report.index')}}" class="current">Report</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Report List</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Order ID</th>
                        <th>Username</th>
                        <th>Total Transaksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $order)
                        <tr class="gradeC">
                            <td style="vertical-align: middle;">{{$order->created_at}}</td>
                            <td style="vertical-align: middle;">{{$order->id}}</td>
                            <td style="vertical-align: middle;">{{$order->name}}</td>
                            <td style="vertical-align: middle;">{{$order->grand_total}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="/report/cetak_pdf" class="btn btn-primary" >CETAK PDF</a>
            </div>
        </div>
    </div>
@endsection