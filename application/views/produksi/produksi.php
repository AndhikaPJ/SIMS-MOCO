

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">PRODUKSI</h2>
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
									 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PRODUKSI</button>
                   <a type="button" class="btn btn-info btn-sm" target="_blank" href="<?php echo base_url();?>produksi/cetak"><i class="fa fa-print"></i> PRINT</a>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em; text-align:  center;">No.</th>
                              <th style="text-align: center;">No Tiket</th>
                              <th style="text-align: center;">Jenis Pengangkutan</th>
                              <th style="text-align: center;">Shift</th>
                              <th style="text-align: center;">Nama Sopir</th>
                              <th style="text-align: center;">Nomor Unit</th>
                              <th style="text-align: center;">Nama Perusahaan</th>
                              <th style="text-align: center;">Tanggal Masuk</th>
                              <th style="text-align: center;">Jam Masuk</th>
                              <th style="text-align: center;">Tanggal Keluar</th>
                              <th style="text-align: center;">Jam Keluar</th>
                              <th style="text-align: center;">Berat Kosongan</th>
                              <th style="text-align: center;">Berat Kotor</th>
                              <th style="text-align: center;">Berat Bersih</th>
                              <th style="text-align: center;">Lokasi</th>
                              <th style="text-align: center;">Tanggal Validasi</th>
                              <th style="text-align: center;">Jam Validasi</th>
                              <th style="text-align: center;">Action</th>
													</tr>
											</thead>
											<tfoot>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                            <th style="text-align: center;">No Tiket</th>
                              <th style="text-align: center;">Jenis Pengangkutan</th>
                              <th style="text-align: center;">Shift</th>
                              <th style="text-align: center;">Nama Sopir</th>
                              <th style="text-align: center;">Nomor Unit</th>
                              <th style="text-align: center;">Nama Perusahaan</th>
                              <th style="text-align: center;">Tanggal Masuk</th>
                              <th style="text-align: center;">Jam Masuk</th>
                              <th style="text-align: center;">Tanggal Keluar</th>
                              <th style="text-align: center;">Jam Keluar</th>
                              <th style="text-align: center;">Berat Kosongan</th>
                              <th style="text-align: center;">Berat Kotor</th>
                              <th style="text-align: center;">Berat Bersih</th>
                              <th style="text-align: center;">Lokasi</th>
                              <th style="text-align: center;">Tanggal Validasi</th>
                              <th style="text-align: center;">Jam Validasi</th>
                              <th style="text-align: center;">Action</th>
													</tr>
											</tfoot>
											<tbody>
												<?php $no=1; foreach ($data_produksi->result_array() as $i) :
		                                            $id_produksi=$i['id_produksi'];
                                                $berat_bersih=$i['berat_kotor']-$i['berat_kosongan'];
		                                          ?>
												 <tr>
                                              
	                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><?php echo $i['no_tiket'];?></td>
                                                <td><?php echo $i['jenis_pengangkutan'];?></td>
                                                <td><?php echo $i['shift'];?></td>
                                                <td><?php echo $i['nama_sopir'];?></td>
                                                <td><?php echo $i['nomor_unit'];?></td>
                                                <td><?php echo $i['nama_vendor'];?></td>
	                                              <td><?php echo $i['tanggal_masuk'];?></td>
                                                <td><?php echo $i['jam_masuk'];?></td>
                                                <td><?php echo $i['tanggal_keluar'];?></td>
                                                <td><?php echo $i['jam_keluar'];?></td>
                                                <td><?php echo $i['berat_kosongan'];?></td>
                                                <td><?php echo $i['berat_kotor'];?></td>
                                                <td><?php echo $i['berat_bersih'];?></td>
                                                <td><?php echo $i['lokasi'];?></td>
                                                <td><?php echo tgl_indo(date('Y-m-d',strtotime($i['tanggal_validasi'])));?></td>
                                                <td><?php echo $i['jam_validasi'];?></td>                                         
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">
	                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_produksi;?>"><i class="fa fa-edit"></i> EDIT</button>
	                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_produksi;?>"><i class="fa fa-trash"></i> DELETE</button>	                                                
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


       <form  action="<?php echo base_url().'produksi/simpan_produksi'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PRODUKSI</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                                  
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No Tiket *</label>
                                        <input required type="text" name="no_tiket" class="form-control" placeholder="No Tiket"> 
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
                                        <label class="form-label" >Shift *</label>
                                        <select class="form-control" name="shift" required>
                                          <option value="">--Pilih Shift--</option>
                                          <option>6:30 - 18:00</option>
                                          <option>18:00 - 6:30</option>
                                        </select>  
                                  </div> 



                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Sopir *</label>
                                        <select class="form-control" name="id_sopir" required>
                                          <option value="">--Pilih Sopir--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor")->result_array() as $key):?>
                                            <option value="<?php echo $key['id_sopir'];?>"><?php echo $key['nik'];?> # <?php echo $key['nama_sopir'];?> # <?php echo $key['nomor_unit'];?> # <?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Masuk *</label>
                                        <input required type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jam Masuk *</label>
                                        <input required type="time" name="jam_masuk" class="form-control" placeholder="Jam Masuk"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Keluar *</label>
                                        <input required type="date" name="tanggal_keluar" class="form-control" placeholder="Tanggal Keluar"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jam Keluar *</label>
                                        <input required type="time" name="jam_keluar" class="form-control" placeholder="Jam Keluar"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Berat Kotor *</label>
                                        <input required type="number" name="berat_kotor" class="form-control" placeholder="Berat Kotor"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Lokasi *</label>
                                        <select class="form-control" name="lokasi" required>
                                          <option value="">--Pilih Lokasi--</option>
                                          <option>Sei Putting KPP-BGM</option>
                                          <option>Sei Putting H3254</option>
                                          <option>TCT</option>
                                        </select>
                                  </div> 

                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jam Validasi </label>
                                        <input type="time" name="jam_validasi" class="form-control" placeholder="Jam Validasi"> 
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







  <?php foreach ($data_produksi->result_array() as $i) :
                                            $id_produksi=$i['id_produksi'];
                                          ?>
       <form  action="<?php echo base_url().'produksi/update_produksi'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_produksi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PRODUKSI</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_produksi" value="<?php echo $id_produksi;?>">


                               

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No Tiket *</label>
                                        <input value="<?php echo $i['no_tiket'];?>" required type="text" name="no_tiket" class="form-control" placeholder="No Tiket"> 
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
                                        <label class="form-label" >shift *</label>
                                        <select class="form-control" name="shift" required>
                                          <option value="">pilih shift</option>
                                          <option <?= ($i['shift']=="6:30 - 18:00")?'selected':'';?>>6:30 - 18:00</option>
                                          <option <?= ($i['shift']=="18:00 - 6:30")?'selected':'';?>>18:00 - 6:30</option>
                                        </select>  
                                  </div> 



                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Sopir *</label>
                                        <select class="form-control" name="id_sopir" required>
                                          <option value="">--Pilih Sopir--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor")->result_array() as $key):?>
                                            <option <?= ($i['id_sopir']==$key['id_sopir'])?'selected':'';?> value="<?php echo $key['id_sopir'];?>"><?php echo $key['nik'];?> # <?php echo $key['nama_sopir'];?> # <?php echo $key['nomor_unit'];?> # <?php echo $key['nama_vendor'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Masuk *</label>
                                        <input value="<?php echo $i['tanggal_masuk'];?>" required type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jam Masuk *</label>
                                        <input value="<?php echo $i['jam_masuk'];?>" required type="time" name="jam_masuk" class="form-control" placeholder="Jam Masuk"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Keluar *</label>
                                        <input value="<?php echo $i['tanggal_keluar'];?>" required type="date" name="tanggal_keluar" class="form-control" placeholder="Tanggal Keluar"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jam Keluar *</label>
                                        <input value="<?php echo $i['jam_keluar'];?>" required type="time" name="jam_keluar" class="form-control" placeholder="Jam Keluar"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Berat Kotor *</label>
                                        <input value="<?php echo $i['berat_kotor'];?>" required type="number" name="berat_kotor" class="form-control" placeholder="Berat Kotor"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Lokasi *</label>
                                        <select class="form-control" name="lokasi" required>
                                          <option value="">--pilih lokasi--</option>
                                          <option <?= ($i['lokasi']=="Sei Putting KPP-BGM")?'selected':'';?> >Sei Putting KPP-BGM</option>
                                          <option <?= ($i['lokasi']=="Sei Putting H3254")?'selected':'';?> >Sei Putting H3254</option>
                                          <option <?= ($i['lokasi']=="TCT")?'selected':'';?> >TCT</option>
                                        </select>
                                  </div>  

                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jam Validasi </label>
                                        <input value="<?php echo $i['jam_validasi'];?>" type="time" name="jam_validasi" class="form-control" placeholder="Jam Validasi"> 
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



   <?php foreach ($data_produksi->result_array() as $i) :
                                            $id_produksi=$i['id_produksi'];
                                          ?>
       <form  action="<?php echo base_url().'produksi/hapus_produksi'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_produksi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PRODUKSI</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_produksi;?>">
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
  text: 'Produksi Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Produksi Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Produksi Behasil di HAPUS'
})
 </script>
<?php endif; ?>