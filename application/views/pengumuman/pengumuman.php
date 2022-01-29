

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">PENGUMUMAN</h2>
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
									 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGUMUMAN</button>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;text-align:  center;">No.</th>
                                                        <th style="text-align: center;">Di buat oleh</th>
                                                        <th style="text-align: center;">Level</th>
                                                        <th style="text-align: center;">Judul Kegiatan</th>
                                                        <th style="text-align: center;">Tanggal Kegiatan</th>
                                                        <th style="text-align: center;">Detail Kegiatan</th>
                                                        <th style="text-align: center;">Status</th>
                                                        <th style="text-align: center;">Lampiran</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</thead>
											<tfoot>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;text-align:  center;">No.</th>
                                                        <th style="text-align: center;">Di buat oleh</th>
                                                        <th style="text-align: center;">Level</th>
                                                        <th style="text-align: center;">Judul Kegiatan</th>
                                                        <th style="text-align: center;">Tanggal Kegiatan</th>
                                                        <th style="text-align: center;">Detail Kegiatan</th>
                                                        <th style="text-align: center;">Status</th>
                                                        <th style="text-align: center;">Lampiran</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</tfoot>
											<tbody>
												<?php $no=1; foreach ($data_pengumuman->result_array() as $i) :
		                                            $id_pengumuman=$i['id_pengumuman'];
		                                          ?>
												 <tr>
                                              
	                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><?php echo $i['di_buat_oleh'];?></td>
                                                <td><?php echo $i['level'];?></td>
	                                              <td><?php echo $i['judul_kegiatan'];?></td>
                                                <td><?php echo tgl_indo($i['tanggal_kegiatan']);?></td>
                                                <td><?php echo $i['detail_kegiatan'];?></td>
                                                <td><?php echo $i['status'];?></td>
                                                <td> <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['lampiran'];?>" class="btn btn-success mdi mdi-pencil btn-sm"><i class="fa fa-eye"></i> LIHAT</a></td>
	                                           
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pengumuman;?>"><i class="fa fa-edit"></i> EDIT</button>

	                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pengumuman;?>"><i class="fa fa-trash"></i> DELETE</button>
	                                                
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


       <form  action="<?php echo base_url().'pengumuman/simpan_pengumuman'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PENGUMUMAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                               


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Judul Kegiatan *</label>
                                        <input required type="text" name="judul_kegiatan" class="form-control" placeholder="Judul Kegiatan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Kegiatan *</label>
                                        <input required type="date" name="tanggal_kegiatan" class="form-control" placeholder="Tanggal Kegiatan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Detail Kegiatan </label>
                                        <textarea class="form-control" name="detail_kegiatan"></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Lampiran </label>
                                        <input type="file" name="lampiran" class="form-control" placeholder="Lampiran"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Status </label>
                                        <select class="form-control" name="status">
                                          <option value="">--Pilih Status--</option>
                                          <option>Close</option>
                                          <option>Open</option>
                                          <option>OnProgress</option>
                                        </select>
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


  <?php foreach ($data_pengumuman->result_array() as $i) :
                                            $id_pengumuman=$i['id_pengumuman'];
                                          ?>
       <form  action="<?php echo base_url().'pengumuman/update_pengumuman'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pengumuman;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PENGUMUMAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pengumuman" value="<?php echo $id_pengumuman;?>">

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Judul Kegiatan *</label>
                                        <input value="<?php echo $i['judul_kegiatan'];?>" required type="text" name="judul_kegiatan" class="form-control" placeholder="Judul Kegiatan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Kegiatan *</label>
                                        <input value="<?php echo $i['tanggal_kegiatan'];?>" required type="date" name="tanggal_kegiatan" class="form-control" placeholder="Tanggal Kegiatan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Detail Kegiatan </label>
                                        <textarea class="form-control" name="detail_kegiatan"><?php echo $i['detail_kegiatan'];?></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Lampiran </label>
                                        <input  type="file" name="lampiran" class="form-control" placeholder="Lampiran"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Status </label>
                                        <select class="form-control" name="status">
                                          <option value="">--pilih status--</option>
                                          <option <?= ($i['status']=="Close")?'selected':'';?> >Close</option>
                                          <option <?= ($i['status']=="Open")?'selected':'';?> >Open</option>
                                          <option <?= ($i['status']=="OnProgress")?'selected':'';?> >OnProgress</option>
                                        </select>
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



   <?php foreach ($data_pengumuman->result_array() as $i) :
                                            $id_pengumuman=$i['id_pengumuman'];
                                          ?>
       <form  action="<?php echo base_url().'pengumuman/hapus_pengumuman'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pengumuman;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PENGUMUMAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pengumuman;?>">
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
  text: 'PENGUMUMAN Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'PENGUMUMAN Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'PENGUMUMAN Behasil di HAPUS'
})
 </script>
<?php endif; ?>


<?php if($this->session->flashdata('foto_pengumuman_salah') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Format File Foto pengumuman SALAH'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('foto_ktp_salah') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Format File Foto KTP SALAH'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('foto_sim_salah') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Format File Foto SIM SALAH'
})
 </script>
<?php endif; ?>

