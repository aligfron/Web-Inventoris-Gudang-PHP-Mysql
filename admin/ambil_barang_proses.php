<?php 
include '../config.php';

	if (isset($_POST['submit'])) {
		$barang 	=$_POST['nama'];
		$tgl 		=$_POST['tgl'];
		$jam		=$_POST['jam'];
		$pgbl       =$_POST['pgbl'];
		$dvs	 	=$_POST['dvs'];
		$id 		=$_POST['id'];
		$stok 		=$_POST['stok'];
		$jml			=$_POST['jml'];
		$satuan     =$_POST['satuan'];
		$ptgs	 	=$_POST['ptgs'];

		$sql=mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang ='$id'");
		$row=mysqli_fetch_array($sql);
		$jumlahbarang=$row['stok'];
		$sisa=$jumlahbarang-$jml;

		if ($jumlahbarang=='0') {
			echo "<script> alert('Stok Barang Habis !'); </script>";
			echo "<meta http-equiv='refresh' content='0 url=ambil_barang.php'>";
		}else if ($sisa<'0') {
			echo "<script> alert('Barang Yang Anda Pilih Melebihi Stok !'); </script>";
			echo "<meta http-equiv='refresh' content='0 url=ambil_barang.php'>";
		}else{
			$query=mysqli_query($koneksi, "INSERT INTO barangkeluar VALUES ('','$tgl','$jam','$pgbl','$dvs','$jml','$satuan','$barang','$sisa','$ptgs')");
			$sql = mysqli_query($koneksi, "update tb_barang set stok = '$sisa' where id_barang = '$id' ");

			if ($query) {
					echo "<script> alert('Data Sudah Masuk !'); </script>";
					echo "<meta http-equiv='refresh' content='0 url=barang_keluar.php'>";
				
			}else{
				echo "<script> alert('Input Gagal !'); </script>";
				echo "<meta http-equiv='refresh' content='0 url=ambil_barang.php'>";
			}
		}
	}


 ?>