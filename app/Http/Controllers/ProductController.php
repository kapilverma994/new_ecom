<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product::latest()->get();
        return view('admin.product.index',compact('data'));
    }
    public function status($type,$id){

        $res=Product::where('id',$id)->update(['status'=>$type]);
        if($res){
            return redirect()->back()->with('success','Product Updated Successfully');
        }else{
            return redirect()->back()->with('error','Oops Something Went Wrong!!');
        }


}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
            'name'=>'required|unique:coupons,name',
            'code'=>'required|unique:coupons,code',
            'value'=>'required'
        ]);
       $res= Product::create(['name'=>$request->name,'code'=>$request->code,'value'=>$request->value]);
       if($res){
           return redirect()->route('coupon.index')->with('success',"Coupon Created Successfully");
       }else{
           return redirect()->back()->with('erros','Something went wrong!!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data=Coupon::findOrFail($coupon->id);
        return view('admin.coupon.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([

            'name'=>'required|unique:coupons,name,'.$coupon->id,
            'code'=>'required|unique:coupons,code,'.$coupon->id,
            'value'=>'required'
        ]);

        $status=Coupon::where('id',$coupon->id)->update(['name'=>$request->name,'code'=>$request->code,'value'=>$request->value]);
        if($status){
           return redirect()->route('coupon.index')->with('success','Coupon Updated Successfully');
       }else{
        return redirect()->back()->with('error','Something went wrong!!');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $res=Coupon::findOrFail($coupon->id);
        $status=$res->delete();
        if($status){
            return redirect()->back()->with('success','Coupon Deleted Successfully');
        }else{
         return redirect()->back()->with('error','Something went wrong!!');
        }
    }
}
