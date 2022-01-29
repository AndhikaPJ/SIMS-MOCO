		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h1 class="text-white pb-2 fw-bold">Dashboard</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--3">
						<div class="col-md-12">
							<div class="card full-height">
								<!--Jika Admin Login, Tampil Ini-->
								<?php if($this->session->userdata('level')!="vendor"):?>								
								<!-- Row Card No Padding ICON -->
								<div class="row row-card-no-pd">
										<div class="col-sm-6 col-md-3">
											<div class="card card-stats card-round">
												<div class="card-body ">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-user-2 text-success"></i>
															</div>
														</div>
														<div class="col-7 col-stats">
															<div class="numbers">
																<p class="card-category">Driver Hauler</p>
																<h4 class="card-title">
																	<?php echo $this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor")->num_rows();?>	
																 Orang</h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-3">
											<div class="card card-stats card-round">
												<div class="card-body ">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-delivery-truck text-success"></i>
															</div>
														</div>
														<div class="col-7 col-stats">
															<div class="numbers">
															<?php
																$hauler = $this->db->query("SELECT * FROM armada")->num_rows();
															?>
																<p class="card-category">Unit Hauler</p>
																<h4 class="card-title"><?php echo $hauler;?> Unit</h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-3">
											<div class="card card-stats card-round">
												<div class="card-body">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-suitcase text-success"></i>
															</div>
														</div>
														<div class="col-7 col-stats">
															<div class="numbers">
															<?php
															$perusahaan = $this->db->query("SELECT * FROM vendor")->num_rows();
															?>
																<p class="card-category">Perusahaan</p>
																<h4 class="card-title"><?php echo $perusahaan;?></h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-3">
											<div class="card card-stats card-round">
												<div class="card-body">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-repeat text-success"></i>
															</div>
														</div>
														<div class="col-7 col-stats">
															<div class="numbers">															
																<p class="card-category">Pengajuan Simper</p>
																<h4 class="card-title">
																	<?php echo $this->db->query("SELECT * FROM pengajuan_simper,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND pengajuan_simper.id_sopir=sopir.id_sopir")->num_rows();?>	
																</h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								<div class="card-body">								
									<div class="card-title text-uppercase fw-bold">Jumlah Produksi Hauling Perhari</div>
									<hr>

									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em; text-align:  center;">No.</th>
                                                        <th style="text-align: center;">Tanggal Data</th>
                                                        <th style="text-align: center;">Shift Siang</th>
                                                        <th style="text-align: center;">Shift Malam</th>
                                                        <th style="text-align: center;">Total Keseluruhan</th>
													</tr>
											</thead>
											<tbody>
												<?php 
												$tgl1=date('Y-m-d');
												$t_bersih1=0;
												$siang1=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl1' AND shift='6:30 - 18:00'")->row_array();
												$malam1=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl1' AND shift='18:00 - 6:30'")->row_array();
													$t_bersih1=$siang1['b_bersih']+$malam1['b_bersih'];
		                                          ?>
												 <tr>
                                              
	                                             <td style="flex: 0 0 auto; min-width: 2em;">1.</td>
	                                                <td><?php echo tgl_indo($tgl1);?></td>
	                                                <td><?php echo $siang1['b_bersih'];?></td>
	                                                <td><?php echo $malam1['b_bersih'];?></td>
	                                                <td><?php echo $t_bersih1;?></td>
	                                            </tr>


												<?php 
												$tgl2=date('Y-m-d', strtotime($tgl1. ' - 1 days'));
												$t_bersih2=0;
												$siang2=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl2' AND shift='6:30 - 18:00'")->row_array();
												$malam2=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl2' AND shift='18:00 - 6:30'")->row_array();
													$t_bersih2=$siang2['b_bersih']+$malam2['b_bersih'];
		                                          ?>
												 <tr>
                                              
	                                             <td style="flex: 0 0 auto; min-width: 2em;">2.</td>
	                                                <td><?php echo tgl_indo($tgl2);?></td>
	                                                <td><?php echo $siang2['b_bersih'];?></td>
	                                                <td><?php echo $malam2['b_bersih'];?></td>
	                                                <td><?php echo $t_bersih2;?></td>
	                                            </tr>


												<?php 
												$tgl3=date('Y-m-d', strtotime($tgl1. ' - 2 days'));
												$t_bersih3=0;
												$siang3=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl3' AND shift='6:30 - 18:00'")->row_array();
												$malam3=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl3' AND shift='18:00 - 6:30'")->row_array();
													$t_bersih3=$siang3['b_bersih']+$malam3['b_bersih'];
		                                          ?>
												 <tr>
                                              
	                                             <td style="flex: 0 0 auto; min-width: 2em;">3.</td>
	                                                <td><?php echo tgl_indo($tgl3);?></td>
	                                                <td><?php echo $siang3['b_bersih'];?></td>
	                                                <td><?php echo $malam3['b_bersih'];?></td>
	                                                <td><?php echo $t_bersih3;?></td>
	                                            </tr>


												<?php 
												$tgl4=date('Y-m-d', strtotime($tgl1. ' - 3 days'));
												$t_bersih4=0;
												$siang4=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl4' AND shift='6:30 - 18:00'")->row_array();
												$malam4=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl4' AND shift='18:00 - 6:30'")->row_array();
													$t_bersih4=$siang4['b_bersih']+$malam4['b_bersih'];
		                                          ?>
												 <tr>
                                              
	                                             <td style="flex: 0 0 auto; min-width: 2em;">4.</td>
	                                                <td><?php echo tgl_indo($tgl4);?></td>
	                                                <td><?php echo $siang4['b_bersih'];?></td>
	                                                <td><?php echo $malam4['b_bersih'];?></td>
	                                                <td><?php echo $t_bersih4;?></td>
	                                            </tr>


												<?php 
												$tgl5=date('Y-m-d', strtotime($tgl1. ' - 4 days'));
												$t_bersih5=0;
												$siang5=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl5' AND shift='6:30 - 18:00'")->row_array();
												$malam5=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl5' AND shift='18:00 - 6:30'")->row_array();
													$t_bersih5=$siang5['b_bersih']+$malam5['b_bersih'];
		                                          ?>
												 <tr>
                                              
	                                             <td style="flex: 0 0 auto; min-width: 2em;">5.</td>
	                                                <td><?php echo tgl_indo($tgl5);?></td>
	                                                <td><?php echo $siang5['b_bersih'];?></td>
	                                                <td><?php echo $malam5['b_bersih'];?></td>
	                                                <td><?php echo $t_bersih5;?></td>
	                                            </tr>


												<?php 
												$tgl6=date('Y-m-d', strtotime($tgl1. ' - 5 days'));
												$t_bersih6=0;
												$siang6=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl6' AND shift='6:30 - 18:00'")->row_array();
												$malam6=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl6' AND shift='18:00 - 6:30'")->row_array();
													$t_bersih6=$siang6['b_bersih']+$malam6['b_bersih'];
		                                          ?>
												 <tr>
                                              
	                                             <td style="flex: 0 0 auto; min-width: 2em;">6.</td>
	                                                <td><?php echo tgl_indo($tgl6);?></td>
	                                                <td><?php echo $siang6['b_bersih'];?></td>
	                                                <td><?php echo $malam6['b_bersih'];?></td>
	                                                <td><?php echo $t_bersih6;?></td>
	                                            </tr>


												<?php 
												$tgl7=date('Y-m-d', strtotime($tgl1. ' - 6 days'));
												$t_bersih7=0;
												$siang7=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl7' AND shift='6:30 - 18:00'")->row_array();
												$malam7=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl7' AND shift='18:00 - 6:30'")->row_array();
													$t_bersih7=$siang7['b_bersih']+$malam7['b_bersih'];
		                                          ?>
												 <tr>
                                              
	                                             <td style="flex: 0 0 auto; min-width: 2em;">7.</td>
	                                                <td><?php echo tgl_indo($tgl7);?></td>
	                                                <td><?php echo $siang7['b_bersih'];?></td>
	                                                <td><?php echo $malam7['b_bersih'];?></td>
	                                                <td><?php echo $t_bersih7;?></td>
	                                            </tr>

	                                           </tbody>
	                                    </table>
									</div>

									<!--Jika Buka Admin Login, Tampilkan Ini-->	
									<?php else:?>
											<div class="col-md-12 mb-3 pt-3">
												<span class="text-center fw-bold">SELAMAT DATANG <?php echo $this->session->userdata('nama_lengkap');?>, ANDA DAPAT MENAMBAHKAN DATA SOPIR, MENGAJUKAN SIMPER DAN MENAMBAH ARSIP DOKUMEN DAN PENGUMUMAN.</span>
												
												<div class="separator-dashed"></div>
												<div class="card-title text-uppercase fw-bold">Jumlah Produksi Hauling Perhari</div>
												<hr>
												<div class="table-responsive">
													<table id="basic-datatables" class="display table table-striped table-hover" >
														<thead>
																<tr>
																	<th style="flex: 0 0 auto; min-width: 2em; text-align:  center;">No.</th>
																	<th style="text-align: center;">Tanggal Data</th>
																	<th style="text-align: center;">Shift Siang</th>
																	<th style="text-align: center;">Shift Malam</th>
																	<th style="text-align: center;">Total Keseluruhan</th>
																</tr>
														</thead>
														<tbody>
															<?php 
															$tgl1=date('Y-m-d');
															$t_bersih1=0;
															$siang1=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl1' AND shift='6:30 - 18:00'")->row_array();
															$malam1=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl1' AND shift='18:00 - 6:30'")->row_array();
																$t_bersih1=$siang1['b_bersih']+$malam1['b_bersih'];
															?>
															<tr>
														
															<td style="flex: 0 0 auto; min-width: 2em;">1.</td>
																<td><?php echo tgl_indo($tgl1);?></td>
																<td><?php echo $siang1['b_bersih'];?></td>
																<td><?php echo $malam1['b_bersih'];?></td>
																<td><?php echo $t_bersih1;?></td>
															</tr>


															<?php 
															$tgl2=date('Y-m-d', strtotime($tgl1. ' - 1 days'));
															$t_bersih2=0;
															$siang2=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl2' AND shift='6:30 - 18:00'")->row_array();
															$malam2=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl2' AND shift='18:00 - 6:30'")->row_array();
																$t_bersih2=$siang2['b_bersih']+$malam2['b_bersih'];
															?>
															<tr>
														
															<td style="flex: 0 0 auto; min-width: 2em;">2.</td>
																<td><?php echo tgl_indo($tgl2);?></td>
																<td><?php echo $siang2['b_bersih'];?></td>
																<td><?php echo $malam2['b_bersih'];?></td>
																<td><?php echo $t_bersih2;?></td>
															</tr>


															<?php 
															$tgl3=date('Y-m-d', strtotime($tgl1. ' - 2 days'));
															$t_bersih3=0;
															$siang3=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl3' AND shift='6:30 - 18:00'")->row_array();
															$malam3=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl3' AND shift='18:00 - 6:30'")->row_array();
																$t_bersih3=$siang3['b_bersih']+$malam3['b_bersih'];
															?>
															<tr>
														
															<td style="flex: 0 0 auto; min-width: 2em;">3.</td>
																<td><?php echo tgl_indo($tgl3);?></td>
																<td><?php echo $siang3['b_bersih'];?></td>
																<td><?php echo $malam3['b_bersih'];?></td>
																<td><?php echo $t_bersih3;?></td>
															</tr>


															<?php 
															$tgl4=date('Y-m-d', strtotime($tgl1. ' - 3 days'));
															$t_bersih4=0;
															$siang4=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl4' AND shift='6:30 - 18:00'")->row_array();
															$malam4=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl4' AND shift='18:00 - 6:30'")->row_array();
																$t_bersih4=$siang4['b_bersih']+$malam4['b_bersih'];
															?>
															<tr>
														
															<td style="flex: 0 0 auto; min-width: 2em;">4.</td>
																<td><?php echo tgl_indo($tgl4);?></td>
																<td><?php echo $siang4['b_bersih'];?></td>
																<td><?php echo $malam4['b_bersih'];?></td>
																<td><?php echo $t_bersih4;?></td>
															</tr>


															<?php 
															$tgl5=date('Y-m-d', strtotime($tgl1. ' - 4 days'));
															$t_bersih5=0;
															$siang5=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl5' AND shift='6:30 - 18:00'")->row_array();
															$malam5=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl5' AND shift='18:00 - 6:30'")->row_array();
																$t_bersih5=$siang5['b_bersih']+$malam5['b_bersih'];
															?>
															<tr>
														
															<td style="flex: 0 0 auto; min-width: 2em;">5.</td>
																<td><?php echo tgl_indo($tgl5);?></td>
																<td><?php echo $siang5['b_bersih'];?></td>
																<td><?php echo $malam5['b_bersih'];?></td>
																<td><?php echo $t_bersih5;?></td>
															</tr>


															<?php 
															$tgl6=date('Y-m-d', strtotime($tgl1. ' - 5 days'));
															$t_bersih6=0;
															$siang6=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl6' AND shift='6:30 - 18:00'")->row_array();
															$malam6=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl6' AND shift='18:00 - 6:30'")->row_array();
																$t_bersih6=$siang6['b_bersih']+$malam6['b_bersih'];
															?>
															<tr>
														
															<td style="flex: 0 0 auto; min-width: 2em;">6.</td>
																<td><?php echo tgl_indo($tgl6);?></td>
																<td><?php echo $siang6['b_bersih'];?></td>
																<td><?php echo $malam6['b_bersih'];?></td>
																<td><?php echo $t_bersih6;?></td>
															</tr>


															<?php 
															$tgl7=date('Y-m-d', strtotime($tgl1. ' - 6 days'));
															$t_bersih7=0;
															$siang7=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl7' AND shift='6:30 - 18:00'")->row_array();
															$malam7=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND tanggal_masuk='$tgl7' AND shift='18:00 - 6:30'")->row_array();
																$t_bersih7=$siang7['b_bersih']+$malam7['b_bersih'];
															?>
															<tr>
														
															<td style="flex: 0 0 auto; min-width: 2em;">7.</td>
																<td><?php echo tgl_indo($tgl7);?></td>
																<td><?php echo $siang7['b_bersih'];?></td>
																<td><?php echo $malam7['b_bersih'];?></td>
																<td><?php echo $t_bersih7;?></td>
															</tr>

														</tbody>
													</table>
												</div>
											</div>
									
									<?php endif;?>
								</div>



							</div>
						</div>
					</div>
				</div>

					<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title text-uppercase fw-bold">Jumlah Produksi Hauling Perbulan</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
									<?php
									$thn_sekarang=date('Y');
									$bln1=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=1 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln2=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=2 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln3=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=3 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln4=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=4 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln5=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=5 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln6=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=6 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln7=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=7 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln8=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=8 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln9=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=9 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln10=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=10 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln11=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=11 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();
									$bln12=$this->db->query("SELECT SUM(berat_bersih) as b_bersih,tanggal_masuk  FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk)=12 AND YEAR(tanggal_masuk)='$thn_sekarang'")->row_array();

									$no1=rand(0,255);
									$no2=rand(0,255);
									?>
									
										 <canvas id="myChart"></canvas>
										 <script src="<?php echo base_url();?>/assets/js/Chart.min.js">
										</script>

									<script type="text/javascript">var ctx = document.getElementById("myChart").getContext('2d');
									var myChart = new Chart(ctx, {
									type: 'bar',
									data: {
										labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
										datasets: [{
										label: 'Jumlah Produksi',
										data: [<?php echo $bln1['b_bersih']?>, <?php echo $bln2['b_bersih']?>,<?php echo $bln3['b_bersih']?>,<?php echo $bln4['b_bersih']?>,<?php echo $bln5['b_bersih']?>,<?php echo $bln6['b_bersih']?>,<?php echo $bln7['b_bersih']?>,<?php echo $bln8['b_bersih']?>,<?php echo $bln9['b_bersih']?>,<?php echo $bln10['b_bersih']?>,<?php echo $bln11['b_bersih']?>,<?php echo $bln12['b_bersih']?>, ],
										backgroundColor: "rgba(<?php echo $no1?>,<?php echo $no2?>, 245)"
										},


										]
									}
									});</script>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	

				<!--Gasan Pengumuman-->							
				<div class="page-inner mt--5">
				<div class="row mt--2">
				
							<div class="col-md-12">
							
								<div class="card">
									<div class="card-header">
										<div class="card-head-row">
											<div class="card-title text-uppercase fw-bold">Pengumuman!</div>
										</div>
									</div>
									<?php $no=1; foreach ($this->db->query("SELECT * FROM pengumuman")->result_array() as $key):?>
									<div class="card-body">
										<div class="d-flex">
											<div class="flex-1 ml-3 pt-1">
												<h6 class="text-uppercase fw-bold mb-1"><?php echo $key['judul_kegiatan'];?>
												<span class="text-success pl-3"><?php echo $key['status'];?></span></h6>
												<div class="separator-dashed"></div>
												<p class="text-muted" style="text-align: justify; text-justify: inter-word;"><?php echo $key['detail_kegiatan'];?></p>
											</div>
										</div><br>
										<div class="separator-dashed"></div>
										<div class="float-right pt-1">
											<small class="text-muted">Di update oleh <b><?php echo $key['di_buat_oleh'];?></b> (<?php echo $key['level'];?>) </small> <br>
											<small class="text-muted"><?php echo tgl_indo($key['tanggal_kegiatan']);?></small><br>
										</div>
										<div class="float-left pt-1">
											<a target="_blank" style="margin: 2px; float: left;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $key['lampiran'];?>" class="btn btn-success mdi mdi-pencil btn-sm"><i class="fa fa-eye"></i> Lihat Lampiran</a>
										</div>
									</div>
									<hr color="black">
									<?php $no=$no+1; endforeach;?>
									
								</div>
								
							</div>
							
					</div>
				</div>

			</div>