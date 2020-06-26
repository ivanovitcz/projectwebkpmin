<nav class="navbar navbar-default navbar-fixed-top">
  <div class="brand">
    <a href="/view"><img src="{{asset('admin/assets/img/logo-dark.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
  </div>
  <div class="container-fluid">
    <div id="navbar-menu">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            @if (request() -> path() == "login")
              <a href="/view" class="dropdown-toggle"><i class="fa fa-user"></i>&emsp;<span class='panel-title'>Halaman User</span> </a>
            @else
              @if(Auth::check())
              <a href="/" class="dropdown-toggle"><i class="fa fa-home"></i>&emsp;<span class='panel-title'>Dashboard Admin</span> </a>
              @else
              <a href="/login" class="dropdown-toggle"><i class="fa fa-sign-in"></i>&emsp;<span class='panel-title'>Login Admin</span> </a>
              @endif
            @endif
        </li>
      </ul>
    </div>
  </div>
</nav>