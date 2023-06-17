<?php include 'header.php' ?>

<?php
	$pengguna=mysqli_query($conn, "SELECT * FROM tb_anggota WHERE id_anggota='".$_GET['id']."' ");

	if(mysqli_num_rows($pengguna) == 0){
		echo "<script>window.location='dataanggota.php'</script>";
	}

	$p=mysqli_fetch_object($pengguna);

?>

	<!-- Content -->
	<div class="content">

		<div class="container">
			
			<div class="box">

				<div class="box-header">
					Edit Data Anggota Perpus Website Online
				</div>
				<div class="box-body">
					<form action="" method="POST">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" placeholder="Input Nama" class="input-control" value="<?= $p->nama?>" required>
							
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="alamat" placeholder="Input Alamat" class="input-control" value="<?= $p->alamat?>" required>
							
						</div>

						<div class="form-group">
							<label>No Telepon</label>
							<input type="text" name="telepon" placeholder="Input Telepon" class="input-control" value="<?= $p->telepon?>" required>
							
						</div>

						
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jenis_kelamin" class="input-control" required>
								<option value="">Pilih</option>
								<option value="Perempuan" <?= ($p->jenis_kelamin=='Perempuan')? 'selected':'' ?>>Perempuan</option>
								<option value="Laki-laki"<?= ($p->jenis_kelamin=='Laki-laki')? 'selected' :'' ?> >Laki-laki</option>
							</select>
							
						</div>
						<button type="button" class="btn" onclick="window.location='dataanggota.php'">Kembali</button>
						<input type="submit" name="submit" value="simpan" class="btn btn-blue">
					</form>

					<?php
						if(isset($_POST['submit'])){

							//$id_anggota = addslashes($_POST['id_anggota']);
							$nama = addslashes($_POST['nama']);
							$alamat = $_POST['alamat'];
							$telepon = $_POST['telepon'];
							$jenis_kelamin = $_POST['jenis_kelamin'];

							$update =mysqli_query($conn, "UPDATE tb_anggota SET 
								nama = '". $nama ."',
								alamat= '". $alamat ."',
								telepon = '" . $telepon . "', 
								jenis_kelamin = '". $jenis_kelamin ."'
								WHERE id_anggota='".$_GET['id']."' 
							");

							
							if($update){
								echo '<div class="alert alert-success">Data Berhasil Diedit</div>';
							}else {
								echo 'gagal edit' .mysqli_error($conn);
							}

						}
					?>
				</div>
			</div>
		</div>
		
	</div>

<?php include 'footer.php' ?>