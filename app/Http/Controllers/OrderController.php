<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderdetail;
use App\Item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();
        return view('backend.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        date_default_timezone_set('Asia/Rangoon');

        //Voucher
        $voucher = strtotime(date("h:i:s"));

        //orderdate
        $orderdate = date('Y-m-d');

        //Status
        $status = "order";

        //User_id
        $user_id = 1;

         $validator = validator(request()->all(),[
            'cart' => 'required',
            'address' => 'required',
            'total' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $mycart = request()->cart;
        $address = request()->address;
        $total = request()->total;

        foreach ($mycart as $v) {
            $id = $v['id'];
            $qty = $v['qty'];

            $orderdetail = new Orderdetail;
            $orderdetail->voucherno = $voucher;
            $orderdetail->qty = $qty;
            $orderdetail->item_id = $id;
            $orderdetail->save();
        }

        $order = new Order;
        $order->voucherno = $voucher;
        $order->orderdate = $orderdate;
        $order->total = $total;
        $order->address = $address;
        $order->status = $status;
        $order->user_id = $user_id;
        $order->save();

        return compact('mycart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        $voucherno = $order->voucherno;
        $orderdetails = Orderdetail::all()->where('voucherno',$voucherno);
        $items = [];
        $leno = count($orderdetails);
        for($i = 1; $i < $leno; $i++)
        {
            $items[$i] = $orderdetails[$i]->item; 
        }
        // dd($items);


        return view('backend.order.detail',compact('order','voucherno','orderdetails','items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
