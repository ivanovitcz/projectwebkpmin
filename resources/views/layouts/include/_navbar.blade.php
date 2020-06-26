<nav class="navbar navbar-default navbar-fixed-top">
  <div class="brand">
    <a href="/"><img src="{{asset('admin/assets/img/logo-dark.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
  </div>
  <div class="container-fluid">
    <div class="navbar-btn">
      <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-chevron-circle-left"></i></button>
    </div>
    <div id="navbar-menu">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('admin/assets/img/user.png')}}" class="img-circle" alt="Avatar"> <span>Staff Perpustakaan</span> <i class="icon-submenu fa fa-chevron-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>