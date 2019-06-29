<!-- Start Navbar -->

	<div class="na">
        <section class="banner">
          <div class="container">
            <div class="row">
              <div class="col-8 col-lg-8">
                 <p class="mt-1 ml-3">Pharmcy</p>
                 <i class="fas fa-laptop"></i>
              </div>
              <div class="col-4 col-lg-4">
              <a href="{{route('admin.home')}}"><i>Dashboard</i></a>
             <a href="{{url('/')}}"><i class="fas fa-search mt-2 "></i></a>
              <a href="{{url('login')}}"><i class="fas fa-sign-in-alt mt-2 "></i></a>
              <a href="{{url('contact')}}"><i class="far fa-address-book"></i></a>
              </div>
            </div>
          </div>
        </section>
        <section class="page_header sticky-top">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg ">
                    <a class="navbar-brand " href="#">Logo</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon ">
                          <i class="fas fa-bars text-white"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-around" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('homepage') }}">Home <span class="sr-only">(current)</span></a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            </li>

                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('medicines') }}">Medicines</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact-Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('healthinfo') }}">Health-Articles</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('AddYourArticle') }}">Add Articles</a>
                            </li>
                          

                            @guest
                            
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('Add_Your_Pharmacy') }}">Add Pharmacy</a>
                              </li>

                            
                            @elseif(Auth::user()->role == 0)

                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('Add_Your_Pharmacy') }}">Add Pharmacy</a>
                              </li>

                            @elseif(Auth::user()->role == 1)

                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route ('MedicineForm') }}">Add Your Medicine</a>
                              </li>
                            
                            @endguest

                             <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </section>
        <button class="scroll" id="goup">scroll To top</button>
     </div>

     <!-- End Navbar -->