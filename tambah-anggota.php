<?php include 'header.php' ?>

	<!-- Content -->
	<div class="content">

		<div class="container">
			
			<div class="box">

				<div class="box-header">
					Tambah Data Anggota Perpus Website Online
				</div>
				<div class="box-body">
					<form action="" method="POST">
						<div class="form-group">
							<label>Id Anggota</label>
							<input type="text" name="id_anggota" placeholder="Masukan Id Anggota" class="input-control" required>
							
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" placeholder="Masukan Nama" class="input-control" required>
							
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="alamat" placeholder="Masukan Alamat" class="input-control" required>
							
						</div>

						<div class="form-group">
							<label>No Telepon</label>
							<input type="text" name="telepon" placeholder="Masukan No Telepon" class="input-control" required>
							
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jenis_kelamin" class="input-control" required>
								<option value="">Pilih</option>
								<option value="Perempuan">Perempuan</option>
								<option value="Laki-laki">Laki-laki</option>
							</select>
							
						</div>
						<button type="button" class="btn" onclick="window.location='dataanggota.php'">Kembali</button>
						<input type="submit" name="submit" value="simpan" class="btn btn-blue">
					</form>

					<?php
						if(isset($_POST['submit'])){

							$id_anggota = addslashes($_POST['id_anggota']);
							$nama = addslashes($_POST['nama']);
							$alamat = $_POST['alamat'];
							$telepon = addslashes($_POST['telepon']);
							$jenis_kelamin = addslashes($_POST['jenis_kelamin']);

							$cek = mysqli_query($conn, "SELECT id_anggota FROM tb_anggota WHERE id_anggota='". $id_anggota ."' ");

							if(mysqli_num_rows($cek)>0){
								echo '<div class="alert alert-error">Id Anggota sudah ada</div>';
							}else{

								$simpan	= mysqli_query($conn, "INSERT INTO tb_anggota (id_anggota, nama, alamat, telepon, jenis_kelamin) VALUES ('".$id_anggota."', '".$nama."', '".$alamat."', '".$telepon."', '".$jenis_kelamin."')");

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