<div class="left-side-menu">
  <div class="slimscroll-menu">
    <!--- Sidemenu -->
    <div id="sidebar-menu">


      @if(Auth::guard('web')->check())
      <ul class="metismenu" id="side-menu">
        <li>
          <a href="{{url('/home')}}">
            <i class="fe-airplay"></i>
            <span> Dashboard </span>
          </a>
        </li> 
      </ul>

      @else

      <ul class="metismenu" id="side-menu">
        <li>
          <a href="{{url('/login')}}">
            <i class="fe-airplay"></i>
            <span> Login </span>
          </a>
        </li> 
      </ul>
      @endif



    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

  </div>
  <!-- Sidebar -left -->

</div>
