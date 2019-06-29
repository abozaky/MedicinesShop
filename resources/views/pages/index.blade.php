@extends('layouts.front')

@section('content')
<small>
  
 @if (Session('success'))

      <h3 id="test" class="alert alert-primary text-center m-0" role="alert">
       {{ Session('success') }}
      </h3>
  @elseif(Session('Fail'))
      
      <h3 id="test" class="alert alert-danger text-center m-0" role="alert">
       {{ Session('Fail') }}
      </h3>

  @endif  

</small>
<!-- Start Home Page -->
<div class="home">
    <div class="background container-fluid m-0">
        <div class="container">
            <div class="bgtitle">
                <div class="tb-mask ">
                    <h1 class="text-center"><span class="">We Provide Total</span></h1>
                </div>
                <div class="tb-warp  ">
                    <h1 class="text-center"><span class="">Health Care Solution</span></h1>
                </div>
                <div class="tb-pragraph ">
                    <p class="text-center mt-5"><span class="">Every day we bring hope to millions of people in Egypt</span></p>
                </div>
            </div>
            <div class="search ">
                <div class="row">
                    <div class="col-10 offset-1">
                        <form class="form-inline align-self-center" method="GET" action="Medicine_Search">
                            <div class="d-flex col-lg-10 ">
                                <input class="searchInput form-control text-center  col-12" name="search" type="search" placeholder="Write Your Medicine" aria-label="Search"></input>
                            </div>
                            <div class=" col-lg-2">
                                <button class="searchInput  rounded-2 col-12" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-4 col-md-12 mt-5 ">
                <div class="choose">
                    <h2 class="mb-3">Why Choose Us?</h2>
                    <a class='theme-button' href="#"><span>Our Team</span></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 mt-5 ">
                <div class="row mb-4">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="items row">
                            <div class="col-2"><i class="far fa-gem fa-2x"></i></div>
                            <div class=" col-10">
                                <h5>Newest Technologies </h5>
                                <p>Consetetur elitr diam nonumy<br></br> eirmod tempor invidunt. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="items row">
                            <div class="col-2"><i class="fas fa-tag fa-2x "></i></div>
                            <div class="col-10">
                                <h5>Fair Prices </h5>
                                <p>At vero eos et accusam ejusto duo<br></br> dolores et ea rebum clita gubergren. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 ">
                        <div class="items row">
                            <div class="col-2"><i class="fas fa-cloud fa-2x"></i></div>
                            <div class="col-10">
                                <h5>Taking Care of Nature </h5>
                                <p>Ut labore et dolore magna erat<br></br> sed diam voluptua. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="items row">
                            <div class="col-2"><i class="fas fa-notes-medical fa-2x "></i></div>
                            <div class="col-10">
                                <h5>High Customer Satisfaction </h5>
                                <p>Nosea takimata sanctus est lorem ipsum dolor sit amet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="article">

        <div class="container">
            <div class="row d-flex justify-content-between">
              @if( isset($latest_Article) )
                @foreach($latest_Article as $Article)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="tie-post card ">
                            <img src="{{  asset('upload_img_medicines/' . $Article['article_image']) }}" class="card-img-top img-thumbnail" alt="..."></>
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ strtoupper($Article['article_title']) }}</h5>
                                <p class="card-text">{!! ucfirst( str_limit( $Article['article_descreption'],800 ) )  !!}</p>
                                <a href="{{ route('single_article_info',['id'=>$Article['article_id'],'cat_id'=>$Article['Arti_Category_id'] ]) }}" class="btn text-info">Read more &#187;</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <a href="{{ route('healthinfo') }}" class="card-link article-btn">All Articles</a>
              @else
              {{"Not Found Articles"}}  
              @endif

        </div>
    </div>
    <div class="gredient">
        <div class="container">
            <div class="section-head pt-5  text-center ">
                <h1>We provide 24/7 customer support.</h1>
                <h3>Please feel free to contact us at (01) 234 5678 for emergency case.</h3>
            </div>

        </div>
    </div>
</div>
<!-- End Home Page -->

@endsection