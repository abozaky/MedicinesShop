@extends('layouts.front')

@section('content')

     <!-- Start Book_it_now Page -->
<div class="container" >

       @foreach($Medicine_Info as $Book_Info)
      <div class="row my-5">
        <div class="col-md-6 ">
          <img src="{{  asset('upload_img_medicines/' . $Book_Info['image']) }}" class="img-fluid" alt="Responsive image">
        </div>
        <div class="col-md-6">
          <h3 class="text-danger" >{{$Book_Info['Medicine_Name']}}</h3>
          <h6 class="text-secondary">Medicine Description :</h6>
          <p class="text-info">{{$Book_Info['description']}}</p>
         <h6 class="text-success"><span class="text-secondary" >Category : </span>{{$Book_Info['Categories']}}</h6>
         <h6 class="text-success"><span class="text-secondary" >Price : </span>{{$Book_Info['price']}} LE</h6>
         <h6 class="text-success"><span class="text-secondary" >PharmacyName : </span>{{$Book_Info['PharmacyName']}}</h6>
         <h6 class="text-success"><span class="text-secondary" >Medicine City : </span>{{$Book_Info['City']}}</h6>
         <h6 class="text-success"><span class="text-secondary" >Address : </span>{{$Book_Info['Address']}}</h6>
         <h6 class="text-success"><span class="text-secondary" >Quantity : </span>{{$Book_Info['Quantity']}}</h6>
         <h6 class="text-success"><span class="text-secondary" >DrMobile : </span>{{$Book_Info['DrMobile']}}</h6>
        </div>
      </div>
       @endforeach
       <hr>
    <div class="my-5">

        <h2 class="text-left section_header mb-5 "><span class="  ">Book It Now</span></h2>
           @if (Session('success'))
                <h5 id="test" class="alert alert-primary text-center " role="alert">
                 {{ Session('success') }}
                </h5>

           @endif
        <form method="post" action="{{ route('StorOrder') }}">
          @csrf
            <input type="hidden" name="Medicine_id" value="{{$Book_Info['id']}}">
            <input type="hidden" name="order_name" value="{{$Book_Info['Medicine_Name']}}">
            <input type="hidden" name="price" value="{{$Book_Info['price']}}">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Username</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="{{Auth::user()->name}}" readonly></>

                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Email</label>
                    <input type="email" class="form-control" id="inputPassword4" placeholder="{{Auth::user()->email}}" readonly></>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Order Name</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="{{$Book_Info['Medicine_Name']}}" readonly></>

                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Price</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="{{$Book_Info['price']}} LE" readonly></>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Mobile Number</label>
                    <input type="number" class="form-control" id="inputPassword4" placeholder="Your Phone Number" name="mobile" required></>
                    @error('mobile')
                             <label class="text-danger"> {{ $message }}</label>
                        @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="inputPassword4">Card/Passport Number</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Card Number for Check on receipt" name="card_number" required></>
                    @error('card_number')
                             <label class="text-danger"> {{ $message }}</label>
                        @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleFormControlSelect1">Select Quantity Qunatity</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="Quantity">
                      @for ($i = 1; $i <= $Book_Info['Quantity']; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                      @endfor
                       
                    </select>
                        @error('Quantity')
                             <label class="text-danger"> {{ $message }}</label>
                        @enderror
                </div>
                
                 <label class="text-danger"> Maximum time to receive the Order : 24H  </label>
            </div>

            <button type="submit" class="btn btn-info">Save Order</button>
        </form>
        <hr>
            <h3>All Orders</h3>
        @if( isset($Orders) )
            @foreach($Orders as $order)
                <div class="alert alert-success my-3" role="alert">
                  <h4 class="alert-heading">{{$order['order_name']}}</h4>
                  <hr>
                  <p class="mb-0">
                        UserName :
                       <span class="text-info">{{$order['order_username']}} </span> | 
                       Quntity : 
                       <span class="text-info">{{$order['Quantity']}} </span> | Total Price : 
                       <span class="text-info">{{$order['total']}} LE</span> | Max Recive Date : 
                       <span class="text-info">{{$order['order_expired_deliver']}}</span> | 

                       

                       @if(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Carbon\Carbon::now(), 'Africa/Cairo') > $order['order_expired_deliver'] and $order['order_status'] == 0)

                            Status : <span class="text-danger">

                             {{"Order Canceled"}}

                                    </span>

                       @elseif( $order['order_status'] == 1 )

                            Status : <span class="text-success">
                            
                             {{"Order Done"}}
                            
                                    </span>
                        @elseif(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Carbon\Carbon::now(), 'Africa/Cairo') <= $order['order_expired_deliver'] and $order['order_status'] == 0)

                            Status : <span class="text-info">
                            
                             {{"Order Waiting"}}
                            
                                    </span>
                       
                       @endif
                 </p>
                </div>
            @endforeach
        @endif
        
    </div>

</div>  


     <!-- End Book_it_now Page -->

@endsection