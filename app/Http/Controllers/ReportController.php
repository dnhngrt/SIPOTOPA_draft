<?php

namespace App\Http\Controllers;

use http\Env\Response;
use PDF;
use App\Report_model;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;
use App;
use DB;


class ReportController extends Controller
{
    public function index()
    {
        $menu_active = 5;
        $order = Report_model::all();
        return view('backEnd.report.index', compact('menu_active', 'order'));
    }

    public function cetak_pdf()
    {
        $menu_active = 5;
        set_time_limit(180);
        $order = Report_model::all();
        //$order = DB::table('orders')->select('created_at','id','name','grand_total')->get();
        $pdf = PDF::loadView('backEnd.report.pdf', compact('menu_active', 'order'));
        $pdf->loadView('backEnd.report.pdf', compact('menu_active', 'order'));

        return $pdf->stream('Report.pdf');

        // $pdf = App::make('dompdf.wrapper');
        // dd($pdf->output());
        // return base64_encode($pdf->stream('letter'));
    }

    // trash
    // $path = base_path('public/invoiceOrder.pdf');
    // $pdf->save($path);
    // return response()->download(public_path('./invoiceOrder.pdf'));

    // return PDF::loadFile(public_path().'/invoiceOrder.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');


    // return $pdf->download('invoiceOrder.pdf');

    //        dd($order);
    //        $pdf = PDF::loadView('backEnd.report.pdf',compact('menu_active','order'));
    //        return $pdf->download('report'.'.pdf');
    //        phpinfo();
}
