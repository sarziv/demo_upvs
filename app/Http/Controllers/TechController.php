<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TechController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        if (Auth::user()['type'] !== 'tech') {
            redirect('/home');
        }
    }

    public function index()
    {
        return view('layouts.tech.techHome', [
            'assignedOrder' => $this->assignedOrder()['assignedOrder'],
            'orderStatus' => $this->orderStatuses()['orderStatus']
        ]);
    }

    public function assignedOrder(){
        $assignedOrder = DB::table('orders')
            ->join('order_status', 'orders.order_status_id', '=', 'order_status.id')
            ->where('tech_id', '=', Auth::user()['id'])
            ->whereIn('order_status_id',[2,3,4])
            ->select('order_name', 'status','order_status_id')
            ->get();
        return ['assignedOrder' => $assignedOrder];
    }

    public function orderStatuses(){
        $orderStatuses = DB::table('order_status')->select('status')->get();
        return ['orderStatus' => $orderStatuses];
    }
}
