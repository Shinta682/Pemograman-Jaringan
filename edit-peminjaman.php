<?php include 'header.php' ?>

<?php
	$nilai=mysqli_query($conn, "SELECT * FROM tb_peminjaman WHERE id_peminjam='".$_GET['id']."'");

	if(mysqli_num_rows($nilai) == 0){
		echo "<script>window.location='peminjam.php'</script>";
	}

	$p=mysqli_fetch_object($nilai);

?>

	<!-- Content -->
	<div class="content">

		<div class="container">
			
			<div class="box">

				<div class="box-header">
					Edit Data Peminjam
				</div>
				<div class="box-body">
					<form action="" method="POST">
						<div class="form-group">
							<label>Tanggal Pinjam</label>
							<input type="date" name="tgl_pinjam" placeholder="Tanggal Pinjam" class="input-control" value="<?= $p->tgl_pinjam?>" required>
							
						</div>

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

							$tgl_pinjam = addslashes($_POST['tgl_pinjam']);
							$buku = addslashes($_POST['kd_buku']);
							$lama_pinjam = addslashes($_POST['lama_pinjam']);
							$tgl_haruskembali = addslashes($_POST['tgl_haruskembali']);

							$update =mysqli_query($conn, "UPDATE tb_peminjaman SET 
								tgl_pinjam = '". $tgl_pinjam ."',
								kd_buku = '". $buku ."',
								lama_pinjam = '". $lama_pinjam ."',
								tgl_haruskembali = '". $tgl_haruskembali ."'
								WHERE id_peminjam='".$_GET['id']."' 
							");

							
							if($update){
								echo '<div class="alert alert-success">Data Berhasil Diedit</div>';
								echo "<script>window.location='peminjaman.php'</script>";
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