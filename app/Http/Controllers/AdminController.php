<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\User;
use App\Order;
use App\OrderDetail;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function index()
    {
        $pizzaa = Pizza::paginate(6);
        return view('admin.admin', compact('pizzaa'));
    }

    // 11. Fungsi Untuk View All User
    public function view_user()
    {
        $users = User::paginate(8);
        return view('admin.alluser', compact('users'));
    }

    public function trans()
    {
    	$orderrr = Order::all();

    	return view('admin.allusertrans', compact('orderrr'));
    }

    public function trans_detail($id)
    {
    	$order = Order::where('id', $id)->first();
    	$order_details = OrderDetail::where('order_id', $order->id)->get();

        return view('admin.usertransdetail', compact('order','order_details'));
    }
}
