@extends('admin.layouts.master_layout')
@section('title', 'Create Coupon')
@section('admin_content')


<div class="container-fluid ">

<h1>Coupon</h1>
<div class="row mt-5">

    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
          <form action="{{route('coupon.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Coupon Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Catgory Name" autocomplete="off" required >
                @error('coupon')
                <span class="text-danger">  {{$message}}</span>

                @enderror

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Code</label>
              <input type="text" name="code" class="form-control" id="exampleInputPassword1" placeholder="Enter code" autocomplete="off" required>
           @error('code')
           <span class="text-danger">  {{$message}}</span>

              @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Value</label>
                <input type="text" name="value" class="form-control" id="exampleInputPassword1" placeholder="Enter value" autocomplete="off" required>
             @error('value')
             <span class="text-danger">  {{$message}}</span>

                @enderror
              </div>


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    </div>
</div>
@endsection
