<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pro=Product::latest()->get();
        return view('admin.order.create',compact('pro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cname'=>'required',
           'phone'=>'required',
           'cadd'=>'required',
           'p_id'=>'required',
           'city'=>'required',
 'qty'=>'required',
           'amount'=>'required',
           'total_amount'=>'required',
        ]);

     $cuser=Customer::create(['name'=>$request->cname,'email'=>$request->email,'phone'=>$request->phone,'address'=>$request->cadd,'city'=>$request->city,'pincode'=>$request->pincode]);


     $gst=12;

    // $res= Order::create(['product_id'=>$request->p_id,'customer_id'=>$cuser->id,'qty'=>$request->qty,'amount'=>$request->amount,'total_amount'=>$request->total_amount,'gst'=>$gst]);

    $order=new Order();

    $order->product_id=$request->p_id;
    $order->customer_id=$cuser->id;
    $order->qty=$request->qty;
    $order->amount=$request->amount;
    $order->total_amount=$request->total_amount;
    $order->gst=$gst;

   $res= $order->save();


    if($res){

           return redirect()->route('order.index')->with('success',"Order Created Successfully");
       }else{
           return redirect()->back()->with('erros','Something went wrong!!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
