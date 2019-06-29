@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        About US    
        <small>  
          <!-- session to display message from AllusersController -->
          @if (Session('success'))

            <h3 class="label label-success " role="alert">
             {{ Session('success') }}
            </h3>

          @endif  
      </small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">About US</h3>
            </div>
            @if(isset($about_us))
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Created_at</th>
                  <th>Action</th>
                </tr>
               
                <tr>
                  <td>{!! $about_us->id !!}</td>
                  <td>{!! $about_us->created_at !!}</td>
                  <td> <a class="label label-danger" href="{{ route ('DeleteAbout',['id'=> $about_us->id ]) }}">Delete</a>
                  </td>
                <tr> 
               </table>
            </div>
            <!-- /.box-body -->
            @else
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Created_at</th>
                  <th>Action</th>
                </tr>
               
                <tr>
                  <td>#</td>
                  <td>#</td>
                  <td>#</td>
                <tr> 
               </table>
            </div>
            <!-- /.box-body -->
            @endif
          </div>
          <!-- /.box -->
        </div>
      </div>

      <form method="POST" action="{{ route('Store_About_US') }}"  enctype="multipart/form-data">
        @csrf
        <label>First Delete All Data And Then Add New</label>
        <div class="form-group ">
            <textarea id="summernote" name="About_Us" ></textarea>
            @error('About_Us')
                       <label class="text-danger"> {{ $message }}</label>
             @enderror
        </div>
         <button type="submit" class="btn btn-primary mb-4 mt-3">Save</button>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection