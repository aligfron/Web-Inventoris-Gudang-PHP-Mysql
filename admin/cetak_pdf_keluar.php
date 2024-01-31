 <?php 

require 'vendor/autoload.php';
include '../config.php';

$bulan=$_GET['Bulan'];
$tahun=$_GET['Tahun'];

$mpdf = new mPDF();
$html=' <!DOCTYPE html>
    <html>
    <head>
      <title>Laporan Inventaris Keluar Barang</title>
    </head>
    <body>
      <table align="center">
      <tr>
        <td align="center">
           <h2>INVENTARIS GUDANG BAROKAH (Barang Keluar)</h2>
        </td>
      </tr>
      <tr>
        <td align="center">
          <strong>Jl. Halim Perdana Kusuma(Ring Road) Telp. (031)3092223<br>
          Kecamatan Bangkalan<br><br></strong>
          Email : barokahxx@yahoo.com  Kode Pos : 69116
        </td>
      </tr>
    </table>

    <table width="100%">
       <tr>
         <td><hr></td>
       </tr>
    </table>
<label>Bulan : '.$bulan.'</label><br>
<label>Tahun : '.$tahun.'</label><br><br>
<table border="1" width="100%" cellspacing="0"  align="center">
  <tr>
    <td align="center">No</td>
    <td align="center">Kode Transsaksi</td>
    <td align="center">waktu Transsaksi</td>
    <td align="center">Nama Barang</td>
    <td align="center">Stok Ambil</td>
    <td align="center">Satuan</td>
    <td align="center">Sisa Stok</td>
    <td align="center">Pengambil</td>
    <td align="center">Petugas</td>
  </tr>';

  $no=1;
  $sql=mysqli_query($koneksi, "SELECT * FROM barangkeluar WHERE MONTH(tgl_keluar)=$bulan AND YEAR(tgl_keluar)=$tahun");
  while($row=mysqli_fetch_array($sql)){

  $html.='<tr >
        <td align="center">'.$no++.'</td>
        <td align="center">'.$row['id_keluar'].'</td>
        <td align="center">'.$row['tgl_keluar'].' ('.$row['jam'].')</td>
        <td align="center">'.$row['nama_barang'].'</td>
        <td align="center">'.$row['jumlah_keluar'].'</td>
        <td align="center">'.$row['satuan'].'</td>
        <td align="center">'.$row['sisa_stok'].'</td>
        <td align="center">'.$row['pengambil'].' ('.$row['divisi'].')</td>
        <td align="center">'.$row['nama_petugas'].'</td>
      </tr>';
}

$html.='</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output(); 