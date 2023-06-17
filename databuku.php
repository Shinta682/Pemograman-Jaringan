<?php include 'header.php' ?>

	<!-- Content -->
	<div class="content">

		<div class="container">
			
			<div class="box">

				<div class="box-header">
					Data Buku Perpus Website Online
				</div>
				<div class="box-body">
					<a href="tambah-buku.php" class="text-green"><i class="fa fa-plus"></i> Tambah</a>

					<form action="" >
						<div class="input-group">
							<input type="text" name="key" placeholder="Pencarian">
							<button type="submit"><i class="fa fa-search"></i></button>
						</div>
					</form>
					<table class="table">
						<thead>
						<tr>
							<th>No</th>
							<th>Kode Buku</th>
							<th>Judul Buku</th>
							<th>Kategori</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no=1;


							$where = " WHERE 1=1 ";
							if(isset($_GET['key'])){
								$where .=" AND kd_buku LIKE '%".addslashes($_GET['key'])."%' ";
							}

							$buku =mysqli_query($conn, "SELECT * FROM tb_buku $where ORDER BY kd_buku DESC");

							if(mysqli_num_rows($buku)>0){
								while ($p=mysqli_fetch_array($buku)) {
							
						?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $p['kd_buku']?></td>
							<td><?= $p['judul_buku']?></td>
							<td><?= $p['kategori']?></td>
							<td>
								<a href="edit-buku.php?id=<?= $p['kd_buku']?>" title="Edit Data" class="text-orange"><i class="fa fa-edit"></i></a> |
								<a href="hapus-semua.php?idbuku=<?= $p['kd_buku']?>" onclick="return confirm('Yakin ingin dihapus?')" title="Hapus Data" class="text-red"><i class="fa fa-times"></i></a>
							</td>
						</tr>

					<?php }}else { ?>
						<tr>
							<td colspan="5">Data tidak ada</td>
						</tr>
					<?php } ?>
					</tbody>
					</table>

				</div>
				

			</div>
		</div>
		
	</div>

<?php include 'footer.php' ?>