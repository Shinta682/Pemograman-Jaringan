<?php
	session_start();
	include '../koneksi.php';
	if(!isset($_SESSION['status_login'])){
		echo "<script>window.location='../login.php?msg=Harap Login Terlebih Dahulu'</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Panel Admin Aplilkasi Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-ligt">
	<!-- navbar -->
	<div class="navbar">

		<div class="container">
			
			<h2 class="nav-brand  float-left"><a href="index.php"> Aplikasi Perpustakaan Website Online</a></h2>

			<!-- navbar menu -->
			<ul class="nav-menu ">
				<li><a href="index.php">Dashboard</a></li>


					<li>
						<a href="#">Menu  <i class="fa fa-caret-down"></i></a>
						<!-- sub menu -->
						<ul class="dropdown">
							<li><a href="databuku.php">Data Buku Perpus</a></li>
							<li><a href="dataanggota.php">Data Anggota Perpus</a></li>
							<li><a href="peminjaman.php">Data Peminjam Buku</a></li>
						</ul>
					</li>
					
					

				<li>
					<a href="#">Exit <i class="fa fa-caret-down"></i></a>
					<!-- sub menu -->
					<ul class="dropdown">
						<li><a href="logout.php">Exit</a></li>
					</ul>
				</li>
			</ul>
			<div class="clearfix">	</div>
		</div>
		
	</div>