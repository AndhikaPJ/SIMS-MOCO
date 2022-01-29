<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>PRINT PENGAJUAN SIMPER</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url();?>/assets/logo5.png" type="image/x-icon"/>
</head>

  <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
}
?>

  <?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}?>
<body onLoad="window.print()">
    <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img width="100%"  height="130px" src="<?= base_url() ?>assets/kop.PNG">
            </td>
        </tr>
    </table>


    <span style="float:right; font-size: 11px;">
        Tanggal Cetak : <?php echo tgl_indo(date('Y-m-d'));?>
    </span>
    <br>
    <div style="text-align: center; ">
        <font size="3"><b><u>LAPORAN PENGAJUAN SIMPER</u></b></font><br>
    </div>
    <br>

    <br>

     <img  src="<?php echo base_url().'assets/image/'.$data_pengajuan_simper['foto_sopir'];?>" height="130" width="100" align="right"style="margin: 10px 30px 20px 20px;">
<table border="0"  style="margin-left: 30px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 

  <tbody>
<tr>
      <td width="190px">NIK</td>
      <td width="10px">: </td>
      <td><?php echo $data_pengajuan_simper['nik'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Nama Sopir</td>
      <td width="10px">: </td>
      <td><?php echo $data_pengajuan_simper['nama_sopir'];?></td>
      <td></td>
  </tr>

  <tr>
      <td width="190px">Posisi</td>
      <td width="10px">: </td>
      <td><?php echo $data_pengajuan_simper['posisi'];?></td>
      <td></td>
  </tr>
   <tr>
      <td width="190px">Nomor Unit</td>
      <td width="10px">: </td>
      <td><?php echo $data_pengajuan_simper['nomor_unit'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Nama Armada</td>
      <td width="10px">: </td>
      <td><?php echo $data_pengajuan_simper['nama_armada'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Nama Perusahaan</td>
      <td width="10px">: </td>
      <td><?php echo $data_pengajuan_simper['nama_vendor'];?></td>
      <td></td>
  </tr>

  <tr>
      <td width="190px">Jenis SIM</td>
      <td width="10px">: </td>
      <td><?php echo $data_pengajuan_simper['jenis_sim'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Jenis SIMPER</td>
      <td width="10px">: </td>
      <td><?php echo $data_pengajuan_simper['jenis_simper'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Tanggal Pengajuan</td>
      <td width="10px">: </td>
      <td><?php echo tgl_indo($data_pengajuan_simper['tanggal_pengajuan']);?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Nomor SIM</td>
      <td width="10px">: </td>
      <td><?php echo $data_pengajuan_simper['nomor_sim'];?></td>
      <td></td>
  </tr>


 </tbody>



</div>
</table>


<style type="text/css">
@media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}

</style>

<div class="pagebreak"> </div>
<div style="text-align: center; ">
        <font size="3"><b><u>LAMPIRAN</u></b></font><br>
    </div>
    <br>
<hr>
<center>FOTO KTP
  <br>
    <img  src="<?php echo base_url().'assets/image/'.$data_pengajuan_simper['foto_ktp'];?>" height="300" width="400" >
</center>
<hr>
<center>FOTO SIM
  <br>
    <img  src="<?php echo base_url().'assets/image/'.$data_pengajuan_simper['foto_sim'];?>" height="300" width="400" >
</center>

</body>

</html>

