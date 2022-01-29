<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN TARGET PRODUKSI</title>
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
        <font size="3"><b><u>LAPORAN DATA TARGET PRODUKSI <br> TAHUN <?php echo strtoupper($tahun);?> BULAN <?php echo strtoupper($bulan);?></u></b></font><br>
    </div>
    <br>

    <br>
    <table border="1" cellspacing="0" width="100%" style="font-size: 10px;">
        <thead style="background-color: #d5eacf; text-align: center; ">
                       <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Tahun</th>
                                                        <th>Bulan</th>
                                                        <th>Volume Bulanan</th>
                                                        <th>Volume Harian</th>
                                                        <th>Jumlah Harian</th>
                                                        
                          </tr>
                      </thead>
                      <tfoot style="background-color: #d5eacf; text-align: center; ">
                          <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Tahun</th>
                                                        <th>Bulan</th>
                                                        <th>Volume Bulanan</th>
                                                        <th>Volume Harian</th>
                                                        <th>Jumlah Harian</th>
                                                        
                          </tr>
                      </tfoot>
                      <tbody style="text-align: center;">
                        <?php $no=1; foreach ($data_target_produksi->result_array() as $i) :
                                                $id_target_produksi=$i['id_target_produksi'];
                                                $volume_harian=$i['volume_bulanan']/$i['jumlah_hari'];
                                              ?>
                         <tr>
                                              
                                                <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><?php echo $i['nama_vendor'];?></td>
                                                <td><?php echo $i['tahun'];?></td>
                                                <td><?php echo $i['bulan'];?></td>
                                                <td><?php echo $i['volume_bulanan'];?></td>
                                                <td><?php echo round($volume_harian,2);?></td>
                                                <td><?php echo $i['jumlah_hari'];?></td>
                      
            
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

