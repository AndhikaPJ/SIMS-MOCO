

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">ARMADA</h2>
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
									 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH ARMADA</button>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Image</th>
                                                        <th>Nomor Unit</th>
                                                        <th>Nama Pemilik Armada</th>
                                                        <th>Jenis Pengangkutan</th>
                                                        <th>Tanggal Komisioning</th>
                                                        <th>No. Plat</th>
                                                        <th>No. Rangka Mesin</th>
                                                        <th>Berat Kosongan</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</thead>
											<tfoot>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Image</th>
                                                        <th>Nomor Unit</th>
                                                        <th>Nama Pemilik Armada</th>
                                                        <th>Jenis Pengangkutan</th>
                                                        <th>Tanggal Komisioning</th>
                                                        <th>No. Plat</th>
                                                        <th>No. Rangka Mesin</th>
                                                        <th>Berat Kosongan</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</tfoot>
											<tbody>
												<?php $no=1; foreach ($data_armada->result_array() as $i) :
		                                            $id_armada=$i['id_armada'];
		                                          ?>
												 <tr>
                                              
	                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
	                                              <td><img height="70" width="70"  src="<?php echo base_url().'assets/image/'.$i['foto_armada'];?>"></td>
	                                              <td><?php echo $i['nomor_unit'];?></td>
                                                <td><?php echo $i['nama_armada'];?></td>
	                                              <td><?php echo $i['jenis_pengangkutan'];?></td>
	                                              <td><?php echo tgl_indo($i['tanggal_komisioning']);?></td>
	                                              <td><?php echo $i['no_plat'];?></td>
	                                              <td><?php echo $i['no_rangka_mesin'];?></td>
                                                <td><?php echo $i['berat_kosongan'];?></td>
	                                           
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">

	                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_armada;?>"><i class="fa fa-edit"></i> EDIT</button>

	                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_armada;?>"><i class="fa fa-trash"></i> DELETE</button>
	                                                
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


       <form  action="<?php echo base_url().'armada/simpan_armada'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH ARMADA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nomor Unit *</label>
                                        <input required type="text" name="nomor_unit" class="form-control" placeholder="Nomor Unit"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Pemilik Armada *</label>
                                        <input required type="text" name="nama_armada" class="form-control" placeholder="Nama Armada"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis Pengangkutan *</label>
                                        <select class="form-control" name="jenis_pengangkutan" required>
                                          <option value="">--Jenis Pengangkutan--</option>
                                          <option>Hauling</option>
                                          <option>Getting</option>
                                        </select> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Komisioning *</label>
                                        <input required type="date" name="tanggal_komisioning" class="form-control" placeholder="Tanggal Komisioning"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. Plat *</label>
                                        <input required type="text" name="no_plat" class="form-control" placeholder="No. Plat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. Rangka Mesin *</label>
                                        <input required type="text" name="no_rangka_mesin" class="form-control" placeholder="No. Rangka Mesin"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Berat Kosongan *</label>
                                        <input required type="text" name="berat_kosongan" class="form-control" placeholder="Berat Kosongan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Foto Armada *</label>
                                        <input type="file" name="foto_armada" class="form-control" > 
                                        <p style="font-size: 11 px;color:red">Format file wajib: jpg|png|jpeg</p>
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







  <?php foreach ($data_armada->result_array() as $i) :
                                            $id_armada=$i['id_armada'];
                                          ?>
       <form  action="<?php echo base_url().'armada/update_armada'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_armada;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE armada</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_armada" value="<?php echo $id_armada;?>">


                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nomor Unit *</label>
                                        <input value="<?php echo $i['nomor_unit'];?>" required type="text" name="nomor_unit" class="form-control" placeholder="Nomor Unit"> 
                                  </div> 

                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Pemilik Armada *</label>
                                        <input value="<?php echo $i['nama_armada'];?>" required type="text" name="nama_armada" class="form-control" placeholder="Nama Armada"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis Pengangkutan *</label>
                                        <select class="form-control" name="jenis_pengangkutan" required>
                                          <option value="">--Jenis Pengangkutan--</option>
                                          <option <?= ($i['jenis_pengangkutan']=="Hauling")?'selected':'';?> >Hauling</option>
                                          <option <?= ($i['jenis_pengangkutan']=="Getting")?'selected':'';?> >Getting</option>
                                        </select> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Komisioning *</label>
                                        <input  value="<?php echo $i['tanggal_komisioning'];?>" required type="date" name="tanggal_komisioning" class="form-control" placeholder="Tanggal Komisioning"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. Plat *</label>
                                        <input  value="<?php echo $i['no_plat'];?>" required type="text" name="no_plat" class="form-control" placeholder="No. Plat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. Rangka Mesin *</label>
                                        <input  value="<?php echo $i['no_rangka_mesin'];?>" required type="text" name="no_rangka_mesin" class="form-control" placeholder="No. Rangka Mesin"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Berat Kosongan *</label>
                                        <input  value="<?php echo $i['berat_kosongan'];?>" required type="text" name="berat_kosongan" class="form-control" placeholder="Berat Kosongan"> 
                                  </div> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Foto Armada *</label>
                                        <input  type="file" name="foto_armada" class="form-control" > 
                                        <p style="font-size: 11 px;color:red">Format file wajib: jpg|png|jpeg</p>
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



   <?php foreach ($data_armada->result_array() as $i) :
                                            $id_armada=$i['id_armada'];
                                          ?>
       <form  action="<?php echo base_url().'armada/hapus_armada'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_armada;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS armada</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_armada;?>">
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
  text: 'Armada Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Armada Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Armada Behasil di HAPUS'
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

