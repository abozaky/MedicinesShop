@extends('layouts.front')

@section('content')

<div class="container">

  @if(Session('fail')) 
      <h5 id="test" class="alert alert-danger text-center " role="alert">
      {{ Session('fail') }}
      </h5>
   @endif

   @if(isset($Edit_Article))

        <div class="head">
          <h4 class="text-left mt-4 mb-4 text-muted">Edit Article</h4>
        </div>
        <form method="POST" action="{{ route('Update_Article',['id'=>$Edit_Article['article_id']]) }}"  enctype="multipart/form-data" >
           @csrf

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Article Name</label>
                    <input type="text" class="form-control"  placeholder="Article Name" name="Article_name" value="{{$Edit_Article['article_title']}}">
                     @error('Article_name')
                           <label class="text-danger"> {{ $message }}</label>
                      @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="Category">

                @foreach( $All_Categories as $Categories )
                    <option value="{{$Categories['Category_id']}}">{{$Categories['Category_name']}}</option>
                @endforeach

                </select>
                @error('Category')
                <label class="text-danger"> {{ $message }}</label>
                @enderror
            </div>
             <div class="custom-file">
               <label class="custom-file-label" for="inputGroupFile01">Choose Article Image</label>
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="Article_image" value="{{$Edit_Article['article_image']}}">
                    @error('Article_image')
                         <label class="text-danger"> {{ $message }}</label>
                    @enderror
             </div>
             <div class="form-group ">
                <label for="exampleFormControlTextarea1">Article Description</label>
                
                <textarea id="summernote" name="Article_desc" >{{$Edit_Article['article_descreption']}}</textarea>
               
                @error('Article_desc')
                           <label class="text-danger"> {{ $message }}</label>
                 @enderror
            </div>
            
                     <!-- auth id using to set column(pharmacy_id) -->
                    <input type="hidden" name="auth_id" value="{{Auth::id()}}">
            <button type="submit" class="btn btn-primary mb-4 mt-3">Edit Article</button>
        </form>
        
   @else

        <div class="head">
          <h4 class="text-left mt-4 mb-4 text-muted">Add New Article</h4>
        </div>
        <form method="POST" action="{{ route('Add_New_Article') }}"  enctype="multipart/form-data" >
           @csrf

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Article Name</label>
                    <input type="text" class="form-control"  placeholder="Article Name" name="Article_name">
                     @error('Article_name')
                           <label class="text-danger"> {{ $message }}</label>
                      @enderror
                </div>
            </div>
             <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="Category">

                @foreach( $All_Categories as $Categories )
                    <option value="{{$Categories['Category_id']}}">{{$Categories['Category_name']}}</option>
                @endforeach

                </select>
                @error('Category')
                <label class="text-danger"> {{ $message }}</label>
                @enderror
            </div>
             <div class="custom-file">
               <label class="custom-file-label" for="inputGroupFile01">Choose Article Image</label>
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="Article_image">
                    @error('Article_image')
                         <label class="text-danger"> {{ $message }}</label>
                    @enderror
             </div>
             <div class="form-group ">
                <label for="exampleFormControlTextarea1">Article Description</label>
                
                <textarea id="summernote" name="Article_desc" ></textarea>
               
                @error('Article_desc')
                           <label class="text-danger"> {{ $message }}</label>
                 @enderror
            </div>

                     <!-- auth id using to set column(pharmacy_id) -->
                    <input type="hidden" name="auth_id" value="{{Auth::id()}}">
            <button type="submit" class="btn btn-primary mb-4 mt-3">Add New Article</button>
        </form>


   @endif;
</div>  
@endsection