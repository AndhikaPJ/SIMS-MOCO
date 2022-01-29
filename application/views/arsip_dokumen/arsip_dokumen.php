

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">ARSIP DOKUMEN</h2>
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
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH ARSIP DOKUMEN</button>
                   <a type="button" class="btn btn-info btn-sm" target="_blank" href="<?php echo base_url();?>arsip_dokumen/cetak"><i class="fa fa-print"></i> PRINT</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                          <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Nama Dokumen</th>
                                                        <th>Nomor Dokumen</th>
                                                        <th>Tanggal Dokumen</th>
                                                        <th>File Dokumen</th>
                                                        <th>Keterangan</th>
                                                        <th>Status Dokumen</th>
                                                        <th style="text-align: center;">Action</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Nama Dokumen</th>
                                                        <th>Nomor Dokumen</th>
                                                        <th>Tanggal Dokumen</th>
                                                        <th>File Dokumen</th>
                                                        <th>Keterangan</th>
                                                        <th>Status Dokumen</th>
                                                        <th style="text-align: center;">Action</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        <?php $no=1; foreach ($data_arsip_dokumen->result_array() as $i) :
                                                $id_arsip_dokumen=$i['id_arsip_dokumen'];
                                              ?>
                         <tr>
                                              
                                                <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><?php echo $i['nama_vendor'];?></td>
                                                <td><?php echo $i['nama_dokumen'];?></td>
                                                <td><?php echo $i['nomor_dokumen'];?></td>
                                                <td><?php echo tgl_indo($i['tanggal_dokumen']);?></td>
                                                <td> <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['file_dokumen'];?>" class="btn btn-success mdi mdi-pencil btn-sm"><i class="fa fa-eye"></i> LIHAT</a></td>
                                                <td><?php echo $i['keterangan'];?></td>
                                                <td><?php echo $i['status_dokumen'];?></td>
                                             
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_arsip_dokumen;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_arsip_dokumen;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
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


       <form  action="<?php echo base_url().'arsip_dokumen/simpan_arsip_dokumen'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH ARSIP DOKUMEN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        
                                <?php if($this->session->userdata('level')=="vendor"):?>
                                       <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Perusahaan *</label>
                                        <input required type="text" value="<?php echo $this->session->userdata('nama_lengkap');?>" class="form-control" readonly> 
                                        <input required type="hidden" name="id_vendor" value="<?php echo $this->session->userdata('id_pengguna2');?>" class="form-control" > 
                                      </div> 

                                  <?php else:?>
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Perusahaan *</label>
                                        <select class="form-control" name="id_vendor" required>
                                          <option value="">--Pilih Perusahaan--</option>
                                          <?php foreach ($this->db->get('vendor')->result_array() as $key):?>
                                            <option value="<?php echo $key['id_vendor'];?>"><?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 
                                <?php endif;?>

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Dokumen *</label>
                                        <input required type="text" name="nama_dokumen" class="form-control" placeholder="Nama Dokumen"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nomor Dokumen *</label>
                                        <input required type="text" name="nomor_dokumen" class="form-control" placeholder="Nomor Dokumen"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Dokumen *</label>
                                        <input required type="date" name="tanggal_dokumen" class="form-control" placeholder="Tanggal Dokumen"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >File Dokumen *</label>
                                        <input required type="file" name="file_dokumen" class="form-control" placeholder="File Dokumen">
                                        <p style="font-size: 11 px;color:red">Format file wajib: jpg|png|jpeg</p> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Status *</label>
                                        <select class="form-control" name="status_dokumen" required>
                                          <option value="">--Pilih Status--</option>
                                          <option>ON PROGRESS</option>
                                          <option>COMPLETED</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan </label>
                                        <textarea class="form-control" name="keterangan" ></textarea>
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







  <?php foreach ($data_arsip_dokumen->result_array() as $i) :
                                            $id_arsip_dokumen=$i['id_arsip_dokumen'];
                                          ?>
       <form  action="<?php echo base_url().'arsip_dokumen/update_arsip_dokumen'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_arsip_dokumen;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE ARSIP DOKUMEN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_arsip_dokumen" value="<?php echo $id_arsip_dokumen;?>">


                             <?php if($this->session->userdata('level')=="vendor"):?>
                                       <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Perusahaan *</label>
                                        <input required type="text" value="<?php echo $this->session->userdata('nama_lengkap');?>" class="form-control" readonly> 
                                        <input required type="hidden" name="id_vendor" value="<?php echo $this->session->userdata('id_pengguna2');?>" class="form-control" > 
                                      </div> 

                                  <?php else:?>


                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Perusahaan *</label>
                                        <select class="form-control" name="id_vendor" required>
                                          <option value="">--pilih Perusahaan--</option>
                                          <?php foreach ($this->db->get('vendor')->result_array() as $key):?>
                                            <option <?= ($i['id_vendor']==$key['id_vendor'])?'selected':'';?> value="<?php echo $key['id_vendor'];?>"><?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 
                                <?php endif;?>

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Dokumen *</label>
                                        <input value="<?php echo $i['nama_dokumen'];?>" required type="text" name="nama_dokumen" class="form-control" placeholder="Nama Dokumen"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nomor Dokumen *</label>
                                        <input value="<?php echo $i['nomor_dokumen'];?>" required type="text" name="nomor_dokumen" class="form-control" placeholder="Nomor Dokumen"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Dokumen *</label>
                                        <input value="<?php echo $i['tanggal_dokumen'];?>" required type="date" name="tanggal_dokumen" class="form-control" placeholder="Tanggal Dokumen"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >File Dokumen </label>
                                        <input  type="file" name="file_dokumen" class="form-control" placeholder="File Dokumen"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Status *</label>
                                        <select class="form-control" name="status_dokumen" required>
                                          <option value="">--pilih status--</option>
                                          <option <?= ($i['status_dokumen']=="ON PROGRESS")?'selected':'';?> >ON PROGRESS</option>
                                          <option <?= ($i['status_dokumen']=="COMPLETED")?'selected':'';?> >COMPLETED</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan </label>
                                        <textarea class="form-control" name="keterangan" ><?php echo $i['keterangan'];?></textarea>
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



   <?php foreach ($data_arsip_dokumen->result_array() as $i) :
                                            $id_arsip_dokumen=$i['id_arsip_dokumen'];
                                          ?>
       <form  action="<?php echo base_url().'arsip_dokumen/hapus_arsip_dokumen'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_arsip_dokumen;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS ARSIP DOKUMEN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_arsip_dokumen;?>">
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
  text: 'ARSIP DOKUMEN Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'ARSIP DOKUMEN Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'ARSIP DOKUMEN Behasil di HAPUS'
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

