<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\User;
use App\Order;
use App\OrderDetail;
use Auth;

class OrderController extends Controller
{
    /**
     * View Cart Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
 	    $order_details = [];
        
        if(!empty($order))
        {
            $order_details = OrderDetail::where('order_id', $order->id)->get();

        }
        return view('member.viewcart', compact('order', 'order_details'));
    }

    /**
     * Checkout Confirmation
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $order_id = $order->id;
        $order->status = 1;
        $order->update();

        $order_details = OrderDetail::where('order_id', $order_id)->get();
        
        foreach ($order_details as $order_detail) {
            $pizza = Pizza::where('id', $order_detail->pizza_id)->first();
            $pizza->pizza_price = $pizza->pizza_price * $order_detail->quantity;
            $pizza->update();
        }
        
        return redirect('/home')->with('success', 'Pizza Order Checkout Successfully!');  
        //return redirect('history/'.$order_id)->with('success', 'Pizza Order Checkout Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $pizza = Pizza::where('id', $id)->first();
        
        // validasi apabila quantity kurang dari 1
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // check order 
        $check_order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        
        // save to database orders
        if(empty($check_order))
        {   
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->status = 0;
            $order->total_price = 0;
            $order->save();
        }
        
        $new_order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // check order detail
        $check_order_detail = OrderDetail::where('pizza_id', $pizza->id)->where('order_id', $new_order->id)->first();
        
        if(empty($check_order_detail))
    	{
    		$order_detail = new OrderDetail;
	    	$order_detail->pizza_id = $pizza->id;
	    	$order_detail->order_id = $new_order->id;
	    	$order_detail->quantity = $request->quantity;
	    	$order_detail->total_price = $pizza->pizza_price * $request->quantity;
	    	$order_detail->save();
        }
        else
        {
            $order_detail = OrderDetail::where('pizza_id', $pizza->id)->where('order_id', $new_order->id)->first();

    		$order_detail->quantity = $order_detail->quantity + $request->quantity;

    		// price now
    		$new_order_detail = $pizza->pizza_price * $request->quantity;
	    	$order_detail->total_price = $order_detail->total_price + $new_order_detail;
	    	$order_detail->update();
        }

        return redirect('/home')->with('success', 'Pizza Added to the Cart!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pizza = Pizza::where('id', $id)->first();
        
        // validasi apabila quantity kurang dari 1
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // check order 
        $check_order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        
        // save to database orders
        if(empty($check_order))
        {   
            $order->user_id = Auth::user()->id;
            $order->status = 0;
            $order->total_price = 0;
            $order->save();
        }
        
        $new_order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // check order detail
        $check_order_detail = OrderDetail::where('pizza_id', $pizza->id)->where('order_id', $new_order->id)->first();
        
        if(empty($check_order_detail))
    	{
    		$order_detail = OrderDetail::find($id);
	    	$order_detail->pizza_id = $pizza->id;
	    	$order_detail->order_id = $new_order->id;
	    	$order_detail->quantity = $request->quantity;
	    	$order_detail->total_price = $pizza->pizza_price * $request->quantity;
	    	$order_detail->save();
        }
        else
        {
            $order_detail = OrderDetail::where('pizza_id', $pizza->id)->where('order_id', $new_order->id)->first();

    		$order_detail->quantity = $request->quantity;

    		// price now
    		$order_detail->total_price = $pizza->pizza_price * $request->quantity;
	    	$order_detail->update();
        }

        return redirect('/viewcart')->with('success', 'Pizza Quantity Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_detail = OrderDetail::where('id', $id)->first();

        $order = Order::where('id', $order_detail->order_id)->first();
        $order->update();

        $order_detail->delete();

        return redirect('/viewcart')->with('danger', 'Pizza has been deleted from cart!');
    }
}
