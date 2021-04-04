<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Hash::make('admin@123'));
    //     $time=DB::table('admins')->first();
    //    //dd(Carbon::createFromFormat('Y-m-d H:i:s', $time->created_at)->format('Y-m-d'));

    //    // dd($time->created_at);

    //    dd(Carbon::now()->format('Y-m-d')==Carbon::createFromFormat('Y-m-d H:i:s', $time->created_at)->format('Y-m-d'));
        return view('admin.login');
    }
    public function auth(Request $request){
       $email=$request->email;
       $password=$request->password;
  $result=Admin::where(['email'=>$email])->first();
if($result){
 if(Hash::check($password,$result->password)){
$request->session()->put('ADMIN_LOGIN',TRUE);
$request->session()->put('ADMIN_ID',$result->id);
return redirect('admin/dashboard');
}else{
    return redirect()->back()->with('error','Incorrect Password');
}
}else{
    return redirect()->back()->with('error','Access Denied');
}
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       return view('admin.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
