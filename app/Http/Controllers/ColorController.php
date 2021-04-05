<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Color::latest()->get();
        return view('admin.color.index',compact('data'));
    }
    public function status($type,$id){
        $res=Color::where('id',$id)->update(['status'=>$type]);
               if($res){
                   return redirect()->back()->with('success','Color Updated Successfully');
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
        return view ('admin.color.create');
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
            'color'=>'required|unique:colors,color',
       ]);
       $res= Color::create(['color'=>$request->color]);
       if($res){
           return redirect()->route('color.index')->with('success',"Color Created Successfully");
       }else{
           return redirect()->back()->with('erros','Something went wrong!!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        $data=Color::findOrFail($color->id);
        return view('admin.color.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $request->validate([
            'color'=>'required|unique:colors,color,'.$color->id,
       
        ]);

         $status=Color::where('id',$color->id)->update(['color'=>$request->color]);
         if($status){
            return redirect()->route('color.index')->with('success','Color Updated Successfully');
        }else{
         return redirect()->back()->with('error','Something went wrong!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $res=Color::findOrFail($color->id);
        $status=$res->delete();
        if($status){
            return redirect()->back()->with('success','Color Deleted Successfully');
        }else{
         return redirect()->back()->with('error','Something went wrong!!');
        }
    }
}
