<?php include 'header.php' ?>

	<!-- Content -->
	<div class="content">

		<div class="container">
			
			<div class="box">

				<div class="box-header">
					Data Anggota Perpus Website Online
				</div>
				<div class="box-body">
					<a href="tambah-anggota.php" class="text-green"><i class="fa fa-plus"></i> Tambah</a>

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
							<th>Id Anggota</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Telepon</th>
							<th>Jenis Kelamin</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no=1;


							$where = " WHERE 1=1 ";
							if(isset($_GET['key'])){
								$where .=" AND nama LIKE '%".addslashes($_GET['key'])."%' ";
							}

							$pengguna =mysqli_query($conn, "SELECT * FROM tb_anggota $where ORDER BY id_anggota DESC");

							if(mysqli_num_rows($pengguna)>0){
								while ($p=mysqli_fetch_array($pengguna)) {
							
						?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $p['id_anggota']?></td>
							<td><?= $p['nama']?></td>
							<td><?= $p['alamat']?></td>
							<td><?= $p['telepon']?></td>
							<td><?= $p['jenis_kelamin']?></td>
							<td>
								<a href="edit-anggota.php?id=<?= $p['id_anggota']?>" title="Edit Data" class="text-orange"><i class="fa fa-edit"></i></a> |
								<a href="hapus-semua.php?idanggota=<?= $p['id_anggota']?>" onclick="return confirm('Yakin ingin dihapus?')" title="Hapus Data" class="text-red"><i class="fa fa-times"></i></a>
							</td>
						</tr>

					<?php }}else { ?>
						<tr>
							<td colspan="7">Data tidak ada</td>
						</tr>
					<?php } ?>
					</tbody>
					</table>

				</div>
				

			</div>
		</div>
		
	</div>

<?php include 'footer.php' ?>