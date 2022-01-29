

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">PERUSAHAAN</h2>
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
									 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PERUSAHAAN</button>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Alamat Perusahaan</th>
                                                        <th>Pemilik</th>
                                                        <th>No Telp Perusahaan</th>
                                                        <th>Username</th>
                                                        <th>Jumlah Aktual Unit Komisioning</th>
                                                        <th style="text-align: right;">Action</th>
													</tr>
											</thead>
											<tfoot>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                       <th>Nama Perusahaan</th>
                                                        <th>Alamat Perusahaan</th>
                                                        <th>Pemilik</th>
                                                        <th>No Telp Perusahaan</th>
                                                        <th>Username</th>
                                                        <th>Jumlah Aktual Unit Komisioning</th>
                                                        <th style="text-align: right;">Action</th>
													</tr>
											</tfoot>
											<tbody>
												<?php $no=1; foreach ($data_vendor2->result_array() as $i) :
		                                            $id_vendor=$i['id_vendor'];
		                                          ?>
												 <tr>
                                              
	                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
	                                              <td><?php echo $i['nama_vendor'];?></td> 
	                                              <td><?php echo $i['alamat_vendor'];?></td>
	                                              <td><?php echo $i['pemilik'];?></td>
	                                              <td><?php echo $i['no_telp_vendor'];?></td>
	                                              <td><?php echo $i['username'];?></td>
	                                              <td><?php echo $i['jumlah_aktual_unit_komisioning'];?></td>
	                                           
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">

	                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_vendor;?>"><i class="fa fa-edit"></i> EDIT</button>

	                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_vendor;?>"><i class="fa fa-trash"></i> DELETE</button>
	                                                
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


       <form  action="<?php echo base_url().'vendor2/simpan_vendor2'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PERUSAHAAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Perusahaan *</label>
                                        <input required type="text" name="nama_vendor" class="form-control" placeholder="Nama Perusahaan"> 
                                  </div> 
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat Perusahaan *</label>
                                        <input required type="text" name="alamat_vendor" class="form-control" placeholder="Alamat Perusahaan"> 
                                  </div> 
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Pemilik *</label>
                                        <input required type="text" name="pemilik" class="form-control" placeholder="Pemilik"> 
                                  </div> 
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No Telp Perusahaan *</label>
                                        <input required type="text" name="no_telp_vendor" class="form-control" placeholder="No Telp Perusahaan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >username *</label>
                                        <input required type="text" name="username" class="form-control" placeholder="username"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Password *</label>
                                        <input required type="text" name="password" class="form-control" placeholder="Password"> 
                                  </div> 
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jumlah Aktual Unit Komisioning *</label>
                                        <input required type="text" name="jumlah_aktual_unit_komisioning" class="form-control" placeholder="Jumlah Aktual Unit Komisioning"> 
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







  <?php foreach ($data_vendor2->result_array() as $i) :
                                            $id_vendor=$i['id_vendor'];
                                          ?>
       <form  action="<?php echo base_url().'vendor2/update_vendor2'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_vendor;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PERUSAHAAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_vendor" value="<?php echo $id_vendor;?>">


                               

                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Perusahaan *</label>
                                        <input value="<?php echo $i['nama_vendor'];?>" required type="text" name="nama_vendor" class="form-control" placeholder="Nama Perusahaan"> 
                                  </div> 
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat Perusahaan *</label>
                                        <input value="<?php echo $i['alamat_vendor'];?>" required type="text" name="alamat_vendor" class="form-control" placeholder="Alamat Perusahaan"> 
                                  </div> 
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Pemilik *</label>
                                        <input value="<?php echo $i['pemilik'];?>" required type="text" name="pemilik" class="form-control" placeholder="Pemilik"> 
                                  </div> 
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No Telp Perusahaan *</label>
                                        <input value="<?php echo $i['no_telp_vendor'];?>" required type="text" name="no_telp_vendor" class="form-control" placeholder="No Telp Perusahaan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >username *</label>
                                        <input value="<?php echo $i['username'];?>" required type="text" name="username" class="form-control" placeholder="username"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Password </label>
                                        <input  type="text" name="password" class="form-control" placeholder="Password"> 
                                  </div> 
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jumlah Aktual Unit Komisioning *</label>
                                        <input value="<?php echo $i['jumlah_aktual_unit_komisioning'];?>" required type="text" name="jumlah_aktual_unit_komisioning" class="form-control" placeholder="Jumlah Aktual Unit Komisioning"> 
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



   <?php foreach ($data_vendor2->result_array() as $i) :
                                            $id_vendor=$i['id_vendor'];
                                          ?>
       <form  action="<?php echo base_url().'vendor2/hapus_vendor2'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_vendor;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PERUSAHAAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_vendor;?>">
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
  text: 'Perusahaan Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Perusahaan Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Perusahaan Behasil di HAPUS'
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

