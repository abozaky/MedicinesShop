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
                  <th>Article Title</th>
                  <th >Article Desc</th>
                  <th>Likes</th>
                  <th>Category Name</th>
                  <th>Added By</th>
                  <th>Created_at</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <!-- to fetach array to table from Orders_Controller -->
                 @foreach($All_Articles as $Article)

                <tr>
                  <td>{{$Article['article_id']}}</td>
                  <td>{{$Article['article_title']}}</td>
                  <td><a href="{{ route('single_article_info',['id'=>$Article['article_id'],'cat_id'=>$Article['Arti_Category_id'] ]) }}" >Read more</a></td>
                  <td>{{$Article['article_like']}}</td>
                  <td>{{$Article->Category()->first()->Category_name}}</td>
                  <td>{{$Article->user()->first()->name}}</td>
                  <td>{{$Article['created_at']}}</td>
                  

                  @if($Article['article_status']==0)
                     <td><a class="label label-warning" href="{{ route ('change_Article_Status',['id'=> $Article['article_id']
                      ,'regstatus'=> $Article['article_status']] ) }}">Pending</a></td>
                  @else
                     <td><a class="label label-success" href="{{ route ('change_Article_Status',['id'=> $Article['article_id']
                      ,'regstatus'=> $Article['article_status']] ) }}">Approve</a></td>
                  @endif
                  
                  <td> <a class="label label-danger" href="{{ route ('Delete_Article_Admin',['id'=> $Article['article_id']]) }}">Delete</a>
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