<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login Admin E-Perpus MIN Surakarta</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="{{asset('css/font.css')}}" rel="stylesheet">
  <!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
  <script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>

  <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet"/>
  <script src="{{asset('js/toastr.min.js')}}"></script>

</head>

<body>
 
	<!-- WRAPPER -->
	<div id="wrapper">
		@include('liat.layouts.include._navbar')

		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{asset('admin/assets/img/logo-dark.png')}}" alt="Klorofil Logo"></div>
								<p class="lead mt-3">Login Admin</p>
							</div>
              <form class="form-auth-small" action="/postlogin" method='post'>
                {{ csrf_field() }}
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="text" name='name' class="form-control" id="signin-email" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" name='password' class="form-control" id="signin-password" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">E-Perpustakaan</h1>
							<p>MI Negeri Surakarta</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
  <!-- END WRAPPER -->
  <script>
    @if(Session::has('error')) 
      toastr.error("{{Session::get('error')}}", 'Gagal')
    @endif
  </script>
  
</body>

</html>
