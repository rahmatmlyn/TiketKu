<?php
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		
		//pengujian apakah data akan diedit / simpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE tmhs set
											nis = '$_POST[nis]',
											nama = '$_POST[nama]',
											alamat = '$_POST[alamat]',
											jurusan = '$_POST[jurusan]'
										WHERE id_mhs = '$_GET[id]'
										 ");
			if($edit)
			{
				echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=pengirim_data';
					  </script>";
			}
			else
			{
				echo "<script>
						alert('Ubah Data GAGAL!!');
						document.location='?halaman=pengirim_data';
					  </script>";
			}
		}
		else
		{
			//perintah simpan data baru
			//simpan data
			$simpan = mysqli_query($koneksi, "INSERT INTO tmhs 
											  VALUES ('', 
											  '$_POST[nis]', 
											  '$_POST[nama]' ,
											  '$_POST[alamat]',
											  '$_POST[jurusan]'
											  ) ");
			if($simpan)
			{
				echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=pengirim_data';
					  </script>";
			}else
			{
				echo "<script>
						alert('Simpan Data GAGAL!!');
						document.location='?halaman=pengirim_data';
					  </script>";
			}
		}


		
	}

	//Uji Jika klik tombol edit / hapus
	if(isset($_GET['hal']))
	{

		if($_GET['hal'] == "edit")
		{

			//tampilkan data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs where id_mhs='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//jika data ditemukan, maka data ditampung ke dalam variabel
				$vnis = $data['nis'];
				$vnama = $data['nama'];
				$valamat = $data['alamat'];
				$vjurusan = $data['jurusan'];
			}

		}else{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs='$_GET[id]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=pengirim_data';
					  </script>";
			}

		}

		

	}

?>


<div class="card mt-3">
  <div class="card-header bg-primary text-white ">
    Form Input Data Pemesanan
  </div>
  <div class="card-body">
    <form method="post" action="">
	  <div class="form-group">
	    <label for="nis">Kode Pesanan</label>
	    <input type="text" class="form-control" id="nis" name="nis" value="<?=@$vnis?>">
	  </div>
	  <div class="form-group">
	    <label for="nama">Nama</label>
	    <input type="text" class="form-control" id="nama" name="nama" value="<?=@$vnama?>">
	  </div>
	  <div class="form-group">
	    <label for="alamat">Kode Kursi</label>
	    <input type="text" class="form-control" id="alamat" name="alamat" value="<?=@$valamat?>">
	  </div>
	  <div class="form-group">
	    		<label for=jurusan>Rute Tujuan</label>
	    		<select class="form-control" name="jurusan" id="jurusan">
					<option value="<?=@$vjurusan?>"><?=@$vjurusan?></option>
					<option value="Jakarta - Bali">Jakarta - Bali</option>
					<option value="Jakarta Bandung">Jakarta - Bandung</option>
					<option value="Jakarta - Kupang">Jakarta - Kupang</option>
					<option value="Jakarta - Padang">Jakarta - Padang</option>
				</select>
			</div>

	  <button type="submit" name="bsimpan" class="btn btn-success">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header bg-info text-white ">
    Data Pemesanan
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
    	<tr>
    		<th>No</th>
    		<th>Kode Pesanan</th>
    		<th>Nama</th>
			<th>Kode Kursi</th>
			<th>Rute Tujuan</th>
			<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :

    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['nis']?></td>
			<td><?=$data['nama']?></td>
			<td><?=$data['alamat']?></td>
			<td><?=$data['jurusan']?></td>
    		<td>
    			<a href="?halaman=pengirim_data&hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-success" >Edit </a>
    			<a href="?halaman=pengirim_data&hal=hapus&id=<?=$data['id_mhs']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>