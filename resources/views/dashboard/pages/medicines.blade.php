@extends('dashboard.layout.admin')

@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Medicines    
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
                  <th>Medicine Name</th>
                  <th>Medicine Desc</th>
                  <th>Medicine Quantity</th>
                  <th>Medicine Price</th>
                  <th>Pharmacy Name</th>
                  <th>Action</th>
                </tr>
                <!-- to fetach array to table from AllusersController -->
                 @foreach($All_Medicines as $Medicine)

                <tr>
                  <td>{{$Medicine['id']}}</td>
                  <td>{{$Medicine['Medicine_Name']}}</td>
                  <td>{{$Medicine['description']}}</td>
                  <td>{{$Medicine['Quantity']}}</td>
                  <td>{{$Medicine['price']}} LE</td>
                  <td>{{$Medicine->Pharmacy()->first()->PharmacyName}}</td>
                  <td> <a class="label label-danger" href="{{ route ('DeleteMedicine',['id'=> $Medicine['id']]) }}">Delete</a>
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