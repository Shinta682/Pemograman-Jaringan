<?php
	include '../koneksi.php';

	if(isset($_GET['idbuku'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_buku WHERE kd_buku='".$_GET['idbuku']."' ");
		echo "<script>window.location='databuku.php'</script>";
	}

	if(isset($_GET['idanggota'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_anggota WHERE id_anggota='".$_GET['idanggota']."' ");
		echo "<script>window.location='dataanggota.php'</script>";
	}

	if(isset($_GET['idpeminjam'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_peminjaman WHERE id_peminjam='".$_GET['idpeminjam']."' ");
		echo "<script>window.location='peminjaman.php'</script>";
	}
	
?>