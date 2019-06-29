@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Users    
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

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>UserName</th>
                  <th>RegDate</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <!-- to fetach array to table from AllusersController -->
                 @foreach($allusers as $user)
                <tr>
                  <td>{{$user['id']}}</td>
                  <td>{{$user['name']}}</td>
                  <td>{{$user['created_at']}}</td>
                  <td>{{$user['email']}}</td>

                  @if($user['role']==0)
                     <td><a class="label label-success" href="{{ route ('changeRole',['id'=> $user['id']
                      ,'role'=> $user['role']] ) }}">Customer</a></td>
                  @elseif($user['role']==1)
                     <td><a class="label label-info" href="{{ route ('changeRole',['id'=> $user['id']
                      ,'role'=> $user['role']] ) }}">pharmacist</a></td>
                  @else
                     <td><a class="label label-primary" href="{{ route ('changeRole',['id'=> $user['id']
                      ,'role'=> $user['role']] ) }}">Admin</a></td>
                  @endif

                  @if($user['RegStatus']==0)
                     <td><a class="label label-warning" href="{{ route ('changeStatus',['id'=> $user['id']
                      ,'regstatus'=> $user['RegStatus']] ) }}">Pending</a></td>
                  @else
                     <td><a class="label label-success" href="{{ route ('changeStatus',['id'=> $user['id']
                      ,'regstatus'=> $user['RegStatus']] ) }}">Approve</a></td>
                  @endif

                  <td> <a class="label label-danger" href="{{ route ('DeleteUser',['id'=> $user['id']]) }}">Delete</a>
                  </td>
                </tr>
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