<style type="text/css">
  .signOutBox {
    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.12), 0 1px 2px 4px rgba(0,0,0,0.08);
    border: 1px solid #d2cfcf;
    border-radius: 5px;
}
</style>
<header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo ">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <?php 

            $cname = Session::get('company_name');

            $explode = explode('-',$cname);
            $c_name = $explode[1];
          ?>
          <span class="logo-mini bounceInDown animated">{{$c_name}}</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg bounceInDown animated">{{strtoupper(Session::get('company_name'))}}</span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu bounceInDown animated">
            <ul class="nav navbar-nav">
              
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ URL::asset('public/dist/img/admin_img.jpg') }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{strtoupper(Session::get('username'))}}</span>
                </a>
                <ul class="dropdown-menu signOutBox fadeInDown animated" style="padding-right: 1%;">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ URL::asset('public/dist/img/admin_img.jpg') }}" class="img-circle" alt="User Image">
                    <p>
                      {{strtoupper(Session::get('username'))}} - Admin
                     
                    </p>
                  </li>
                  <!-- Menu Body -->
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div style="text-align: center;">
                      <a href="{{ url('logout') }}" class="btn btn-primary btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>

        </nav>
      </header>