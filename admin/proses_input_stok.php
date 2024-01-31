<?php
include "../config.php";
if(isset($_POST['submit'])){
		$id			=  $_POST['id'];
		$tanggal		=  $_POST['tgl'];
		$waktu			=  $_POST['jam'];
		$stokm			=  $_POST['stok'];
		$petugas		=  $_POST['ptgs'];


$a = mysqli_query($koneksi, "Select * from tb_barang where id_barang = '$id'");
$b = mysqli_fetch_array($a);
$namab 			= $b['nama_barang'];
$nama_supplier 	= $b['nama_supplier'];
$stoka 			= $b['stok'];
$satuan			= $b['satuan'];
$tstok 			= $stokm + $stoka;

$sql = mysqli_query($koneksi, "update tb_barang set stok = '$tstok' where id_barang = '$id' ");
$sql2 =mysqli_query($koneksi, "insert into barangmasuk values('','$tanggal','$waktu','$nama_supplier','$stokm','$namab','$satuan','$tstok','$petugas')");
if($sql && $sql2){
	echo "<script>alert('data berhasil diinput');
		document.location.href='barang_masuk.php'</script>";

	
	}else{
	echo "gagal masukkan";
	}
}
	?>