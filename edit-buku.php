<?php include 'header.php' ?>

<?php
	$pengguna=mysqli_query($conn, "SELECT * FROM tb_buku WHERE kd_buku='".$_GET['id']."' ");

	if(mysqli_num_rows($pengguna) == 0){
		echo "<script>window.location='databuku.php'</script>";
	}

	$p=mysqli_fetch_object($pengguna);

?>

	<!-- Content -->
	<div class="content">

		<div class="container">
			
			<div class="box">

				<div class="box-header">
					Edit Data Buku Perpus Website Online
				</div>
				<div class="box-body">
					<form action="" method="POST">
						<div class="form-group">
							<label>Judul Buku</label>
							<input type="text" name="judul_buku" placeholder="Input Judul Buuku" class="input-control" value="<?= $p->judul_buku?>" required>
							
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<input type="text" name="kategori" placeholder="Input Kategori" class="input-control" value="<?= $p->kategori?>" required>
							
						</div>

						<button type="button" class="btn" onclick="window.location='databuku.php'">Kembali</button>
						<input type="submit" name="submit" value="simpan" class="btn btn-blue">
					</form>

					<?php
						if(isset($_POST['submit'])){

							//$kd_buku = addslashes($_POST['kd_buku']);
							$judul_buku = addslashes($_POST['judul_buku']);
							$kategori = $_POST['kategori'];
							$update =mysqli_query($conn, "UPDATE tb_buku SET 
								judul_buku = '". $judul_buku ."',
								kategori= '". $kategori ."'
								WHERE kd_buku='".$_GET['id']."' 
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