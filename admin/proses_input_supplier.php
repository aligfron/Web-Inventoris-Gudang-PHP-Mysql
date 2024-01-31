<?php
include "../config.php";
if(isset($_POST['submit'])){
		$nama	=  $_POST['nama'];
		$alamat	=  $_POST['alamat'];
		$no_tlp	=  $_POST['no_tlp'];
		$nama_seles	=  $_POST['nama_seles'];
$sql = mysqli_query($koneksi, "insert into tb_supplier values('','$nama','$alamat','$no_tlp','$nama_seles')");
if($sql){
	echo "<script>alert('data berhasil diinput');
		document.location.href='master_suplayer.php'</script>";

	
	}else{
	echo "gagal masukkan";
	}
}
	?>