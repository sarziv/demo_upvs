<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        if (Auth::user()['type'] !== 'admin') {
            redirect('/home');
        }

    }

    public function index(){
        return view('layouts.admin.adminHome',
            [
                'orders' => $this->assign()['orders'],
                'techs' => $this->assign()['techs'],
                'processOrders' => $this->process()['processOrders'],
                'ordersChange'=> $this->change()['ordersChange']
            ]);
    }

    public function register(UserRegisterRequest $request)
    {
        $request->validated();
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'type' => $request->get('type'),
        ]);
        $user->save();
        return redirect('/admin')->with('success', 'Account created!');
    }

    public function assign()
    {
        $orders = DB::table('orders')
            ->leftJoin('order_status', 'orders.order_status_id', '=', 'order_status.id')
            ->where('order_status_id','=',1)
            ->select('orders.id','order_status.status','orders.order_name')
            ->get();
        $techs = DB::table('users')->where('type','=','tech')->get();
        return ['orders' => $orders,'techs' => $techs];
    }

    public function assignOrder(Request $request,$orderId){
        $order = Order::findorfail($orderId);
        $validatedData = $request->validate([
            'tech' => 'required']);
        $order->tech_id = $request->get('tech');
        $order->order_status_id = 2;
        $order->save();
        return redirect('/admin')->with('success', 'Order was assigned!');
    }

    public function process(){
        $processOrders = DB::table('orders')
            ->join('order_status', 'orders.order_status_id', '=', 'order_status.id')
            ->join('users', 'orders.tech_id', '=', 'users.id')
            ->whereIn('order_status_id',[2,3])
            ->get();
        return ['processOrders' => $processOrders];
    }

    public function change()
    {
        $ordersChange = DB::table('orders')
            ->leftJoin('order_status', 'orders.order_status_id', '=', 'order_status.id')
            ->leftJoin('users', 'orders.tech_id', '=', 'users.id')
            ->whereIn('order_status_id',[2])
            ->select('orders.id','order_status.status','orders.order_name','users.name')
            ->get();
        $techs = DB::table('users')->where('type','=','tech')->get();
        return ['ordersChange' => $ordersChange];
    }

}
