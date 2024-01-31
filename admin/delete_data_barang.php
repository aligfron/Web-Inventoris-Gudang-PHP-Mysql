<?php
include "../config.php";

$id = $_GET['id'];
if($id==TRUE){
	$query = mysqli_query($koneksi, "delete from tb_barang where id_barang='$id'");
	echo"<script>alert('Data Berhasil Di Hapus!!!');</script>";
	echo "<meta http-equiv='refresh' content='0 url=master_barang.php'>";
}else{
		echo"<script>alert('Data Gagal Terhapus!!!');</script>";
			echo "<meta http-equiv='refresh' content='0 url=master_barang.php'>";
}
?>