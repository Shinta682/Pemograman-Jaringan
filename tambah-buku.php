<?php include 'header.php' ?>

	<!-- Content -->
	<div class="content">

		<div class="container">
			
			<div class="box">

				<div class="box-header">
					Tambah Data Buku Perpus Website Online
				</div>
				<div class="box-body">
					<form action="" method="POST">
						<div class="form-group">
							<label>Kode Buku</label>
							<input type="text" name="kd_buku" placeholder="Masukan Kode Buku" class="input-control" required>
							
						</div>
						<div class="form-group">
							<label>Judul Buku</label>
							<input type="text" name="judul_buku" placeholder="Masukan Judul Buku" class="input-control" required>
							
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<input type="text" name="kategori" placeholder="Masukan Kategori" class="input-control" required>
							
						</div>

						<button type="button" class="btn" onclick="window.location='databuku.php'">Kembali</button>
						<input type="submit" name="submit" value="simpan" class="btn btn-blue">
					</form>

					<?php
						if(isset($_POST['submit'])){

							$kd_buku = addslashes($_POST['kd_buku']);
							$judul_buku = addslashes($_POST['judul_buku']);
							$kategori = $_POST['kategori'];
							$cek = mysqli_query($conn, "SELECT kd_buku FROM tb_buku WHERE kd_buku='". $kd_buku ."' ");

							if(mysqli_num_rows($cek)>0){
								echo '<div class="alert alert-error">Kode Buku sudah ada</div>';
							}else{

								$simpan	= mysqli_query($conn, "INSERT INTO tb_buku (kd_buku, judul_buku, kategori) VALUES ('".$kd_buku."', '".$judul_buku."', '".$kategori."')");

								if($simpan){
									echo '<div class="alert alert-success">Berhasil Disimpan</div>';
								}else {
									echo 'gagal simpan' .mysqli_error($conn);
								}
							}

							

						}
					?>
				</div>
			</div>
		</div>
		
	</div>

<?php include 'footer.php' ?>