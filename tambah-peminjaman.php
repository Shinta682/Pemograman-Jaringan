<?php include 'header.php' ?>

	<!-- Content -->
	<div class="content">

		<div class="container">
			
			<div class="box">

				<div class="box-header">
					Tambah Peminjam Buku
				</div>
				<div class="box-body">
					<form action="" method="POST">
						<div class="form-group">
							<label>Id Peminjaman </label>
							<input type="text" name="id_peminjam" placeholder="Masukan Id Pinjam" class="input-control" required>
							
						<div class="form-group">
							<label>Peminjam</label>
							<select name="id_anggota" class="input-control" required>
								<option>----</option>
								<?php
									 $query	= mysqli_query($conn, "SELECT * FROM tb_anggota") or die (mysqli_error($conn));
									 while($data = mysqli_fetch_array($query)){
									 	echo "<option value=$data[id_anggota]>$data[id_anggota]|$data[nama] </option>";
									 }
								?>
							</select>
							
							
						</div>
						<div class="form-group">
							<label>Tanggal Pinjam</label>
							<input type="date" name="tgl_pinjam" placeholder="Masukan Tanggal Pinjam" class="input-control" required>
							
							<div class="form-group">
							<label>Buku</label>
							<select name="kd_buku" class="input-control" required>
								<option>----</option>
								<?php
									 $query	= mysqli_query($conn, "SELECT * FROM tb_buku") or die (mysqli_error($conn));
									 while($data = mysqli_fetch_array($query)){
									 	echo "<option value=$data[kd_buku]>$data[kd_buku]|$data[judul_buku] </option>";
									 }
								?>
							</select>
							
							
						</div>
						<div class="form-group">
							<label>Lama Pinjam</label>
							<input type="text" name="lama_pinjam" placeholder="Masukan Lama Pinjam" class="input-control" required>

							<div class="form-group">
							<label>Tanggal Harus Kembali </label>
							<input type="date" name="tgl_haruskembali" placeholder="Masukan Tanggal harus kembali" class="input-control" required>
						<button type="button" class="btn" onclick="window.location='peminjaman.php'">Kembali</button>
						<input type="submit" name="submit" value="simpan" class="btn btn-blue">
					</form>

					<?php
						if(isset($_POST['submit'])){

							$id_peminjam = ($_POST['id_peminjam']);
							$peminjam = ($_POST['id_anggota']);
							$tgl_pinjam = addslashes($_POST['tgl_pinjam']);
							$buku = addslashes($_POST['kd_buku']);
							$lama_pinjam = addslashes($_POST['lama_pinjam']);
							$tgl_haruskembali = addslashes($_POST['tgl_haruskembali']);

							$cek = mysqli_query($conn, "SELECT id_peminjam FROM tb_peminjaman WHERE id_peminjam='". $id_peminjam ."' ");

							if(mysqli_num_rows($cek)>0){
								echo '<div class="alert alert-error">Sudah meminjam buku, silahkan selesaikan 1 pinjaman</div>';
							}else{

								$simpan	= mysqli_query($conn, "INSERT INTO tb_peminjaman (id_peminjam, id_anggota,tgl_pinjam, kd_buku, lama_pinjam, tgl_haruskembali) VALUES ('".$id_peminjam."','".$peminjam."', '".$tgl_pinjam."', '".$buku."', '".$lama_pinjam."', '".$tgl_haruskembali."')");

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