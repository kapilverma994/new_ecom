@extends('admin.layouts.master_layout')
@section('title', 'Create Order')
@section('admin_content')
@section('page_active','active')

<div class="container-fluid ">

<h1>Generate Order</h1>
<div class="row mt-5">

    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
          <form action="{{route('order.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Customer Name</label>
              <input type="text" name="cname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Customer Name" autocomplete="off" required >
                @error('category')
                <span class="text-danger">  {{$message}}</span>

                @enderror

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mobile</label>
              <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Enter Phone" autocomplete="off" required>
           @error('phone')
           <span class="text-danger">  {{$message}}</span>

              @enderror
            </div>
            <div class="form-group">
                <label for="">City</label>
                <input type="text" class="form-control" name="city" value="Bahadurgarh">

            </div>
            <div class="form-group">
                <label for="">Pincode</label>
                <input type="text" class="form-control" name="pincode" value="124507">

            </div>

<div class="form-group">
    <label for="">Enter Address</label>
    <textarea name="cadd" class="form-control" id="" cols="30" rows="4"></textarea>
    @error('cadd')
    <span class="text-danger">  {{$message}}</span>

       @enderror

</div>
<div class="form-group">
    <select name="p_id" class="form-control" id="" required>
        <option value="">Choose Product</option>
        @foreach ( $pro as $p)
        <option value="{{$p->id}}">{{$p->name}}</option>

        @endforeach

    </select>

</div>
<div class="form-group">
    <input type="number" name="qty" class="form-control" min="1" value="1" >

</div>
<div class="form-group">
<input type="text" name="amount" class="form-control" placeholder="Enter Unit  Price" required>

</div>
<div class="form-group">
    <input type="text" name="total_amount" class="form-control" placeholder="Enter Total  Price" required>

    </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    </div>
</div>
@endsection
