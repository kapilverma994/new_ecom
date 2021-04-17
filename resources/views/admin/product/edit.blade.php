@extends('admin.layouts.master_layout')
@section('title', ' Create Product')
@section('admin_content')


<div class="container-fluid ">

<h1>Product</h1>
<div class="row mt-5">

    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
          <form action="{{route('product.edit',$data->id)}}" method="post">
            @csrf
   @method('PUT')
            <div class="form-group">
              <label for="exampleInputEmail1"> Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Product Name" value="{{$data->name}}" autocomplete="off" required >
                @error('name')
                <span class="text-danger">  {{$message}}</span>

                @enderror

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Image</label>
              <input type="file" name="image" value="{{$data->image}}" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
           @error('image')
           <span class="text-danger">  {{$message}}</span>

              @enderror
            </div>
            <div class="row">


            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Category</label>

             @error('category')
             <span class="text-danger">  {{$message}}</span>

                @enderror
                <select name="category" class="form-control" id="" required>
                  <option value="">Choose Category</option>
                  @foreach($cats as $cat)
<option value="{{$cat->id}}" {{(($data->category_id==$cat->id)? 'selected' : '')}} >{{$cat->category_name}}</option>
@endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Brand</label>
                <input type="text" name="brand" class="form-control" value="{{$data->brand_id}}" id="exampleInputPassword1" placeholder="Enter brand" autocomplete="off" required>
             @error('brand')
             <span class="text-danger">  {{$message}}</span>

                @enderror
              </div>
            </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Keywords </label>
                <input type="text" name="keyword" value="{{$data->keywords}}" class="form-control" id="exampleInputPassword1" placeholder="Enter keyword" autocomplete="off" required>
             @error('keyword')
             <span class="text-danger">  {{$message}}</span>

                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Uses </label>
                <input type="text" name="uses" value="{{$data->uses}}" class="form-control" id="exampleInputPassword1" placeholder="Enter uses" autocomplete="off" required>
             @error('uses')
             <span class="text-danger">{{$message}}</span>

                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Warranty </label>
                <input type="text" name="warranty" value="{{$data->warranty}}" class="form-control" id="exampleInputPassword1" placeholder="Enter warranty" autocomplete="off" required>
             @error('warranty')
             <span class="text-danger">  {{$message}}</span>

                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Short Description</label>
      <textarea name="short_desc" class="form-control" id="" cols="30" rows="5">{{$data->short_desc}}</textarea>
             @error('short_desc')
             <span class="text-danger">  {{$message}}</span>

                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
      <textarea name="description" class="form-control" id="" cols="30" rows="8">{{$data->description}}</textarea>
             @error('description')
             <span class="text-danger">  {{$message}}</span>

                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Specification</label>
      <textarea name="tech_spec" class="form-control" id="" cols="30" rows="8">{{$data->tech_spec}}</textarea>
             @error('tech_spec')
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
