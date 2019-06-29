
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active" ><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> <span>Home Page</span></a></li> 
        <li><a href="{{ route('admin.Users') }}"><i class="fa fa-users"></i> <span>All-Users</span></a></li>
        <li><a href="{{ route('admin.pharmacies') }}"><i class="fa fa-medkit"></i> <span>Pharmacies</span></a></li>
        <li><a href="{{ route('admin.medicine') }}"><i class="fa fa-heartbeat"></i> <span>Medicines</span></a></li>
        <li><a href="{{ route('admin.orders') }}"><i class="fa fa-first-order"></i> <span>Orders</span></a></li>
        <li><a href="{{ route('admin.category') }}"><i class="fa fa-folder-open"></i> <span>Categories</span></a></li>
        <li><a href="{{ route('admin.articles') }}"><i class="fa fa-file-text"></i> <span>Articles</span></a></li>
        <li><a href="{{ route('admin.comments') }}"><i class="fa fa-comments"></i><span>Comments</span></a></li>
        <li><a href="{{ route('admin.aboutus') }}"><i class="fa fa-folder-open"></i><span>About Us</span></a></li>
  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>