<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRINT LAPORAN PRODUKSI ALL</title>
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
        <font size="3"><b><u>LAPORAN DATA PRODUKSI <br> <?php echo strtoupper(tgl_indo($tgl1));?> SAMPAI DENGAN <?php echo strtoupper(tgl_indo($tgl2));?></u></b></font><br>
    </div>
    <br>

    <br>
    <table border="1" cellspacing="0" width="100%" style="font-size: 10px;">
        <thead style="background-color: #d5eacf; text-align: center; ">
                                   <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>No Tiket</th>
                                                        <th>Jenis Pengangkutan</th>
                                                        <th>Shift</th>
                                                        <th>Nama Sopir</th>
                                                        <th>Nomor Unit</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Jam Masuk</th>
                                                        <th>Tanggal Keluar</th>
                                                        <th>Jam Keluar</th>
                                                        <th>Berat Kosongan</th>
                                                        <th>Berat Kotor</th>
                                                        <th>Berat Bersih</th>
                                                        <th>Lokasi</th>
                                                        <th>Tanggal Validasi</th>
                                                        <th>Jam Validasi</th>
                                                    </tr>
                                            </thead>
                                            <tfoot style="background-color: #d5eacf; text-align: center; ">
                                                    <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>No Tiket</th>
                                                        <th>Jenis Pengangkutan</th>
                                                        <th>Shift</th>
                                                        <th>Nama Sopir</th>
                                                        <th>Nomor Unit</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Jam Masuk</th>
                                                        <th>Tanggal Keluar</th>
                                                        <th>Jam Keluar</th>
                                                        <th>Berat Kosongan</th>
                                                        <th>Berat Kotor</th>
                                                        <th>Berat Bersih</th>
                                                        <th>Lokasi</th>
                                                        <th>Tanggal Validasi</th>
                                                        <th>Jam Validasi</th>
                                                    </tr>
                                            </tfoot>
                                            <tbody style="text-align: center;">
                                                <?php $no=1; foreach ($data_produksi->result_array() as $i) :
                                                    $id_produksi=$i['id_produksi'];
                                                $berat_bersih=$i['berat_kotor']-$i['berat_kosongan'];
                                                  ?>
                                                 <tr>
                                              
                                                  <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><?php echo $i['no_tiket'];?></td>
                                                <td><?php echo $i['jenis_pengangkutan'];?></td>
                                                <td><?php echo $i['shift'];?></td>
                                                <td><?php echo $i['nama_sopir'];?></td>
                                                <td><?php echo $i['nomor_unit'];?></td>
                                                <td><?php echo $i['nama_vendor'];?></td>
                                                <td><?php echo $i['tanggal_masuk'];?></td>
                                                <td><?php echo $i['jam_masuk'];?></td>
                                                <td><?php echo $i['tanggal_keluar'];?></td>
                                                <td><?php echo $i['jam_keluar'];?></td>
                                                <td><?php echo $i['berat_kosongan'];?></td>
                                                <td><?php echo $i['berat_kotor'];?></td>
                                                <td><?php echo $berat_bersih;?></td>
                                                <td><?php echo $i['lokasi'];?></td>
                                                <td><?php echo date('Y-m-d',strtotime($i['tanggal_validasi']));?></td>
                                                <td><?php echo $i['jam_validasi'];?></td>
                      
            
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
                <b>Diketahui oleh,</b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>Yulius Caisar</u></b><br>
                Monitoring Control Sect. Head
            </p>
        </label>
    </div> 
   
</body>

</html>

