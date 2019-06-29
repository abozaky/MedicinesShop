@extends('dashboard.layout.admin')

@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $Count_Users->count() }}</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion-person-add"></i>
            </div>
            <a href="{{ route('admin.Users') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $Count_Pharmacy->count() }}<sup style="font-size: 20px"></sup></h3>

              <p>All Pharmacies</p>
            </div>
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <a href="{{ route('admin.pharmacies') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>{{ $Count_Medicines->count() }}</h3>

              <p>All Medicines</p>
            </div>
            <div class="icon">
              <i class="fa fa-heartbeat"></i>
            </div>
            <a href="{{ route('admin.medicine') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $Count_Orders->count() }}</h3>

              <p>All Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-first-order"></i>
            </div>
            <a href="{{ route('admin.orders') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <!-- ./col -->
        <div class="col-lg-3 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $Count_Articles->count() }}</h3>

              <p>All Articles</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="{{ route('admin.articles') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <!-- ./col -->
        <div class="col-lg-3 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{ $Count_Comments->count() }}</h3>

              <p>All Comments</p>
            </div>
            <div class="icon">
              <i class="fa fa-comments"></i>
            </div>
            <a href="{{ route('admin.comments') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
    <!-- border table -->
    <section class="content" >
      
      <div class="row" >
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">latest Users</h3>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tbody>
                 <tr>
                  <th>ID</th>
                  <th>UserName</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                @foreach($All_Users as $user)
                <tr>
                  <td>{{$user['id']}}</td>
                  <td>{{$user['name']}}</td>
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
                  <td> <a class="label label-danger" href="{{ route ('DeleteUser',['id'=> $user['id']]) }}">Delete</a>
                  </td>
                </tr> 
                @endforeach 
              </tbody></table>
           
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">latest Pharmaciest</h3>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tbody>
                 <tr>
                  <th>ID</th>
                  <th>PharmacyName</th>
                  <th>UserName</th>
                  <th>Auti_ID</th>
                  <th>Action</th>
                </tr>
                @foreach($All_Pharmacy as $Pharmacy)
                <tr>
                  <td>{{$Pharmacy['id']}}</td>
                  <td>{{$Pharmacy['PharmacyName']}}</td>
                  <td>{{$Pharmacy->Users()->first()->name}}</td>
                  <td>{{$Pharmacy['auth_id']}}</td>
                  <td> <a class="label label-danger" href="{{ route ('DeletePharmacy',['id'=> $Pharmacy['id']]) }}">Delete</a>
                  </td>
                </tr> 
                @endforeach 
              </tbody></table>
              
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        </div>
      </div>
      <div class="row" >
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">latest Medicines</h3>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tbody>
                 <tr>
                  <th>ID</th>
                  <th>Medicine Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Pharmacy Name</th>
                  <th>Action</th>
                </tr>
                @foreach($All_Medicine as $Medicine)
                <tr>
                  <td>{{$Medicine['id']}}</td>
                  <td>{{$Medicine['Medicine_Name']}}</td>
                  <td>{{$Medicine['Quantity']}}</td>
                  <td>{{$Medicine['price']}}</td>
                  <td>{{$Medicine->Pharmacy()->first()->PharmacyName}}</td>
                  <td> <a class="label label-danger" href="{{ route ('DeleteMedicine',['id'=> $Medicine['id']]) }}">Delete</a>
                  </td>
                </tr> 
                @endforeach 
              </tbody></table>
              
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        </div> 

        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">latest Orders</h3>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tbody>
                 <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                @foreach($All_Orders as $Order)
                <tr>
                  <td>{{$Order['order_id']}}</td>
                  <td>{{$Order['order_name']}}</td>
                  <td>{{$Order['order_username']}}</td>
                  <td>{{$Order['total']}} LE</td>      

                   @if(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Carbon\Carbon::now(), 'Africa/Cairo') <= $Order['order_expired_deliver'] and $Order['order_status'] == 0)
                     <td><a class="label label-warning" href="{{ route ('change_Order_Status',['id'=> $Order['order_id']
                      ,'status'=> $Order['order_status']])}}">Waiting</a></td>

                  @elseif(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Carbon\Carbon::now(), 'Africa/Cairo') > $Order['order_expired_deliver'] and $Order['order_status'] == 0)
                      <td><h5 class="label label-danger">Order Canceled</h5></td>


                  @elseif($Order['order_status'] == 1)

                     <td><a class="label label-success" href="{{ route ('change_Order_Status',['id'=> $Order['order_id']
                      ,'status'=> $Order['order_status']] ) }}">Confirm</a></td>
                  @endif
                  
                  <td> <a class="label label-danger" href="{{ route ('DeleteOrder',['id'=> $Order['order_id']]) }}">Delete</a>
                  </td>
                </tr> 
                @endforeach 
              </tbody></table>
            
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        </div>
      </div>
      <div class="row" >
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">latest Articles</h3>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tbody>
                 <tr>
                  <th>ID</th>
                  <th>Article Title</th>
                  <th>Category Name</th>
                  <th>Added By</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                @foreach($All_Article as $Article)
                <tr>
                    <td>{{$Article['article_id']}}</td>
                    <td>{{$Article['article_title']}}</td>
                    <td>{{$Article->Category()->first()->Category_name}}</td>
                    <td>{{$Article->user()->first()->name}}</td>
                  @if($Article['article_status']==0)
                     <td><a class="label label-warning" href="{{ route ('change_Article_Status',['id'=> $Article['article_id']
                      ,'regstatus'=> $Article['article_status']] ) }}">Pending</a></td>
                  @else
                     <td><a class="label label-success" href="{{ route ('change_Article_Status',['id'=> $Article['article_id']
                      ,'regstatus'=> $Article['article_status']] ) }}">Approve</a></td>
                  @endif
                  
                  <td> <a class="label label-danger" href="{{ route ('Delete_Article_Admin',['id'=> $Article['article_id']]) }}">Delete</a>
                  </td>
                </tr> 
                @endforeach 
              </tbody></table>
             
            </div>
            <!-- /.box-body -->
          </div>
          </div>
         </div>
         
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">latest Comments</h3>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tbody>
                 <tr>
                 <th>ID</th>
                  <th>Comment Desc</th>
                  <th>Article Name</th>
                  <th>Added By</th>
                  <th>Action</th>
                </tr>
                @foreach($All_Comments as $Comment)
                <tr>
                  <td>{{$Comment['comment_id']}}</td>
                  <td>{{ str_limit( $Comment['comment_descreption'],20 ) }} </td>
                  <td>{{$Comment->Article()->first()->article_title}}</td>
                  <td>{{$Comment->user()->first()->name}}</td>
              
                  <td> <a class="label label-danger" href="{{ route ('DeleteComment',['id'=> $Comment['comment_id']]) }}">Delete</a>
                  </td>
                @endforeach 
              </tbody></table>
              
            </div>
            <!-- /.box-body -->
          </div>
          </div>
         </div>
      </div>
    </section>
    <!-- /.border table -->
  </div>
  <!-- /.content-wrapper -->
 

@endsection