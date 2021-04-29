<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PtFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(){
        return view('backend/report/index');
    }

    public function generate( Request $request){
        $type       = $request['type'];
        $date_range = $request['date_range'];

        if ($type==='all') {
            $whereType = [['id', '>', 0]];
            $title = 'All patients files';
        } elseif ($type==='present') {
            $whereType = ['active_status' => 1];
            $title = 'Files present in archive';
        } elseif ($type==='death') {
            $whereType = ['is_dead' => 1];
            $title = 'Death patients files';
        } elseif ($type==='issued') {
            $whereType = ['active_status' => 0];
            $title = 'Files not present in archive';
        }




        $endDate = Carbon::now('GMT+6');


        $startOfYear = $endDate->copy()->startOfYear();
        $endOfYear   = $endDate->copy()->endOfYear();



        if ($date_range==='all') {
            $startDate = Carbon::createFromDate(2010, 1, 1);
        } elseif ($date_range==='month') {
            $startDate = Carbon::now('GMT+6')->startOfMonth()->toDateString();
        } elseif ($date_range==='year') {
            $startDate = $startOfYear;
            $endDate = $endOfYear;
        } elseif ($date_range==='range') {
            $startDate = $request['start_date'];
            $endDate = $request['end_date'];
        }

        $dateS = new Carbon($startDate);
        $dateE = new Carbon($endDate);



        //$result = ModelName::whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();


        $data = PtFiles::where($whereType)->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();

        $userId = Auth::user()->employee_id;
        $i = 0;
        $date = Carbon::now('GMT+6');

        $pdf = PDF::loadView('backend/report/all', compact('i', 'data', 'title', 'date', 'userId'));
        return $pdf->stream();
    }



}
