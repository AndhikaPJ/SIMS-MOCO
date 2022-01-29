

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">DRIVER</h2>
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
									 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH DRIVER</button>
                   <a type="button" class="btn btn-info btn-sm" target="_blank" href="<?php echo base_url();?>sopir/cetak"><i class="fa fa-print"></i> PRINT</a>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;text-align:  center;">No.</th>
                                                        <th style="text-align: center;">Foto Sopir</th>
                                                        <th style="text-align: center;">Nomor Unit</th>
                                                        <th style="text-align: center;">Nama Armada</th>
                                                        <th style="text-align: center;">Nama Perusahaan</th>
                                                        <th style="text-align: center;">NIK</th>
                                                        <th style="text-align: center;">Nama Sopir</th>
                                                        <th style="text-align: center;">Tempat Lahir</th>
                                                        <th style="text-align: center;">Tanggal Lahir</th>
                                                        <th style="text-align: center;">Alamat</th>
                                                        <th style="text-align: center;">No HP</th>
                                                        <th style="text-align: center;">Jenis SIM</th>
                                                        <th style="text-align: center;">Posisi</th>
                                                        <th style="text-align: center;">File KTP</th>
                                                        <th style="text-align: center;">File SIM</th>
                                                        <th style="text-align: center;">Tanggal Masuk Sopir</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</thead>
											<tfoot>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;text-align:  center;">No.</th>
                                                       <th style="text-align: center;">Foto Sopir</th>
                                                        <th style="text-align: center;">Nomor Unit</th>
                                                        <th style="text-align: center;">Nama Armada</th>
                                                        <th style="text-align: center;">Nama Perusahaan</th>
                                                        <th style="text-align: center;">NIK</th>
                                                        <th style="text-align: center;">Nama Sopir</th>
                                                        <th style="text-align: center;">Tempat Lahir</th>
                                                        <th style="text-align: center;">Tanggal Lahir</th>
                                                        <th style="text-align: center;">Alamat</th>
                                                        <th style="text-align: center;">No HP</th>
                                                        <th style="text-align: center;">Jenis SIM</th>
                                                        <th style="text-align: center;">Posisi</th>
                                                        <th style="text-align: center;">File KTP</th>
                                                        <th style="text-align: center;">File SIM</th>
                                                        <th style="text-align: center;">Tanggal Masuk Sopir</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</tfoot>
											<tbody>
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
	                                              <td><?php echo tgl_indo($i['tanggal_lahir']);?></td>
	                                              <td><?php echo $i['alamat'];?></td>
	                                              <td><?php echo $i['no_hp'];?></td>
                                                <td><?php echo $i['jenis_sim'];?></td>
                                                <td><?php echo $i['posisi'];?></td>
                                                <td> <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['foto_ktp'];?>" class="btn btn-success mdi mdi-pencil btn-sm"><i class="fa fa-eye"></i> LIHAT</a></td>
                                                <td> <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['foto_sim'];?>" class="btn btn-success mdi mdi-pencil btn-sm"><i class="fa fa-eye"></i> LIHAT</a></td>
                                                 <td><?php echo tgl_indo($i['tanggal_masuk_sopir']);?></td>
	                                           
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">

	                                              <a style="margin: 2px;" type="button" class="btn btn-success btn-sm" target="_blank" href="<?php echo base_url();?>sopir/cetak2/<?php echo $i['id_sopir'];?>"><i class="fa fa-print"></i> PRINT</a>
                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_sopir;?>"><i class="fa fa-edit"></i> EDIT</button>

	                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_sopir;?>"><i class="fa fa-trash"></i> DELETE</button>
	                                                
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


       <form  action="<?php echo base_url().'sopir/simpan_sopir'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH DRIVER</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Armada *</label>
                                        <select class="form-control" name="id_armada" required>
                                          <option value="">--Pilih Armada--</option>
                                          <?php foreach ($this->db->get('armada')->result_array() as $key):?>
                                            <option value="<?php echo $key['id_armada'];?>"><?php echo $key['nomor_unit'];?> # <?php echo $key['nama_armada'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

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
                                        <label class="form-label" >NIK *</label>
                                        <input required type="text" name="nik" class="form-control" placeholder="NIK"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Sopir *</label>
                                        <input required type="text" name="nama_sopir" class="form-control" placeholder="Nama Sopir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tempat Lahir *</label>
                                        <input required type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Lahir *</label>
                                        <input required type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat *</label>
                                        <textarea class="form-control" name="alamat" required></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No HP *</label>
                                        <input required type="number" name="no_hp" class="form-control" placeholder="No HP"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis SIM *</label>
                                        <input required type="text" name="jenis_sim" class="form-control" placeholder="Jenis SIM"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Posisi *</label>
                                        <input required type="text" name="posisi" class="form-control" placeholder="Posisi"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Foto Sopir *</label>
                                        <input type="file" name="foto_sopir" class="form-control" placeholder="Foto Sopir"> 
                                        <p style="font-size: 11 px;color:red">Format file wajib: jpg|png|jpeg</p>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Foto KTP *</label>
                                        <input type="file" name="foto_ktp" class="form-control" placeholder="Foto KTP"> 
                                        <p style="font-size: 11 px;color:red">Format file wajib: jpg|png|jpeg</p>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Foto SIM *</label>
                                        <input type="file" name="foto_sim" class="form-control" placeholder="Foto SIM"> 
                                        <p style="font-size: 11 px;color:red">Format file wajib: jpg|png|jpeg</p>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Masuk Sopir *</label>
                                        <input required type="date" name="tanggal_masuk_sopir" class="form-control" placeholder="Tanggal Masuk Sopir"> 
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







  <?php foreach ($data_sopir->result_array() as $i) :
                                            $id_sopir=$i['id_sopir'];
                                          ?>
       <form  action="<?php echo base_url().'sopir/update_sopir'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_sopir;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE DRIVER</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_sopir" value="<?php echo $id_sopir;?>">


                               

                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Armada *</label>
                                        <select class="form-control" name="id_armada" required>
                                          <option value="">--Pilih Armada--</option>
                                          <?php foreach ($this->db->get('armada')->result_array() as $key):?>
                                            <option <?= ($i['id_armada']==$key['id_armada'])?'selected':'';?> value="<?php echo $key['id_armada'];?>"><?php echo $key['nomor_unit'];?> # <?php echo $key['nama_armada'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

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
                                            <option <?= ($i['id_vendor']==$key['id_vendor'])?'selected':'';?> value="<?php echo $key['id_vendor'];?>"><?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                <?php endif;?>


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >NIK *</label>
                                        <input value="<?php echo $i['nik'];?>" required type="text" name="nik" class="form-control" placeholder="NIK"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Sopir *</label>
                                        <input value="<?php echo $i['nama_sopir'];?>" required type="text" name="nama_sopir" class="form-control" placeholder="Nama Sopir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tempat Lahir *</label>
                                        <input value="<?php echo $i['tempat_lahir'];?>" required type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Lahir *</label>
                                        <input value="<?php echo $i['tanggal_lahir'];?>" required type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat *</label>
                                        <textarea class="form-control" name="alamat" required><?php echo $i['alamat'];?></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No HP *</label>
                                        <input value="<?php echo $i['no_hp'];?>" required type="number" name="no_hp" class="form-control" placeholder="No HP"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis SIM *</label>
                                        <input value="<?php echo $i['jenis_sim'];?>" required type="text" name="jenis_sim" class="form-control" placeholder="Jenis SIM"> 
                                  </div> 
                                  
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Posisi *</label>
                                        <input value="<?php echo $i['posisi'];?>" required type="text" name="posisi" class="form-control" placeholder="Posisi"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Foto Sopir</label>
                                        <input type="file" name="foto_sopir" class="form-control" placeholder="Foto Sopir"> 
                                        <p style="font-size: 11 px;color:red">Format file wajib: jpg|png|jpeg</p>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Foto KTP</label>
                                        <input type="file" name="foto_ktp" class="form-control" placeholder="Foto KTP"> 
                                        <p style="font-size: 11 px;color:red">Format file wajib: jpg|png|jpeg</p>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Foto SIM</label>
                                        <input type="file" name="foto_sim" class="form-control" placeholder="Foto SIM"> 
                                        <p style="font-size: 11 px;color:red">Format file wajib: jpg|png|jpeg</p>
                                  </div> 

                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Masuk Sopir *</label>
                                        <input value="<?php echo $i['tanggal_masuk_sopir'];?>" required type="date" name="tanggal_masuk_sopir" class="form-control" placeholder="Tanggal Masuk Sopir"> 
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



   <?php foreach ($data_sopir->result_array() as $i) :
                                            $id_sopir=$i['id_sopir'];
                                          ?>
       <form  action="<?php echo base_url().'sopir/hapus_sopir'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_sopir;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS DRIVER</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_sopir;?>">
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
  text: 'Driver Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Driver Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Driver Behasil di HAPUS'
})
 </script>
<?php endif; ?>


<?php if($this->session->flashdata('foto_sopir_salah') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Format File Foto Sopir SALAH'
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

