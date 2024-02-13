<?php
include "header.php";
include "navbar.php";
?>
<div class="card mt-2">
	<div class="card-body bg-secondary">
		<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
			Tambah Data
		</button>
	</div>
	<div class="card-body bg-">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="simpan"){?>
				<div class="alert alert-success" role="alert">
					Data Berhasil Di Simpan 
				</div>
			<?php } ?>
			<?php if($_GET['pesan']=="update"){?>
				<div class="alert alert-success" role="alert">
					Data Berhasil Di Update 
				</div>
			<?php } ?>
			<?php if($_GET['pesan']=="hapus"){?>
				<div class="alert alert-success" role="alert">
					Data Berhasil Di Hapus 
				</div>
			<?php } ?>
			<?php 
		}
		?>
		<table class="table">
  			<thead class="table-danger">
				<tr>
					<th>Nik</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>No.Telepon</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			include '../koneksi.php';
			$no = 1;
			$data = mysqli_query($koneksi,"select * from member");
			while($d = mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $d['nik']; ?></td>
					<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['jenkel']; ?></td>
					<td><?php echo $d['alamat']; ?></td>
					<td><?php echo $d['telp']; ?></td>
					<td>
						<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['nik']; ?>">
							Edit
						</button>
						<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['nik']; ?>">
							Hapus
						</button>
					</td>
				</tr>

				<!-- Modal Edit Data-->
				<div class="modal fade" id="edit-data<?php echo $d['nik']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				    <div class="modal-dialog">
				    	<div class="modal-content">
				            <div class="modal-header">
				        		<h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
				        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      		</div>
				      		<form action="proses_update_data.php" method="post">
					      		<div class="modal-body">
					        		<div class="form-group">
				        				<label>Nik</label>
				        				<input type="hidden" name="nik" value="<?php echo $d['nik']; ?>">
				        			</div>
				        			<div class="form-group">
				        				<label>Nama</label>
				        				<input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>">
				        			</div>
				        			<div class="form-group">
				        				<label>Jenis Kelamin</label>
				        				<input type="text" name="jenkel" class="form-control" value="<?php echo $d['jenkel']; ?>">
				        			</div>
				        			<div class="form-group">
				        				<label>Alamat</label>
				        				<input type="text" name="alamat" class="form-control" value="<?php echo $d['alamat']; ?>">
				        			</div>	
				        			<div class="form-group">
				        				<label>No.Telepon</label>
				        				<input type="number" name="telp" class="form-control" value="<?php echo $d['telp']; ?>">
				        			</div>
					        	</div>
					        	<div class="modal-footer">
					        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					        		<button type="submit" class="btn btn-primary">Update</button>
					        	</div>
					        </form>
				    	</div>
				    </div>
				</div>

				<!-- Modal Hapus Data-->
				<div class="modal fade" id="hapus-data<?php echo $d['nik']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				    <div class="modal-dialog">
				    	<div class="modal-content">
				            <div class="modal-header">
				        		<h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
				        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      		</div>
				      		<form method="post" action="proses_hapus_member.php">
					      		<div class="modal-body">
					      			<input type="hidden" name="nik" value="<?php echo $d['nik']; ?>">
					        		Apakah anda yakin akan menghapus data <b><?php echo $d['nama']; ?></b>
					        	</div>
					        	<div class="modal-footer">
					        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					        		<button type="submit" class="btn btn-primary">Hapus</button>
					        	</div>
				        	</form>
				    	</div>
				    </div>
				</div>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah Data-->
<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    	<div class="modal-content">
            <div class="modal-header">
        		<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<form action="proses_simpan_member.php" method="post">
      			<div class="modal-body">
        			<div class="form-group">
        				<label>Nik</label>
        				<input type="text" name="nik" class="form-control" autocomplete="off">
        			</div>
        			<div class="form-group">
        				<label>Nama</label>
        				<input type="text" name="nama" class="form-control" autocomplete="off">
        			</div>
        			<div class="form-group">
        				<label>Jenis Kelamin </label>
        				<input type="text" name="jenkel" class="form-control" autocomplete="off">
        			</div>       			
        			<div class="form-group">
        				<label>Alamat </label>
        				<input type="text" name="alamat" class="form-control" autocomplete="off">
        			</div>       			
        			<div class="form-group">
        				<label>No.Telepon </label>
        				<input type="text" name="telp" class="form-control" autocomplete="off">
        			</div>
        		</div>
        		<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
        			<button type="submit" class="btn btn-primary">Simpan</button>
        		</div>
        	<form>
    	</div>
    </div>
</div>
<?php
include "footer.php";
?>