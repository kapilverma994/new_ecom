<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Brand::latest()->get();
       return view('admin.brand.index',compact('data'));
    }
    public function status($type,$id){
 $res=Brand::where('id',$id)->update(['status'=>$type]);
        if($res){
            return redirect()->back()->with('success','Brand Updated Successfully');
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
     return view ('admin.brand.create');
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
           'brand'=>'required|unique:categories,category_name',

       ]);

      $res= Brand::create(['brand_name'=>$request->brand]);
      if($res){
          return redirect()->route('brand.index')->with('success',"Brand Inserted");
      }else{
          return redirect()->back()->with('erros','Something went wrong!!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $data=Brand::findOrFail($brand->id);
        return view('admin.brand.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {

        $request->validate([
            'brand'=>'required|unique:brands,brand_name,'.$brand->id,
            // 'slug'=>'required|unique:categories,slug,'.$brand->id
        ]);

         $status=Brand::where('id',$brand->id)->update(['brand_name'=>$request->brand]);
         if($status){
            return redirect()->route('brand.index')->with('success','Brand Updated Successfully');
        }else{
         return redirect()->back()->with('error','Something went wrong!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

   $res=Brand::findOrFail($id);
   $status=$res->delete();
   if($status){
       return redirect()->back()->with('success','Brand Deleted Successfully');
   }else{
    return redirect()->back()->with('error','Something went wrong!!');
   }
    }
}
