@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Orders    
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
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

      
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Comment Desc</th>
                  <th>Article Name</th>
                  <th>Added By</th>
                  <th>created_at</th>
                  <th>Action</th>
                </tr>
                <!-- to fetach array to table from Orders_Controller -->
                 @foreach($All_Comments as $Comment)

                <tr>
                  <td>{{$Comment['comment_id']}}</td>
                  <td>{{ str_limit( $Comment['comment_descreption'],20 ) }} </td>
                  <td>{{$Comment->Article()->first()->article_title}}</td>
                  <td>{{$Comment->user()->first()->name}}</td>
                  <td>{{$Comment['created_at']}}</td>
              
                  <td> <a class="label label-danger" href="{{ route ('DeleteComment',['id'=> $Comment['comment_id']]) }}">Delete</a>
                  </td>
                <tr>
       
                  @endforeach

       
               </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection