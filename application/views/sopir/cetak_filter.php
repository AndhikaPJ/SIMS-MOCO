<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>PRINT DATA SOPIR</title>
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
        <font size="3"><b><u>LAPORAN DATA DRIVER <br> <?php echo strtoupper(tgl_indo($tgl1));?> s/d <?php echo strtoupper(tgl_indo($tgl2));?></u></b></font><br>
    </div>
    <br>

    <br>
    <table border="1" cellspacing="0" width="100%" style="font-size: 10px;">
        <thead style="background-color: #d5eacf; text-align: center; ">
                                                    <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;text-align:  center;">No.</th>
                                                        <th style="text-align:  center;">Foto Sopir</th>
                                                        <th style="text-align:  center;">Nomor Unit</th>
                                                        <th style="text-align:  center;">Nama Armada</th>
                                                        <th style="text-align:  center;">Nama Perusahaan</th>
                                                        <th style="text-align:  center;">NIK</th>
                                                        <th style="text-align:  center;">Nama Sopir</th>
                                                        <th style="text-align:  center;">Tempat Lahir</th>
                                                        <th style="text-align:  center; flex: 0 0 auto; min-width: 5em;text-align:  center;">Tanggal Lahir</th>
                                                        <th style="text-align:  center;">Alamat</th>
                                                        <th style="text-align:  center;">No HP</th>
                                                        <th style="text-align:  center;">Jenis SIM</th>
                                                        <th style="text-align:  center;">Posisi</th>
                                                        <th style="text-align:  center;">Tanggal Masuk Sopir</th>
                                                    </tr>
                                            </thead>
                                            <tfoot style="background-color: #d5eacf; text-align: center; "> 
                                                    <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em;text-align:  center;">No.</th>
                                                        <th style="text-align: center;">Foto Sopir</th>
                                                        <th style="text-align: center;">Nomor Unit</th>
                                                        <th style="text-align: center;">Nama Armada</th>
                                                        <th style="text-align: center;">Nama Perusahaan</th>
                                                        <th style="text-align: center;">NIK</th>
                                                        <th style="text-align: center;">Nama Sopir</th>
                                                        <th style="text-align: center;">Tempat Lahir</th>
                                                        <th style="text-align: center; flex: 0 0 auto; min-width: 5em;text-align:  center;">Tanggal Lahir</th>
                                                        <th style="text-align: center;">Alamat</th>
                                                        <th style="text-align: center;">No HP</th>
                                                        <th style="text-align: center;">Jenis SIM</th>
                                                        <th style="text-align: center;">Posisi</th>
                                                        <th style="text-align: center;">Tanggal Masuk Sopir</th>
                                                    </tr>
                                            </tfoot>
                                            <tbody style="text-align: center;">
                                                <?php $no=1; foreach ($data_sopir->result_array() as $i) :
                                                    $id_sopir=$i['id_sopir'];
                                                  ?>
                                                 <tr>
                                              
                                                  <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><img height="70" width="70"  src="<?php echo base_url().'assets/image/'.$i['foto_sopir'];?>"></td>
                                                <td><?php echo $i['nomor_unit'];?></td>
                                                <td><?php echo $i['nama_armada'];?></td>
                                                  <td><?php echo $i['nama_vendor'];?></td>
                                                <td><?php echo $i['nik'];?></td>
                                                <td><?php echo $i['nama_sopir'];?></td>
                                                <td><?php echo $i['tempat_lahir'];?></td>
                                                <td><?php echo date('d F Y',strtotime($i['tanggal_lahir']));?></td>
                                                  <td><?php echo $i['alamat'];?></td>
                                                  <td><?php echo $i['no_hp'];?></td>
                                                <td><?php echo $i['jenis_sim'];?></td>
                                                <td><?php echo $i['posisi'];?></td>
                                                <td><?php echo date('d F Y',strtotime($i['tanggal_masuk_sopir']));?></td>
                      
            
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

