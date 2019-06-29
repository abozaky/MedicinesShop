@extends('layouts.front')

@section('content')

            @if(Session('success')) 
                <h5 id="test" class="alert alert-primary text-center m-0" role="alert">
                {{ Session('success') }}
                </h5>
             @elseif(Session('Fail'))   
                <h5 id="test" class="alert alert-danger text-center m-0" role="alert">
                {{ Session('Fail') }}
                </h5>
             @endif
 <!-- Start medicines Page -->
<div class="Medicines container-fluid my-5">
  <div class="row">
    <div class="col-md-3 my-3">
        <!-- start Search Form -->
      <div class="mb-3">
        <form class="form-inline" method="get" action="{{URL('Medicine_Search')}}">
          
          <input class="form-control-sm mr-sm-2 form-control" type="search" placeholder="Medicine Name" aria-label="Search" name="search">
          <button class="btn btn-outline-success my-2 my-sm-0 btn-sm" type="submit">Search</button>
          
        </form>
        <!-- End Search Form -->
      </div>
      
      <div class="card">
        <div class="card-header">
        Categories
        </div>
        <ul class="list-group list-group-flush">
            @foreach($Category_Filter as $Ca_filter)
            <li class="list-group-item"><a href="{{ route('Medicinefilter',['filter'=> $Ca_filter['Category_name'] ] ) }}">{{ $Ca_filter['Category_name'] }}</a> </li>
            @endforeach
        </ul>
      </div>
      <hr>
      <div class="card">
        <div class="card-header">
        Cities
        </div>
        <ul class="list-group list-group-flush">
            @foreach($City_Filter as $Ci_filter)
            <li class="list-group-item"><a href="{{ route('Medicinefilter',['filter'=> $Ci_filter['City'] ] ) }}">{{ $Ci_filter['City'] }}</a> </li>
            @endforeach
        </ul>
      </div>
      <hr>
      <div class="card">
        <div class="card-header">
        Pharmacies
        </div>
        <ul class="list-group list-group-flush">
            @foreach($Pharmacy_Filter as $Pharm_filter)
            <li class="list-group-item"><a href="{{ route('Medicinefilter',['filter'=> $Pharm_filter['PharmacyName'] ] ) }}">{{ $Pharm_filter['PharmacyName'] }}</a> </li>
            @endforeach
        </ul>
      </div>
    </div>
    <div class="col-md-9 my-3">
      <div class="row">
            
          @if( isset($Medicine_filter) )

            <!-- filter by City -->
            @foreach($Medicine_filter as $Medi_filter)
                <div class="col-md-4 mb-3">         
                 <div class="card-deck"> 
                  <div class="card p-2" style="width: 18rem;  ">
                    <img src="{{  asset('upload_img_medicines/' . $Medi_filter['image']) }}" class="img-thumbnail" alt="medicine_image" style="max-height: 8rem;  ">
                    <div class="card-body">
                      <h5 class="card-title text-danger">{{$Medi_filter['Medicine_Name']}}</h5>
                      <h6 class="card-title text-success"><span class="text-secondary" >Price :</span> {{$Medi_filter['price']}} LE</h6>
                      <h6 class="card-title text-success"><span class="text-secondary" >Pharmacy :</span> {{$Medi_filter['PharmacyName']}}</h6>
                      <h6 class="card-title text-success"><span class="text-secondary" >City :</span>{{$Medi_filter['City']}}</h6>
                    </div>
                    <div class="card-body border-top">
                      <a href="{{ route('BookNow',['id'=> $Medi_filter['id'] ]) }}" class="card-link">Book It Now </a>
                    </div>
                   </div>
                  </div>
                </div>
            @endforeach

          @else

            @foreach($All_Medicines as $Medicine)
              <div class="col-md-4 mb-3">         
               <div class="card-deck"> 
                <div class="card p-2" style="width: 18rem;  ">
                  <img src="{{  asset('upload_img_medicines/' . $Medicine['image']) }}" class="img-thumbnail" alt="medicine_image" style="max-height: 8rem;  ">
                  <div class="card-body">
                    <h5 class="card-title text-danger">{{$Medicine['Medicine_Name']}}</h5>
                    <h6 class="card-title text-success"><span class="text-secondary" >Price :</span> {{$Medicine['price']}} LE</h6>
                    <h6 class="card-title text-success"><span class="text-secondary" >Pharmacy :</span> {{$Medicine->Pharmacy()->first()->PharmacyName}}</h6>
                    <h6 class="card-title text-success"><span class="text-secondary" >City :</span> {{$Medicine->Pharmacy()->first()->City}}</h6>
                  </div>
                  <div class="card-body border-top">
                    <a href="{{ route('BookNow',['id'=> $Medicine['id'] ]) }}" class="card-link">Book It Now </a>
                  </div>
                 </div>
                </div>
              </div>
            @endforeach

          @endif
      </div>

          <!-- condition for paggination (search _ filter _ index) -->

          @if( isset($All_Medicines) )

             {{ $All_Medicines->links() }}

          @elseif( isset($Medicine_filter) ) 

             {{ $Medicine_filter->links() }}
      
          @endif  

    </div>
  </div>
</div>

     
     <!-- End medicines Page -->

@endsection