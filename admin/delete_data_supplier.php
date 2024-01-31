<?php
include "../config.php";

$id = $_GET['id'];
if($id==TRUE){
	$query = mysqli_query($koneksi, "delete from tb_supplier where id_supplier='$id'");
	echo"<script>alert('Data Berhasil Di Hapus!!!');</script>";
	echo "<meta http-equiv='refresh' content='0 url=master_suplayer.php'>";
}else{
		echo"<script>alert('Data Gagal Terhapus!!!');</script>";
			echo "<meta http-equiv='refresh' content='0 url=master_suplayer.php'>";
}
?>