<?php include 'header.php' ?>

	<!-- Content -->
	<div class="content">

		<div class="container">
			
			<div class="box">

				<div class="box-header">
					Data Peminjam Buku
				</div>
				<div class="box-body">
					<a href="tambah-peminjaman.php" class="text-green"><i class="fa fa-plus"></i> Tambah</a>

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
							<th>Id Peminjam</th>
							<th>Peminjam</th>
							<th>Tanggal Pinjam</th>
							<th>Buku</th>
							<th>Lama Pinjam</th>
							<th>Tanggal Harus Kembali</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no=1;


							$where = " WHERE 1=1 ";
							if(isset($_GET['key'])){
								$where .=" AND id_peminjam LIKE '%".addslashes($_GET['key'])."%' ";
							}

							$nilai =mysqli_query($conn, "SELECT * FROM tb_peminjaman $where ORDER BY id_anggota DESC");

							if(mysqli_num_rows($nilai)>0){
								while ($p=mysqli_fetch_array($nilai)) {
							
						?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $p['id_peminjam']?></td>
							<td><?= $p['id_anggota']?></td>
							<td><?= $p['tgl_pinjam']?></td>
							<td><?= $p['kd_buku']?></td>
							<td><?= $p['lama_pinjam']?></td>
							<td><?= $p['tgl_haruskembali']?></td>
							<td>
								<a href="edit-peminjaman.php?id=<?= $p['id_anggota']?>" title="Edit Data" class="text-orange"><i class="fa fa-edit"></i></a> |
								<a href="hapus-semua.php?idpeminjam=<?= $p['id_peminjam']?>" onclick="return confirm('Yakin ingin dihapus?')" title="Hapus Data" class="text-red"><i class="fa fa-times"></i></a>
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