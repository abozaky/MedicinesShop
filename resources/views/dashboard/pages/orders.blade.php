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
                  <th>Order Name</th>
                  <th>Order Username</th>
                  <th>Mobile</th>
                  <th>Quantity</th>
                  <th>Price Total</th>
                  <th>Expired deliver</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <!-- to fetach array to table from Orders_Controller -->
                 @foreach($All_Orders as $Order)

                <tr>
                  <td>{{$Order['order_id']}}</td>
                  <td>{{$Order['order_name']}}</td>
                  <td>{{$Order['order_username']}}</td>
                  <td>{{$Order['mobile_user']}}</td>
                  <td>{{$Order['Quantity']}}</td>
                  <td>{{$Order['total']}} LE</td>
                  <td>{{$Order['order_expired_deliver']}}</td>
                  

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