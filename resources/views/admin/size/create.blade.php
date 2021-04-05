@extends('admin.layouts.master_layout')
@section('title', 'Create Size')
@section('admin_content')
@section('page_active','active')

<div class="container-fluid ">

<h1>Size</h1>
<div class="row mt-5">

    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
          <form action="{{route('size.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Size Name</label>
              <input type="text" name="size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Size" autocomplete="off" required >
                @error('size')
                <span class="text-danger">  {{$message}}</span>

                @enderror

            </div>
            {{-- <div class="form-group">
              <label for="exampleInputPassword1">Slug</label>
              <input type="text" name="slug" class="form-control" id="exampleInputPassword1" placeholder="Slug" autocomplete="off" required>
           @error('slug')
           <span class="text-danger">  {{$message}}</span>

              @enderror
            </div> --}}


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    </div>
</div>
@endsection
