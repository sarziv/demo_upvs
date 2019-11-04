<?php

namespace App\Http\Controllers;

use App\Order;
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
            'orderInitialize' => $this->orderInitialize()['orderInitialize']
        ]);
    }

    public function complete($orderId){
        $order = Order::findorfail($orderId);
        $order->order_status_id = 3;
        $order->end_time = now();
        $order->save();
        return redirect('/tech')->with('success', 'Order was completed!');
    }

    public function assignedOrder(): array
    {
        $assignedOrder = DB::table('orders')
            ->join('order_status', 'orders.order_status_id', '=', 'order_status.id')
            ->where('tech_id', '=', Auth::user()['id'])
            ->whereIn('order_status_id',[2])
            ->select('orders.id','order_status.status','orders.order_name')
            ->get();
        return ['assignedOrder' => $assignedOrder];
    }


    public function orderInitialize(): array
    {
        $orderInitialize = DB::table('orders')
            ->join('order_status', 'orders.order_status_id', '=', 'order_status.id')
            ->whereIn('order_status_id',[1])
            ->select('orders.id','order_status.status','orders.order_name')
            ->get();
        return ['orderInitialize' => $orderInitialize];
    }

    public function assignOrder($orderId){
        $order = Order::findorfail($orderId);
        $order->tech_id = Auth::user()['id'];
        $order->order_status_id = 2;
        $order->save();

        return redirect('/tech')->with('success', 'Order was assigned!');
    }
}
