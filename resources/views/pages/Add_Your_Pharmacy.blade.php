@extends('layouts.front')

@section('content')

<div class="container">
  <div class="head">
    <h4 class="text-left mt-4 mb-4 text-muted">Register Your Pharmacy</h4>
  </div>
  <form method="POST" action="{{ route('Add_Your_Pharmacy') }}" >
     @csrf
      <div class="form-row">
          <div class="form-group col-md-12">
              <label for="inputEmail4">Pharmcy Name</label>
              <input type="text" class="form-control"  placeholder="Pharmcy Name" name="pharmacy_name">
               @error('pharmacy_name')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-5">
              <label for="inputState">City</label>
              <select id="inputState" class="form-control" name="City">
                  <option value="Cairo" selected>Cairo</option>
                  <option value="Assiut" >Assiut</option>
                  <option value="Alex" >Alex</option>
              </select>
          </div>
               @error('City')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
      </div>
      <div class="form-group">
          <label for="inputAddress">Addresses</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="Address">
                @error('Address')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
      </div>
      <div class="form-row">
          <div class="form-group col-md-12">
              <label for="inputEmail4">Dr-Mobile</label>
              <input type="number" class="form-control"  placeholder="Your Number" name="DrMobile">
          </div>
                @error('DrMobile')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
      </div>
      <div class="form-row">
          <div class="form-group col-md-12">
              <label for="inputEmail4">Auth ID (Your Pharmacy)</label>
              <input type="number" class="form-control"  placeholder="Your Authentication Number To Check" name="auth_id">
          </div>
                @error('auth_id')
                     <label class="text-danger"> {{ $message }}</label>
                @enderror
      </div>
      <button type="submit" class="btn btn-primary mb-4 mt-3">Send Request</button>
  </form>
</div>  
@endsection