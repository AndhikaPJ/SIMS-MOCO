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
                <img width="70px" src="<?= base_url() ?>assets/image002.png">
            </td>
           <td>
                <font size="6"><B>PT BHUMI RANTAU ENERGI</B></font> <br>
                <font size="6">COAL MINE PROJECT</font> <br>
            </td>
             <td>
                <img width="70px" src="<?= base_url() ?>assets/logo5.png">
            </td>
        </tr>
    </table>
    <div style="background-color: #586cd1; text-align: center; " >
        <font size="7" ><b>MINE PERMIT</b></font><br>
    </div>
    <br>

    <br>

     <img  src="<?php echo base_url().'assets/image/'.$data_pengajuan_simper['foto_sopir'];?>" height="300" width="260" style="margin: 50px 50px 50px 50px;  border: 5px solid #555;">

    <div style="text-align: left; display: inline-block; float: right; margin: 50px 50px 50px 50px; font-size: 20px; text-align: center;">
      <br>
      <br>
      <br>
      <b>Jabatan</b><br>
      <span style="font-size: 23px;"><?php echo $data_pengajuan_simper['posisi'];?></span>
      <hr size="2px" color="black">
      <b><?php echo $data_pengajuan_simper['nama_vendor'];?></b><br>
      <span style="font-size: 23px;">PRODUKSI</span>
      <hr size="2px" color="black">
      <b>Masa Berlaku</b><br>
      <b><?php echo tgl_indo(date('Y-m-d', strtotime($data_pengajuan_simper['tanggal_pengajuan']. ' + 1 year')));?></b><br>
      <hr size="2px" color="black">
    </div> 
<br>
<br>
<br>
<center>
<span  style="font-size: 34px; "><?php echo $data_pengajuan_simper['nama_sopir'];?></span>

<hr size="2px" color="black" width="50%">

<br>
<br>
<br>
<br>
<br>
<br>
<span  style="font-size: 34px; font-family: Comic Sans MS; color: #e8ac43;">PT HASNUR RIUNG SINERGI</span>
</center>


<style type="text/css">
@media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}

</style>
<div class="pagebreak"> </div>



  <table border="0" align="center" width="100%" style="background-color: #586cd1;">
        <tr align="center">
            <td>
                <img width="70px" src="<?= base_url() ?>assets/image002.png">
            </td>
           <td>
                <font size="7"><B>SIMPER</B></font> <br>
            </td>
             <td>
                <img width="70px" src="<?= base_url() ?>assets/logo5.png">
            </td>
        </tr>
    </table>


    <table border="0"  style="margin-left: 30px; font-size: 23pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
<BR>
  <tbody>
<tr>
      <td width="300px">REGISTRATION NO.</td>
      <td width="10px">: </td>
      <td>2285/KPS/BRE-HRS/01/22</td>
  </tr>
 <tr>
      <td width="300px">DRIV. LICENSE NO.</td>
      <td width="10px">: </td>
      <td><?php echo $data_pengajuan_simper['jenis_sim'];?> / <?php echo $data_pengajuan_simper['nomor_sim'];?></td>
  </tr>
 <tr>
      <td width="300px">DRIV. LICENSE EXP.</td>
      <td width="10px">: </td>
      <td><?php echo date('d / m / Y', strtotime($data_pengajuan_simper['tanggal_pengajuan']. ' + 1 year'));?></td>
  </tr>


 </tbody>
<br>
 <table border="1" cellspacing="0" width="100%" style="font-size: 23pt; "> <br><center>
 <span style="font-size: 23pt">RECOMMEDED & AUTHORIZED TO OPERATE</span>
 </center>
        <thead style="background-color: #e8ac43; text-align: center;">
                                                      <tr>
                                                        <th style="flex: 0 0 auto; min-width: 10em;" >UNIT</th>
                                                        <th  >FULL</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                 <tr>
                                              
                                                <td><?php echo $data_pengajuan_simper['nama_armada'];?></td>
                                                <td><img src="<?php echo base_url();?>assets/check.png" width="20px"></td>
            
                                          </tr>

                                          <tr >
                                            <td >&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>

                                          <tr >
                                            <td >&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>

                                          <tr >
                                            <td >&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>

                                          <tr >
                                            <td >&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>

                                          <tr >
                                            <td >&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>

                
                </tbody>
              </table>


</div>
</table>



<br>
<b style="margin-left: 40px">VIOLATION</b><br>
        <table border="1" cellspacing="0" width="10%" style=" float: left; font-size: 20pt;"> 

      
                                                      <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em; background-color: green;" >1</th>
                                                        <th style="flex: 0 0 auto; min-width: 2em; background-color: yellow;" >2</th>
                                                        <th style="flex: 0 0 auto; min-width: 2em; background-color: red;" >3</th>
                                                    </tr>
                                          

                                        

              </table>
              <br>
              <br>
<b style="margin-left: 40px">ACCIDENT</b><br>
        <table border="1" cellspacing="0" width="10%" style=" float: left; font-size: 20pt;"> 

      
                                                      <tr>
                                                        <th style="flex: 0 0 auto; min-width: 2em; background-color: green;" >1</th>
                                                        <th style="flex: 0 0 auto; min-width: 2em; background-color: yellow;" >2</th>
                                                        <th style="flex: 0 0 auto; min-width: 2em; background-color: red;" >3</th>
                                                    </tr>
                                          

                                        

              </table>




<div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 20pt;">
        <label>
            <p style="text-align: center;">
                <b>KEPALA TEKNIK TAMBANG</b>
            </p>
            <br><br>
            <p style="text-align: center;">
                <b>AGUS SUBIYANTO</b><br>
            </p>
        </label>
    </div> 


</body>

</html>

