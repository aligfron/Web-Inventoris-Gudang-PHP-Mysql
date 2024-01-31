<?php
include "../config.php";
if(isset($_POST['submit'])){
		$id	=  $_POST['id'];
		$nama	=  $_POST['nama'];
		$alamat	=  $_POST['alamat'];
		$kd2	=  $_POST['no_tlp'];
		$kd3	=  $_POST['nama_seles'];
$sql = mysqli_query($koneksi, "update tb_supplier set
	nama_supplier ='$nama',
	alamat ='$alamat',
	no_tlp ='$kd2',
	nama_seles = '$kd3'
	where id_supplier = '$id' ;
	");

if($sql){
	echo "<script>alert('data berhasil diubah');
		document.location.href='master_suplayer.php'</script>";

	
	}else{
	echo "gagal masukkan";
	}
}
	?>