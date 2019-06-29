@extends('layouts.front')

@section('content')

<div class="container">
  <div class="head">
             @if(Session('success')) 
                <h5 id="test" class="alert alert-primary text-center m-0" role="alert">
                {{ Session('success') }}
                </h5>
             @elseif(Session('Fail'))   
                <h5 id="test" class="alert alert-danger text-center m-0" role="alert">
                {{ Session('Fail') }}
                </h5>
             @endif
    <h4 class="text-left mt-4 mb-4 text-muted">Add Medicine To Your Pharmacy</h4>
  </div>
   <!-- add Category -->
  
  <form method="POST" action="{{ route('Add_Your_Category') }}" >
         @csrf
       <div class="form-group">
          <label for="exampleFormControlSelect1">Category</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Medicin Category " name="Category">
          
                @error('Category')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
      </div>
       <button type="submit" class="btn btn-primary mb-4 mt-3">Add Category</button>
  </form>
  <!-- /add Category -->
  <form method="POST" action="{{ route('Add_Your_Medicine') }}"  enctype="multipart/form-data" >
     @csrf

      <div class="form-row">
          <div class="form-group col-md-12">
              <label for="inputEmail4">Medicine Name</label>
              <input type="text" class="form-control"  placeholder="Medicine Name" name="Medicine_name">
               @error('Medicine_name')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
          </div>
      </div>
      <div class="form-group">
          <label for="inputAddress">Medicine Description</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="medicine Description" name="Medicine_desc">
                @error('Medicine_desc')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
      </div>
       <div class="form-group">
          <label for="exampleFormControlSelect1">Choose Category</label>
          <select class="form-control" id="exampleFormControlSelect1" name="Category">
             
             @foreach( $All_Categories as $Categories )
              <option value="{{$Categories['Category_id']}}">{{$Categories['Category_name']}}</option>
              @endforeach
             
          </select>
                @error('Category')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
      </div>
      <div class="form-row">
          <div class="form-group col-md-12">
              <label for="inputEmail4">Quantity</label>
              <input type="number" class="form-control"  placeholder="Quantity" name="Quantity">
          </div>
                @error('Quantity')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
      </div>
      <div class="form-row">
          <div class="form-group col-md-12">
              <label for="inputEmail4">Medicine Price</label>
              <input type="number" class="form-control"  placeholder="Medicine Price" name="Medicine_price">
          </div>
                @error('Medicine_price')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
         </div>
         <div class="custom-file">
           <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                @error('image')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
        </div>
               <!-- auth id using to set column(pharmacy_id) -->
              <input type="hidden" name="auth_id" value="{{Auth::id()}}">
      <button type="submit" class="btn btn-primary mb-4 mt-3">Add Medicine</button>
  </form>
</div>  
@endsection