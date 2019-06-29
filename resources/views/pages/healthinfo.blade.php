@extends('layouts.front')

@section('content')

     <!-- Start health-information Page -->
<section class="health">
  <div class="container">
    @if(Session('success')) 
                <h5 id="test" class="alert alert-primary text-center m-0" role="alert">
                {{ Session('success') }}
                </h5>
    @endif
      <h2 class="text-left section_header mt-5 pb-3 border-bottom ">Latest Article</h2>

   @foreach($All_Articles as $Article)     
     <div class=" row my-3 p-3 border-bottom border-info">
        <div class="col-md-4">
          <a href=""><img src="{{  asset('upload_img_medicines/' . $Article['article_image']) }}" class="img-thumbnail" style="max-height: 13rem; width: 100%; min-height: 13rem; "></></a>
        </div>
        <div class="col-md-8">
          <h5><a href="" class="hover text-dark font-weight-bold">{{ strtoupper($Article['article_title']) }}</a></h5>
          <p>{!! ucfirst( str_limit( $Article['article_descreption'],800 ) )  !!}</p>
          <a href="{{ route('single_article_info',['id'=>$Article['article_id'],'cat_id'=>$Article['Arti_Category_id'] ]) }}" class="btn">Read more &#187;</a>
          <div class="col-12 mt-3">
            <a href="" class="hover text-secondary mr-5"><i class="far fa-clock"></i> {{$Article['created_at']}}</a>
            <a href="" class="hover text-secondary"><i class="fas fa-user"></i> Dr: {{$Article->User()->first()->name}}</a>
          </div>
        </div>
      </div>
   @endforeach  

       {{ $All_Articles->links() }}

  
      
  </div>
</section>
<!-- End health-information Page -->

@endsection