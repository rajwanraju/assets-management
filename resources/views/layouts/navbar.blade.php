<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
      
          <img src="{{asset('/')}}images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">

   
                <span class="pro-user-name ml-1">
             
  @if(Auth::guard('admin')->check())

   {{ Auth::guard('admin')->user()->name }}


   @endif


                       <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>


                <!-- item-->
                <a href="#" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Settings</span>
                </a>


                <div class="dropdown-divider"></div>



                <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
           <i class="fe-log-out"></i>
           <span>Logout</span>
       </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>

            </div>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{url('/')}}" class="logo text-center">
            <span class="logo-lg">
                <img src="{{asset('/')}}logo.png" alt="" height="40">
                <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img src="{{asset('/')}}logo.png" alt="" height="28">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>
