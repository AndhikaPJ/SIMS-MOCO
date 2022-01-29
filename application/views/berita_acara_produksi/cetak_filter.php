<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRINT BERITA ACARA PRODUKSI</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url();?>/assets/logo5.png" type="image/x-icon"/>
</head>
  <?php 
function rupiah($angka){
  
  $hasil_rupiah = "" . number_format($angka,0,',','.');
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
                <img width="60px" src="<?= base_url() ?>assets/log.png">
            </td>
            <td>
                <font style="font-size: 17px; font-weight: bold;">BERITA ACARA</font> <br>
                <font style="font-size: 17px; font-weight: bold;">KPB CRUSHED COAL IUP PT BHUMI RANTAU ENERGI</font> <br>
                <font style="font-size: 17px; font-weight: bold;">PERIODE: <?php echo strtoupper(tgl_indo($tgl1));?> s/d <?php echo strtoupper(tgl_indo($tgl2));?></font> <br>
            </td>
             <td>
                <img width="60px" src="<?= base_url() ?>assets/logo5.png">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>
     <div style="text-align: center;">
        <font size="2">Nomor : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/BA/HRS-BRE/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/2021</font>
    </div>
    <br>
    <span style="text-align: justify; display:block;">
    Berdasarkan Perjanjian Kontraktor Pertambangan Batubara No. 007-P/C-Leg/BRE/V/2018 antara PT Bhumi Rantau Energi dan PT Hasnur Riung Sinergi, maka telah disepakati bersama hasil penimbangan jembatan timbang sebagai volume acuan pencatatan pelaksanaan kegiatan pengangkutan batubara (crushed coal) sebagai berikut:
    </span> <br>


 <table border="2" cellspacing="2" width="100%" style="font-size: 10px;">
        <thead style="background-color: #d5eacf; text-align: center;">
                                                  <tr>
                                                        <th>PEKERJAAN</th>
                                                        <th colspan="2">JUMLAH</th>
                                                        <th colspan="2">JARAK</th>
                                                        <th>KETERANGAN</th>
                          </tr>
                      </thead>
                      <tbody >
                      <tr>
                           <td>Kegiatan Pengangkutan Batubara (KPB CRUSHED COAL)</td>
                           <td style="text-align: center;"><?php echo rupiah($data_berita_acara_produksi['bb']);?></td>
                           <td width="25px; text-align: center;">MT</td>
                           <td style="text-align: center;">59.100</td>
                           <td width="25px; text-align: center;">Meter</td>
                           <td style="text-align: center;">Sei Putting KPP-BGM</td>
                      </tr>
                      <tr>
                           <td>Kegiatan Pengangkutan Batubara (KPB CRUSHED COAL)</td>
                           <td style="text-align: center;"><?php echo rupiah($data_berita_acara_produksi2['bb']);?></td>
                           <td width="25px; text-align: center;">MT</td>
                           <td style="text-align: center;">53.020</td>
                           <td width="25px; text-align: center;">Meter</td>
                           <td style="text-align: center;">Sei Putting H3254</td>
                      </tr>
                      <tr>
                           <td>Kegiatan Pengangkutan Batubara (KPB CRUSHED COAL)</td>
                           <td style="text-align: center;"><?php echo rupiah($data_berita_acara_produksi3['bb']);?></td>
                           <td width="25px; text-align: center;">MT</td>
                           <td style="text-align: center;">53.020</td>
                           <td width="25px; text-align: center;">Meter</td>
                           <td style="text-align: center;">TCT</td>
                      </tr>
                      <?php $total=$data_berita_acara_produksi['bb']+$data_berita_acara_produksi2['bb']+$data_berita_acara_produksi3['bb'];?>
                      <tr>
                           <td>SUMMARY KPB Crushed Coal Periode</td>
                           <td style="text-align: center;"><?php echo rupiah($total);?></td>
                           <td width="25px; text-align: center;">MT</td>
                           <td colspan="3"></td>
                      </tr>
                
                </tbody>
              </table>


    <br><br>

  
    <div style="text-align: left; display: inline-block; float: right; ">
        <label>
            <br>
            <p style="text-align: center;">
                Rantau, <?= tgl_indo(date('Y-m-d')) ?><br><br>
                Dibuat Oleh,<br>
                PT HASNUR RIUNG SINERGI
            </p>
            <br><br><br>
            <p style="text-align: center;">
                <br>
                <b><u>MH. Usep Arip Topani</u></b><br>
                  Project Manajer <br>
            </p>
        </label>
    </div>
  
    <div style="text-align: left; display: inline-block; float: left; margin-right: 50px;">
        <label>
            <br>
            <br>
            <p style="text-align: center;">
            <br>Disetujui Oleh,<br>
                PT BHUMI RANTAU ENERGI
            </p>
            <br><br><br>
            <p style="text-align: center;">
                <br>
                <b><u>Yardi Aswan</u></b><br>
                  Operation Manager <br>
            </p>
        </label>
    </div>

    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->

    
   
</body>

</html>