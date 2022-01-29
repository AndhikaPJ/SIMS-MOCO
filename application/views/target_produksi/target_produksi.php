

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">TARGET PRODUKSI</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-inner mt--5">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"></h4>
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH TARGET PRODUKSI</button>
                   <a type="button" class="btn btn-info btn-sm" target="_blank" href="<?php echo base_url();?>target_produksi/cetak"><i class="fa fa-print"></i> PRINT</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                          <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Tahun</th>
                                                        <th>Bulan</th>
                                                        <th>Volume Bulanan</th>
                                                        <th>Volume Harian</th>
                                                        <th>Jumlah Harian</th>
                                                        <th style="text-align: right;">Action</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Tahun</th>
                                                        <th>Bulan</th>
                                                        <th>Volume Bulanan</th>
                                                        <th>Volume Harian</th>
                                                        <th>Jumlah Harian</th>
                                                        <th style="text-align: right;">Action</th>
                          </tr>
                      </tfoot>
                      <tbody>
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
                                             
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_target_produksi;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_target_produksi;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
                                                  </div>
                                                </td>
                                              </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>       
          
        </div>
      </div>


       <form  action="<?php echo base_url().'target_produksi/simpan_target_produksi'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH TARGET PRODUKSI</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Perusahaan *</label>
                                        <select class="form-control" name="id_vendor" required>
                                          <option value="">--Pilih Perusahaan--</option>
                                          <?php foreach ($this->db->get('vendor')->result_array() as $key):?>
                                            <option value="<?php echo $key['id_vendor'];?>"><?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tahun *</label>
                                        <select class="form-control" name="tahun" required>
                                          <option value="">--Pilih tahun--</option>
                                          <?php $thn=2022; for ($i=0; $i < 20; $i++) { ?>
                                              <option><?php echo $thn;?></option>
                                            <?php $thn=$thn-1; } ?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Bulan *</label>
                                        <select class="form-control" name="bulan" required>
                                          <option value="">--Pilih bulan--</option>
                                          <option>Januari</option>
                                          <option>Februari</option>
                                          <option>Maret</option>
                                          <option>April</option>
                                          <option>Mei</option>
                                          <option>Juni</option>
                                          <option>Juli</option>
                                          <option>Agustus</option>
                                          <option>September</option>
                                          <option>Oktober</option>
                                          <option>November</option>
                                          <option>Desember</option>
                                        </select> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Volume Bulanan *</label>
                                        <input required type="number" name="volume_bulanan" class="form-control" placeholder="Volume Bulanan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jumlah Hari *</label>
                                        <input required type="number" name="jumlah_hari" class="form-control" placeholder="Jumlah Hari"> 
                                  </div> 


                                
                              
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-info">SIMPAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>







  <?php foreach ($data_target_produksi->result_array() as $i) :
                                            $id_target_produksi=$i['id_target_produksi'];
                                          ?>
       <form  action="<?php echo base_url().'target_produksi/update_target_produksi'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_target_produksi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE TARGET PRODUKSI</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_target_produksi" value="<?php echo $id_target_produksi;?>">

                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Perusahaan *</label>
                                        <select class="form-control" name="id_vendor" required>
                                          <option value="">--pilih perusahaan--</option>
                                          <?php foreach ($this->db->get('vendor')->result_array() as $key):?>
                                            <option <?= ($i['id_vendor']==$key['id_vendor'])?'selected':'';?> value="<?php echo $key['id_vendor'];?>"><?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tahun *</label>
                                        <select class="form-control" name="tahun" required>
                                          <option value="">--pilih tahun--</option>
                                          <?php $thn3=2022; for ($i23=0; $i23 < 20; $i23++) { ?>
                                              <option <?= ($i23['tahun']==$thn3)?'selected':'';?> ><?php echo $thn3;?></option>
                                            <?php $thn3=$thn3-1; } ?>
                                        </select>
                                  </div> 

                                 <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Bulan *</label>
                                        <select class="form-control" name="bulan" required>
                                          <option value="">--pilih bulan--</option>
                                          <option <?= ($i['bulan']="Januari")?'selected':'';?> >Januari</option>
                                          <option <?= ($i['bulan']="Februari")?'selected':'';?> >Februari</option>
                                          <option <?= ($i['bulan']="Maret")?'selected':'';?> >Maret</option>
                                          <option <?= ($i['bulan']="April")?'selected':'';?> >April</option>
                                          <option <?= ($i['bulan']="Mei")?'selected':'';?> >Mei</option>
                                          <option <?= ($i['bulan']="Juni")?'selected':'';?> >Juni</option>
                                          <option <?= ($i['bulan']="Juli")?'selected':'';?> >Juli</option>
                                          <option <?= ($i['bulan']="Agustus")?'selected':'';?> >Agustus</option>
                                          <option <?= ($i['bulan']="September")?'selected':'';?> >September</option>
                                          <option <?= ($i['bulan']="Oktober")?'selected':'';?> >Oktober</option>
                                          <option <?= ($i['bulan']="November")?'selected':'';?> >November</option>
                                          <option <?= ($i['bulan']="Desember")?'selected':'';?> >Desember</option>
                                        </select> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Volume Bulanan *</label>
                                        <input value="<?php echo $i['volume_bulanan'];?>" required type="number" name="volume_bulanan" class="form-control" placeholder="Volume Bulanan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jumlah Hari *</label>
                                        <input value="<?php echo $i['jumlah_hari'];?>" required type="number" name="jumlah_hari" class="form-control" placeholder="Jumlah Hari"> 
                                  </div> 

                                 
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-success">UPDATE</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



   <?php foreach ($data_target_produksi->result_array() as $i) :
                                            $id_target_produksi=$i['id_target_produksi'];
                                          ?>
       <form  action="<?php echo base_url().'target_produksi/hapus_target_produksi'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_target_produksi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS TARGET PRODUKSI</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_target_produksi;?>">
                         <span>Apakah Anda yakin ingin menghapus data ini?</span>
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-danger">HAPUS</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



<script type="text/javascript">
  $().DataTable();
</script>


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'TARGET PRODUKSI Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'TARGET PRODUKSI Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'TARGET PRODUKSI Behasil di HAPUS'
})
 </script>
<?php endif; ?>


<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Format File Gambar SALAH'
})
 </script>
<?php endif; ?>

