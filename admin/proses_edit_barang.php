<?php
include "../config.php";
if(isset($_POST['submit'])){
		$id	=  $_POST['id'];
		$nama	=  $_POST['nama'];
		$kd2	=  $_POST['nama_supplier'];
		$jenis	=  $_POST['jenis'];
		$jumlah	=  $_POST['kode'];
		$kd3	=  $_POST['satuan'];
$sql = mysqli_query($koneksi, "update tb_barang set
	nama_barang ='$nama',
	jenis = '$jenis',
	nama_supplier ='$kd2',
	kode_barang ='$jumlah',
	satuan = '$kd3'
	where id_barang = '$id' ;
	")or die (mysqli_error());

if($sql){
	echo "<script>alert('data berhasil diubah');
		document.location.href='master_barang.php'</script>";

	
	}else{
	echo "gagal masukkan";
	}
}
	?>