<div class="card mt-3">
  <div class="card-header bg-primary text-white ">
    Admin | Pergiloka
  </div>
  <div class="card-body">
  	<a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-success mb-3" >Tambah Data</a>
    <table class="table table-borderd table-hovered table-striped">
	<tr>
    		<th>No</th>
    		<th>No Tugas</th>
    		<th>Tanggal Tugas</th>
			<th>Tanggal Diterima</th>
			<th>Perihal</th>
			<th>Tujuan</th>
			<th>Pengirim</th>
			<th>File Tugas</th>
			<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "
    				  SELECT 
    				  	tbl_arsip.*,
    				  	tbl_departemen.nama_departemen,
    				  	tmhs.nama, tmhs.jurusan
    				  FROM 
    				  	tbl_arsip, tbl_departemen, tmhs
    				  WHERE 
    				  	tbl_arsip.id_departemen = tbl_departemen.id_departemen
    				  	and tbl_arsip.id_pengirim = tmhs.id_mhs
    				  ");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :

    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['no_surat']?></td>
    		<td><?=$data['tanggal_surat']?></td>
    		<td><?=$data['tanggal_diterima']?></td>
    		<td><?=$data['perihal']?></td>
    		<td><?=$data['nama_departemen']?></td>
    		<td><?=$data['nama']?> / <?=$data['jurusan']?></td>
    		<td>
    			<?php
    				//uji apakah file nya ada atau tidak
    				if(empty($data['file'])){
    					echo " - ";
    				}else{
    			?>
    				<a href="file/<?=$data['file']?>" target="$_blank"> lihat file </a>
    			<?php
    				}
    			?>
    		</td>
    		<td>
    			<a href="?halaman=arsip_surat&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-success" >Edit </a>
    			<a href="?halaman=arsip_surat&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>