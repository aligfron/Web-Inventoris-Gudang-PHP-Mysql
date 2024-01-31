 <?php 

require 'vendor/autoload.php';
include '../config.php';

$bulan=$_GET['Bulan'];
$tahun=$_GET['Tahun'];

$mpdf = new mPDF();
$html=' <!DOCTYPE html>
    <html>
    <head>
      <title>Laporan Inventaris Stok Barang</title>
    </head>
    <body>
      <table align="center">
      <tr>
        <td align="center">
           <h2>INVENTARIS GUDANG BAROKAH (Kartu Stok)</h2>
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
    <td align="center">Nama Barang</td>
    <td align="center">waktu Transsaksi</td>
    <td align="center">Stok Masuk</td>
    <td align="center">Stok Ambil</td>
    <td align="center">Satuan</td>
    <td align="center">Stok Saat ini</td>
    <td align="center">Petugas</td>
  </tr>
';

  $no=1;
  $sql=mysqli_query($koneksi, "SELECT * FROM barangkeluar a, barangmasuk b WHERE MONTH(a.tgl_keluar)='$bulan' AND YEAR(a.tgl_keluar)='$tahun' and MONTH(b.tgl_masuk)='$bulan' AND YEAR(b.tgl_masuk)='$tahun';");
  while($row=mysqli_fetch_array($sql)){
      $nama_barang = $row['nama_barang'];
      if ($nama_barang == $nama_barang) {
       echo "Nama Barang : ".$nama_barang;
  $html.='
  <tr >
        <td align="center">'.$no++.'</td>
        <td align="center">'.$row['nama_barang'].'</td>
        <td align="center">'.$row['tgl_keluar'].' ('.$row['tgl_masuk'].')</td>
        <td align="center">'.$row['stokmasuk'].'</td>
        <td align="center">'.$row['jumlah_keluar'].'</td>
        <td align="center">'.$row['satuan'].'</td>
        <td align="center">'.$row['total_stok'].'</td>
        <td align="center">'.$row['nama_petugas'].'</td>
      </tr>';
    }
}

$html.='</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output(); 