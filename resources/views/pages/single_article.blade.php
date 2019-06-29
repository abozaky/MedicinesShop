@extends('layouts.front')

@section('content')

     <!-- Start health-information Page -->
            @if(Session('success')) 
                <h5 id="test" class="alert alert-primary text-center m-0" role="alert">
                {{ Session('success') }}
                </h5>
             @elseif(Session('Fail'))   
                <h5 id="test" class="alert alert-danger text-center m-0" role="alert">
                {{ Session('Fail') }}
                </h5>
             @endif
<!--Main layout-->
<main>
    <div class="container">

        <!--Section: Post-->
        <section class="mt-3">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-8 mb-4">

                    <!-- Breadcrumbs -->
                    <ol class="breadcrumb white z-depth-1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('homepage') }}">Home Page</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('healthinfo') }}">Health Information Articles</a>
                        </li>
                        <li class="breadcrumb-item active">{{$Single_Article->Category()->first()->Category_name}}</li>
                        <li class="breadcrumb-item active">{{ucfirst($Single_Article['article_title']) }}</li>
                    </ol>
                    <!-- Breadcrumbs -->

                    <!-- Featured image -->
                    <img src="{{  asset('upload_img_medicines/' . $Single_Article['article_image']) }}" class="img-fluid z-depth-1-half mb-4" alt="" style="width: 100%;" >

                    <!--Card-->
                    <div class="card mb-4">
                        <!--Card content-->
                        <div class="card-body">
                            <h3 class="font-weight-bold ">{{ucfirst($Single_Article['article_title']) }}</h3>
                            
                            <p>BY <a href="">{{$Single_Article->User()->first()->name}}</a> ON <span class="text-info"> {{$Single_Article['created_at']}}</span> </p>

                            <hr>
                            <blockquote class="blockquote">
                                <p class="mb-0">{!! $Single_Article['article_descreption']  !!}</p>               

                                <a href="{{ route('Article_Like',['like'=>$Single_Article['article_like'], 'id'=>$Single_Article['article_id'] ]) }}" class="btn btn-primary btn-sm">  {{$Single_Article['article_like']}} Like</a>

                                <a href="{{ route('Edit_article',['id'=>$Single_Article['article_id'] ]) }}" class="btn btn-success btn-sm">Edit Article</a>

                                <a href="{{ route('Delete_Article',['id'=>$Single_Article['article_id']]) }}" class="btn btn-danger btn-sm">Delete Article</a>
                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Comments-->
                    <div class="card card-comments mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">{{ count($All_Comments) }} comments</div>
                        <div class="card-body">
                          @foreach($All_Comments as $Comment)
                            <div class="media d-block d-md-flex mt-4">
                                
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <h6 class="mt-0 font-weight-bold">By : <span class="text-info" >{{ strtoupper( $Comment->user()->first()->name ) }}</span>
                                    AT :
                                    <span class="text-info" >
                                    {{$Comment['created_at']}}
                                      
                                    </span> 
                                        
                                    </h6>
                                   {{$Comment['comment_descreption']}}

                                </div>
                            </div>
                            <hr>
                          @endforeach
                        </div>
                    </div>
                    <!--/.Comments-->

                    <!--Reply-->
                    <div class="card mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">Leave a reply</div>
                        <div class="card-body">

                            <!-- Default form reply -->
                            <form method="POST" action="{{ route('Add_New_Comment') }}" >
                                @csrf
                                <!-- Comment -->
                                <div class="form-group">
                                    <label for="replyFormComment">Your comment</label>
                                    <textarea class="form-control" id="replyFormComment" rows="5" name="comment_desc"></textarea>
                                   @error('comment_desc')
                                   <label class="text-danger"> {{ $message }}</label>
                                    @enderror
                                </div>

                                <input type="hidden" name="article_id" value="{{$Single_Article['article_id']}}">
                                <div class="text-center mt-4">
                                    <button class="btn btn-info btn-md" type="submit">Add Comment</button>
                                </div>
                            </form>
                            <!-- Default form reply -->



                        </div>
                    </div>
                    <!--/.Reply-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">

                    <!-- Sticky content -->
                    <div class="sticky">
                        <!--Section: Dynamic Content Wrapper-->
                        <section>
                          <div id="dynamic-content"></div>

                        </section>
                        <!--Section: Dynamic Content Wrapper-->

                        <!--Card-->
                        <div class="card mb-4">

                            <div class="card-header">Related articles</div>

                            <!--Card content-->
                            <div class="card-body">

                                <ul class="list-unstyled">
                                @foreach($Releated_Article as $releat_artic)
                                    <li class="media">
                                        <img style="width: 4rem; min-height: 3rem;" class="d-flex mr-3" src="{{  asset('upload_img_medicines/' . $releat_artic['article_image']) }}">
                                        <div class="media-body">
                                            <a href="{{ route('single_article_info',['id'=>$releat_artic['article_id'],'cat_id'=>$releat_artic['Arti_Category_id'] ]) }}">
                                                <h5 class="mt-0 mb-1 font-weight-bold">{{$releat_artic['article_title']}}</h5>
                                            </a>
                                            
                                                
                                            {!! str_limit($Single_Article['article_descreption'],400 ) 
                                            !!}
                                            
                                        </div>
                                    </li>
                                    <hr>
                                @endforeach
                                </ul>

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!-- Sticky content -->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Post-->

    </div>
</main>
<!--Main layout-->



<!-- End health-information Page -->

@endsection