<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\OAuth2\Server\Exception\UniqueTokenIdentifierConstraintViolationException;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function TodayOrder()
    {
        $today = date('d-m-y');
        $order = DB::table('orders')->where('status', 0)->where('date', $today)->get();

        return view('admin.reoprt.today_order', compact('order'));
    }

    public function TodayDelivery()
    {
        $today = date('d-m-y');
        $order = DB::table('orders')->where('status', 3)->where('date', $today)->get();

        return view('admin.reoprt.today_delivery', compact('order'));
    }

    public function ThisMonth()
    {
        $month = date('F');
        $order = DB::table('orders')->where('status', 3)->where('month', $month)->get();

        return view('admin.reoprt.this_month', compact('order'));
    }

    public function Search()
    {
        return view('admin.reoprt.search');
    }

    public function SearchByYear(Request $request)
    {
        $year = $request->year;

        $total = DB::table('orders')->where('status', 3)->where('year', $year)->sum('total');
        $order = DB::table('orders')->where('status', 3)->where('year', $year)->get();

        return view('admin.reoprt.search_year', compact('total', 'order'));
    }

    public function SearchByMonth(Request $request)
    {
        $month = $request->month;

        $total = DB::table('orders')->where('status', 3)->where('month', $month)->sum('total');
        $order = DB::table('orders')->where('status', 3)->where('month', $month)->get();

        return view('admin.reoprt.search_year', compact('total', 'order'));
    }

    public function SearchByDate(Request $request)
    {
        $date = $request->date;
        $newdate = date('d-m-y', strtotime($date));

        $total = DB::table('orders')->where('status', 3)->where('date', $newdate)->sum('total');
        $order = DB::table('orders')->where('status', 3)->where('date', $newdate)->get();

        return view('admin.reoprt.search_date', compact('total', 'order'));
    }
}
