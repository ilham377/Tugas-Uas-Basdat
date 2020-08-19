<!doctype html>
<html lang="en">
  <head>
  	<title>AKADEMIK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="{{url('/')}}" class="logo">AKADEMIK</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{url('/')}}"><span class="fa fa-home mr-3"></span> Homepage</a>
          </li>
          <li>
              <a href="{{url('/mhs')}}"><span class="fa fa-user mr-3"></span> Mahasiswa</a>
          </li>
          <li>
            <a href="{{url('/dosen')}}"><span class="fa fa-user mr-3"></span> Dosen</a>
          </li>
          <li>
            <a href="{{url('/akt')}}"><span class="fa fa-user mr-3"></span> Angkatan</a>
          </li>
          <li>
            <a href="{{url('/jurusan')}}"><span class="fa fa-sticky-note mr-3"></span> Jurusan</a>
          </li>
          <li>
            <a href="{{url('/jdw')}}"><span class="fa fa-sticky-note mr-3"></span> Jadwal</a>
          </li>
          <li>
            <a href="{{url('/mk')}}"><span class="fa fa-sticky-note mr-3"></span> Mata Kuliah</a>
          </li>
          <li>
            <a href="{{url('/nilai')}}"><span class="fa fa-sticky-note mr-3"></span> Nilai</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      @yield('container')

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    @yield('js')

  </body>
</html>