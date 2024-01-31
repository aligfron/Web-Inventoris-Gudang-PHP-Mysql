<?php
include "../config.php";
if(isset($_POST['submit'])){
		$tanggal		=  $_POST['tanggal'];
		$waktu			=  $_POST['waktu'];
		$nama_supplier	=  $_POST['nama_supplier'];
		$namab			=  $_POST['namab'];
		$jenis			=  $_POST['jenis'];
		$kode			=  $_POST['kode'];
		$satuan			=  $_POST['satuan'];
		$stokm			=  $_POST['stokm'];
		$petugas		=  $_POST['petugas'];
$sql = mysqli_query($koneksi, "insert into tb_barang values('','$namab','$jenis','$nama_supplier','$stokm','$kode','$satuan')");
$sql2 = mysqli_query($koneksi, "insert into barangmasuk values('','$tanggal','$waktu','$nama_supplier','$stokm','$namab','$satuan','$stokm','$petugas')");
if($sql && $sql2){
	echo "<script>alert('data berhasil diinput');
		document.location.href='barang_masuk.php'</script>";

	
	}else{
	echo "gagal masukkan";
	}
}
	?>