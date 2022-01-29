<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>PRINT PENGAJUAN SIMPER</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url();?>/assets/logo5.png" type="image/x-icon"/>
</head>
  <style type="text/css">
    @media print{@page {size: landscape}}
  </style>
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
        <font size="3"><b><u>LAPORAN DATA PENGAJUAN SIMPER <br> <?php echo strtoupper(tgl_indo($tgl1));?> SAMPAI DENGAN <?php echo strtoupper(tgl_indo($tgl2));?></u></b></font><br>
    </div>
    <br>

    <br>
    <table border="1" cellspacing="0" width="100%" style="font-size: 10px;">
        <thead style="background-color: #d5eacf; text-align: center;">
                                                      <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em; center;">No.</th>
                                                        <th style="center;">Foto Sopir</th>
                                                        <th style="center;">Nomor Unit</th>
                                                        <th style="center;">Nama Armada</th>
                                                        <th style="center;">Nama Perusahaan</th>
                                                        <th style="center;">NIK</th>
                                                        <th style="center;">Nama Sopir</th>
                                                        <th style="center;">Posisi</th>
                                                        <th style="center;">Jenis Simper</th>
                                                        <th style="center;">Tanggal Pengajuan</th>
                                                        <th style="center;">Masa Berlaku</th>
                                                        <th style="center;">Status Pengajuan</th>
                                                        <th style="center;">Keterangan Admin</th>
                                                        <th style="center;">Nomor SIM</th>
                                                    </tr>
                                            </thead>
                                            <tfoot style="background-color: #d5eacf; text-align: center; ">
                                                      <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em; center;">No.</th>
                                                        <th style="center;">Foto Sopir</th>
                                                        <th style="center;">Nomor Unit</th>
                                                        <th style="center;">Nama Armada</th>
                                                        <th style="center;">Nama Perusahaan</th>
                                                        <th style="center;">NIK</th>
                                                        <th style="center;">Nama Sopir</th>
                                                        <th style="center;">Posisi</th>
                                                        <th style="center;">Jenis Simper</th>
                                                        <th style="center;">Tanggal Pengajuan</th>
                                                        <th style="center;">Masa Berlaku</th>
                                                        <th style="center;">Status Pengajuan</th>
                                                        <th style="center;">Keterangan Admin</th>
                                                        <th style="center;">Nomor SIM</th>
                                                    </tr>
                                            </tfoot>
                                            <tbody style="text-align: center;">
                                                <?php $no=1; foreach ($data_pengajuan_simper->result_array() as $i) :
                                                    $id_pengajuan_simper=$i['id_pengajuan_simper'];
                                                  ?>
                                                 <tr>
                                              
                                                <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><img height="70" width="70"  src="<?php echo base_url().'assets/image/'.$i['foto_sopir'];?>"></td>
                                                <td><?php echo $i['nomor_unit'];?></td>
                                                <td><?php echo $i['nama_armada'];?></td>
                                                <td><?php echo $i['nama_vendor'];?></td>
                                                <td><?php echo $i['nik'];?></td>
                                                <td><?php echo $i['nama_sopir'];?></td>
                                                <td><?php echo $i['posisi'];?></td>
                                                <td><?php echo $i['jenis_simper'];?></td>
                                                <td><?php echo tgl_indo($i['tanggal_pengajuan']);?></td>
                                                <td><?php echo tgl_indo(date('Y-m-d', strtotime($i['tanggal_pengajuan']. ' + 1 year')));?></td>
                                                <td><?php echo $i['status_pengajuan'];?></td>
                                                <td><?php echo $i['keterangan_admin'];?></td>
                                                <td><?php echo $i['nomor_sim'];?></td>
            
            </tr>
            <?php endforeach ?>
                
                </tbody>
              </table>


    <br><br><br>

<div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11px;">
        <label>
            Tapin, <?php echo tgl_indo(date('Y-m-d'));?> 
            <br>
            <p style="text-align: center;">
                <b>Diketahui oleh</b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>Yulius Caisar</u></b><br>
                Monitoring Control Sect, Head
            </p>
        </label>
    </div> 
   
</body>

</html>

