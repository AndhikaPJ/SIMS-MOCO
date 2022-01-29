		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">PENGAJUAN SIMPER</h2>
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
									 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGAJUAN SIMPER</button>
                   <a type="button" class="btn btn-info btn-sm" target="_blank" href="<?php echo base_url();?>pengajuan_simper/cetak"><i class="fa fa-print"></i> PRINT</a>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em; center;">No.</th>
                                                        <th style="center;">Foto Sopir</th>
                                                        <th style="center;">Nomor Unit</th>
                                                        <th style="center;">Nama Armada</th>
                                                        <th style="center;">Nama Perusahaan</th>
                                                        <th style="center;">NIK</th>
                                                        <th style="center;">Nama Sopir</th>
                                                        <th style="center;">Posisi</th>
                                                        <th style="center;">Jenis Simper</th>
                                                        <th style="center;">Tanggal Pengajuan</th>
                                                        <th style="center;">Masa Berlaku</th>
                                                        <th style="center;">Status Pengajuan</th>
                                                        <th style="center;">Keterangan Admin</th>
                                                        <th style="center;">Nomor SIM</th>
                                                        <th style="center;">File SIM</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</thead>
											<tfoot>
													<tr>
                          <th style="flex: 0 0 auto; min-width: 2em; center;">No.</th>
                                                        <th style="center;">Foto Sopir</th>
                                                        <th style="center;">Nomor Unit</th>
                                                        <th style="center;">Nama Armada</th>
                                                        <th style="center;">Nama Perusahaan</th>
                                                        <th style="center;">NIK</th>
                                                        <th style="center;">Nama Sopir</th>
                                                        <th style="center;">Posisi</th>
                                                        <th style="center;">Jenis Simper</th>
                                                        <th style="center;">Tanggal Pengajuan</th>
                                                        <th style="center;">Masa Berlaku</th>
                                                        <th style="center;">Status Pengajuan</th>
                                                        <th style="center;">Keterangan Admin</th>
                                                        <th style="center;">Nomor SIM</th>
                                                        <th style="center;">File SIM</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</tfoot>
											<tbody>
												<?php $no=1; foreach ($data_pengajuan_simper->result_array() as $i) :
		                                            $id_pengajuan_simper=$i['id_pengajuan_simper'];
		                                          ?>
												 <tr>
                                              
	                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><img height="70" width="70"  src="<?php echo base_url().'assets/image/'.$i['foto_sopir'];?>"></td>
                                                <td><?php echo $i['nomor_unit'];?></td>
                                                <td><?php echo $i['nama_armada'];?></td>
	                                              <td><?php echo $i['nama_vendor'];?></td>
                                                <td><?php echo $i['nik'];?></td>
                                                <td><?php echo $i['nama_sopir'];?></td>
                                                <td><?php echo $i['posisi'];?></td>
                                                <td><?php echo $i['jenis_simper'];?></td>
	                                              <td><?php echo tgl_indo($i['tanggal_pengajuan']);?></td>
                                                <td><?php if($i['status_pengajuan']!="DITOLAK"):?><?php echo tgl_indo(date('Y-m-d', strtotime($i['tanggal_pengajuan']. ' + 1 year')));?><?php endif;?></td>
	                                              <td>
                                                  <?php if($i['status_pengajuan']=="DITERIMA"):?>
                                                      <button style="margin: 2px;" type="button"  class="btn btn-success mdi mdi-pencil btn-sm"  > DITERIMA</button>
                                                  <?php elseif($i['status_pengajuan']=="DITOLAK"):?>
                                                    <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm"  > DITOLAK</button>
                                                  <?php else:?>
                                                    <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm"  > MENUNGGU KONFIRMASI</button>
                                                  <?php endif;?>
                                                </td>
                                                <td><?php echo $i['keterangan_admin'];?></td>
                                                <td><?php echo $i['nomor_sim'];?></td>
	                                               <td> <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['foto_sim'];?>" class="btn btn-success mdi mdi-pencil btn-sm"><i class="fa fa-eye"></i> LIHAT</a></td>
	                                           
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <?php if($i['status_pengajuan']=="DITERIMA"):?>
                                                    <a style="margin: 2px;" type="button" class="btn btn-success btn-sm" target="_blank" href="<?php echo base_url();?>pengajuan_simper/cetak3/<?php echo $i['id_pengajuan_simper'];?>"><i class="fa fa-print"></i> SIMPER</a>

                                                    <a style="margin: 2px;" type="button" class="btn btn-success btn-sm" target="_blank" href="<?php echo base_url();?>pengajuan_simper/cetak2/<?php echo $i['id_pengajuan_simper'];?>"><i class="fa fa-print"></i> FORMULIR</a>
                                                    <?php endif;?>

                                                  <?php if($this->session->userdata('level')!="vendor"):?>
                                                     <?php if($i['status_pengajuan']=="MENUNGGU KONFIRMASI"):?>
                                                     <button style="margin: 2px;" type="button"  class="btn btn-primary mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#konfir<?php echo $id_pengajuan_simper;?>"><i class="fa fa-check"></i> KONFIRMASI</button>
                                                  <?php endif;?>
                                                  <?php endif;?>

	                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pengajuan_simper;?>"><i class="fa fa-edit"></i> EDIT</button>

	                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pengajuan_simper;?>"><i class="fa fa-trash"></i> DELETE</button>
	                                                
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


       <form  action="<?php echo base_url().'pengajuan_simper/simpan_pengajuan_simper'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PENGAJUAN SIMPER</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                                  <?php if($this->session->userdata('level')=="vendor"):
                                    $id_vendor=$this->session->userdata('id_pengguna2');?>
                                  
                                       <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Sopir *</label>
                                        <select class="form-control" name="id_sopir" required>
                                          <option value="">--Pilih Sopir--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND sopir.id_vendor='$id_vendor'")->result_array() as $key):?>
                                            <option value="<?php echo $key['id_sopir'];?>"><?php echo $key['nik'];?> # <?php echo $key['nama_sopir'];?> # <?php echo $key['nomor_unit'];?> # <?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <?php else:?>

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Sopir *</label>
                                        <select class="form-control" name="id_sopir" required>
                                          <option value="">--Pilih Sopir--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor")->result_array() as $key):?>
                                            <option value="<?php echo $key['id_sopir'];?>"><?php echo $key['nik'];?> # <?php echo $key['nama_sopir'];?> # <?php echo $key['nomor_unit'];?> # <?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                <?php endif;?>

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis Simper *</label>
                                        <select class="form-control" name="jenis_simper" required>
                                          <option value="">--Pilih Jenis Simper--</option>
                                          <option>BARU</option>
                                          <option>PERPANJANG</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Pengajuan *</label>
                                        <input required type="date" name="tanggal_pengajuan" class="form-control" placeholder="Tanggal Pengajuan"> 
                                  </div> 


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nomor SIM *</label>
                                        <input required type="text" name="nomor_sim" class="form-control" placeholder="Nomor SIM"> 
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







  <?php foreach ($data_pengajuan_simper->result_array() as $i) :
                                            $id_pengajuan_simper=$i['id_pengajuan_simper'];
                                          ?>
       <form  action="<?php echo base_url().'pengajuan_simper/update_pengajuan_simper'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pengajuan_simper;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PENGAJUAN SIMPER</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pengajuan_simper" value="<?php echo $id_pengajuan_simper;?>">

                       <?php if($this->session->userdata('level')=="vendor"):
                                    $id_vendor=$this->session->userdata('id_pengguna2');?>
                                  
                                       <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Sopir *</label>
                                        <select class="form-control" name="id_sopir" required>
                                          <option value="">--Pilih Sopir--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND sopir.id_vendor='$id_vendor'")->result_array() as $key):?>
                                            <option <?= ($i['id_sopir']==$key['id_sopir'])?'selected':'';?> value="<?php echo $key['id_sopir'];?>"><?php echo $key['nik'];?> # <?php echo $key['nama_sopir'];?> # <?php echo $key['nomor_unit'];?> # <?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <?php else:?>
                               

                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Sopir *</label>
                                        <select class="form-control" name="id_sopir" required>
                                          <option value="">--Pilih Sopir--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor")->result_array() as $key):?>
                                            <option <?= ($i['id_sopir']==$key['id_sopir'])?'selected':'';?> value="<?php echo $key['id_sopir'];?>"><?php echo $key['nik'];?> # <?php echo $key['nama_sopir'];?> # <?php echo $key['nomor_unit'];?> # <?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 
                                <?php endif;?>

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis Simper *</label>
                                        <select class="form-control" name="jenis_simper" required>
                                          <option value="">--Pilih Jenis Simper--</option>
                                          <option <?= ($i['jenis_simper']=="BARU")?'selected':'';?> >BARU</option>
                                          <option <?= ($i['jenis_simper']=="PERPANJANG")?'selected':'';?> >PERPANJANG</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Pengajuan *</label>
                                        <input value="<?php echo $i['tanggal_pengajuan'];?>" required type="date" name="tanggal_pengajuan" class="form-control" placeholder="Tanggal Pengajuan"> 
                                  </div> 


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nomor SIM *</label>
                                        <input value="<?php echo $i['nomor_sim'];?>" required type="text" name="nomor_sim" class="form-control" placeholder="Nomor SIM"> 
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


  <?php foreach ($data_pengajuan_simper->result_array() as $i) :
                                            $id_pengajuan_simper=$i['id_pengajuan_simper'];
                                          ?>
       <form  action="<?php echo base_url().'pengajuan_simper/konfir'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="konfir<?php echo $id_pengajuan_simper;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>KONFIRMASI PENGAJUAN SIMPER</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pengajuan_simper" value="<?php echo $id_pengajuan_simper;?>">

                              <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Status Pengajuan *</label>
                                        <select class="form-control" name="status_pengajuan" required>
                                          <option value="">--Pilih Status Pengajuan--</option>
                                          <option <?= ($i['status_pengajuan']=="DITERIMA")?'selected':'';?> >DITERIMA</option>
                                          <option <?= ($i['status_pengajuan']=="DITOLAK")?'selected':'';?> >DITOLAK</option>
                                        </select>
                                  </div>

                              <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan Admin </label>
                                        <textarea class="form-control" name="keterangan_admin"></textarea>
                                  </div>

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-success">KONFIRMASI</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



   <?php foreach ($data_pengajuan_simper->result_array() as $i) :
                                            $id_pengajuan_simper=$i['id_pengajuan_simper'];
                                          ?>
       <form  action="<?php echo base_url().'pengajuan_simper/hapus_pengajuan_simper'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pengajuan_simper;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PENGAJUAN SIMPER</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pengajuan_simper;?>">
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
  text: 'Simper Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Simper Berhasil di EDIT'
})
 </script>
<?php endif; ?>
<?php if($this->session->flashdata('berhasil_edit2') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Simper Berhasil di KONFIRMASI'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Simper Behasil di HAPUS'
})
 </script>
<?php endif; ?>


<?php if($this->session->flashdata('foto_simper_salah') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Format File Foto simper SALAH'
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

