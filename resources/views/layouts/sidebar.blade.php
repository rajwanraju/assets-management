<div class="left-side-menu">
  <div class="slimscroll-menu">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
      @if(Auth::guard('admin')->check())
      <ul class="metismenu" id="side-menu">
        <li>
          <a href="{{url('/admin')}}">
            <i class="fe-airplay"></i>
            <!--<span class="badge badge-success badge-pill float-right">2</span>-->
            <span> Dashboard </span>
          </a>
        </li> 
        


        <li>
          <a href="javascript: void(0);" aria-expanded="false">
            <i class="mdi mdi-cast-education"></i>
            Category
            <span class="menu-arrow"></span>
          </a>
          <ul class="nav-second-level nav {{ Request::is('category*') ||  Request::is('subcategory*')  ? 'active' : ''}}" aria-expanded="false">
            <li>
              <a href="{{ route('category') }}">
                <i class="fe-layers"></i>
              Category List</a>
            </li>

            <li>
              <a href="{{ route('category.create') }}">
                <i class="fe-layers"></i>
              Add Category</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" aria-expanded="false">
            <i class="dripicons-stack"></i>
            Assets
            <span class="menu-arrow"></span>
          </a>
          <ul class="nav-second-level nav" aria-expanded="false">
            <li>
              <a href="{{route('assets.index')}}">
                <i class="fe-layers"></i>
              Assets List</a>
            </li>
            <li>
              <a href="{{route('assets.adding')}}">
                <i class="fe-layers"></i>
              Add Assets</a>
            </li>

             <li>
              <a href="{{route('assets.assign')}}">
                <i class="fe-layers"></i>
              Assets Assign</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" aria-expanded="false"><i class="fa fa-cog"></i>Report
            <span class="menu-arrow"></span>
          </a>
          <ul class="nav-second-level nav {{Request::is('assets/a*')  ? 'mm-show' : ''}}" aria-expanded="false">
            <li class="{{Request::is('assets/a*')  ? 'mm-active' : ''}}">
              <a href="{{ route('assets.assinged') }}" class="{{Request::is('assets/a*')  ? 'active' : ''}}"><i class="fa fa-users"></i> Assingned Assets</a>
            </li>
            <li>
              <a href="{{ route('assets.available') }}"><i class="fa fa-users"></i> Available Assets</a>
            </li>
          </ul>
        </li>



        

        <li><a href="{{ url('/settings') }}"> <i class="fa fa-cogs"></i>Site Settings</a></li>
        <li>
          <a href="javascript: void(0);" aria-expanded="false"><i class="fa fa-users"></i>User Management
            <span class="menu-arrow"></span>
          </a>
          <ul class="nav-second-level nav {{Request::is('settings/users/*')  ? 'mm-show' : ''}}" aria-expanded="false">
            <li class="{{Request::is('settings/users/*')  ? 'mm-active' : ''}}">
              <a href="{{ route('user.index') }}" class="{{Request::is('settings/users/*')  ? 'active' : ''}}"><i class="fa fa-users"></i> User List</a>
            </li>
            <li>
              <a href="{{ route('role.index') }}"><i class="fa fa-users"></i> Role & Permission</a>
            </li>
          </ul>
        </li>



        <li><a  href="{{url('/clear-cache')}}">Cache Clear</a></li>


      </ul>
      @endif

      @if(Auth::guard('web')->check())
   <ul class="metismenu" id="side-menu">
        <li>
          <a href="{{url('/home')}}">
            <i class="fe-airplay"></i>
            <!--<span class="badge badge-success badge-pill float-right">2</span>-->
            <span> Dashboard </span>
          </a>
        </li> 
</ul>

      @else

   <ul class="metismenu" id="side-menu">
        <li>
          <a href="{{url('/login')}}">
            <i class="fe-airplay"></i>
            <!--<span class="badge badge-success badge-pill float-right">2</span>-->
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
