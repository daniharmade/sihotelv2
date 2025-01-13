<div class="site-blocks-cover overlay" style="background-image: url(images/trivenazi.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-7 text-center" data-aos="fade">
				<span class="caption mb-3">Silahkan Registrasi Pada Form Dibawah Ini!!!</span>
				<h1 class="mb-4">Registrasi</h1>
			</div>
		</div>
	</div>
</div>
<div class="site-section site-section-sm">
	<div class="container">
		<div class="row">
			
			<div class="col-md-12 col-lg-8 mb-5">
				
				
				
				<form enctype="multipart/form-data" action="simpan_register.php" method="post" class="p-5 bg-white">
					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="fullname">Nama Lengkap</label>
							<input type="text" id="fullname" name="nama" class="form-control" placeholder="Full Name">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for="username">Username</label>
							<input type="text" id="username" name="username" class="form-control" placeholder="username">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="pasword">Pasword</label>
							<input type="text" id="pasword" name="password" class="form-control" placeholder="pasword">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="no_hp">No.HP</label>
							<input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="no_hp">
						</div>
					</div>
					<div action="proses.php" method="get">
					      <p>Jenis Kelamin</p>
					      <p><input type='radio' name='jk' value='pria' />Pria</p>
					      <p><input type='radio' name='jk' value='wanita' />Wanita</p>
					 </div>     
					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for="alamat">Alamat</label>
							<textarea id="alamat" name="alamat" cols="30" rows="5" class="form-control" placeholder="masukan alamat anda!!"></textarea>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="email">Email</label>
							<input type="text" id="email" name="email" class="form-control" placeholder="email">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<input type="submit" name="submit" value="Registrasi" class="btn btn-primary pill px-4 py-2">							
						</div>
					</div>
					
				</form>
				
			</div>
		</div>
	</div>
</div>
