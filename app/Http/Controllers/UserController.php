<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        if (Auth::user()['type'] !== 'user') {
            redirect('/home');
        }
    }

    public function index()
    {
        return view('layouts.user.userHome', ['myOrders' => $this->myOrders()['myOrders']]);
    }

    public function myOrders()
    {
        $myOrders = DB::table('orders')
            ->join('order_status', 'orders.order_status_id', '=', 'order_status.id')
            ->where('user_id', '=', Auth::user()['id'])
            ->select('order_name', 'status')
            ->get();
        return ['myOrders' => $myOrders];
    }

    public function create(Request $request)
    {
        $order = new Order([
            'order_name' => $request->get('order'),
            'user_id' => Auth::user()['id'],
            'tech_id' => 0,
            'order_status_id' => 1 ,
            'start_time' => now(),
            'end_time' => now()
        ]);
        $order->save();
        return redirect('/user')->with('success', 'Order was created!');
    }
}
