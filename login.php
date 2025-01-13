<div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-7 text-center" data-aos="fade">
				<span class="caption mb-3">Silahkan Login</span>
				<h1 class="mb-4">Login</h1>
			</div>
		</div>
	</div>
</div>
<title> Halaman Login </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">
			<br/><br/>
			<h2> HALAMAN LOGIN</h2>
			</div>
		</div>
	</div>
<?php 
include 'koneksi.php';
//menangkap data yang dikirim dari form login

if(isset($_POST["submit"])){//jika tombol login di klik
	$username=$_POST["username"];
	$password=($_POST["password"]);

	if($username!="" && $password!=""){
		
		// cek kecocokan username dan password
		$em = mysqli_query($conn, "select * from pelanggan where password = '$password' AND username = '$username'");
		$data = mysqli_fetch_array($em);
		
		if(empty($data)) // username atau password salah
		{
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismis='alert' aria-hiden='true'>&times;</button>
						Username atau password salah
					</div>";
		}
		else // username dan password cocok
		{	
			$_SESSION["username"]=$data["username"];
			$_SESSION["password"]=$data["password"];
			$_SESSION["id_pelanggan"]=$data["id_pelanggan"];
			$_SESSION["nama"]=$data["nama"];
			$_SESSION["no_hp"]=$data["no_hp"];
			$_SESSION["email"]=$data["email"];
			
			// arahkan ke halaman index pasca login
			echo "<script> alert('selamat datang ".$_SESSION['nama']."'); window.location.href='index.php?page=home'; </script>";
		}
	}
	else
	{
		echo "<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismis='alert' aria-hiden='true'>&times;</button>
					Username atau password tidak boleh kosong!
				</div>";
	}
}
?>
	<div class="row">

		<div class="col-md-4 offset-md-4 col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong> Masukan Username Dan Password </strong>
				</div>
		<div class="panel-body">

		 <form action="" method="POST" enctype="multipart/form-data">
		 <br/>
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa fa-tag"></i></span>
				<input type="text" name="username" class="form-control" placeholder="Username"/>
			</div>
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" name="password" class="form-control" placeholder="Password"/>
			</div>
			<button type="submit" name="submit"class="btn btn-primary"> LOGIN </button>
		</form>
		
		</div>
	</div>
</div>
</div>
</div>
</body>