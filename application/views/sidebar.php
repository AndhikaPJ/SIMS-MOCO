
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<?php if(empty($this->session->userdata('foto'))):?>
													<img src="<?php echo base_url();?>/assets/image/profil3.png" alt="image profile" class="avatar-img rounded-circle">
												<?php else:?>
													<img src="<?php echo base_url();?>/assets/image/<?php echo $this->session->userdata('foto');?>g" alt="image profile" class="avatar-img rounded-circle">
												<?php endif;?>
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $this->session->userdata('nama_lengkap');?>
									<span class="user-level"><?php echo $this->session->userdata('level');?></span>
									<!--<span class="user-level"><?php echo $this->session->userdata('level');?></span>-->
								</span>
							</a>
							<div class="clearfix"></div>

						
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?php if($sidebar=="dashboard"): ?>active<?php endif;?>">
							<a href="<?php echo base_url();?>dashboard">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
							<?php if($this->session->userdata('level')=="vendor"):?>
						<li class="nav-item <?php if($sidebar=="pengumuman"): ?>active<?php endif;?>">
							<a href="<?php echo base_url();?>pengumuman">
								<i class="fa fa-bullhorn"></i>
								<p>Pengumuman</p>
							</a>
						</li>
					<?php endif;?>

						<?php if($this->session->userdata('level')!="vendor"):?>
						<li class="nav-item 
						<?php if($sidebar=="pengguna"): ?>active<?php endif;?>
						<?php if($sidebar=="vendor2"): ?>active<?php endif;?>
						<?php if($sidebar=="armada"): ?>active<?php endif;?>
						<?php if($sidebar=="pengumuman"): ?>active<?php endif;?>
						">
							<a data-toggle="collapse" href="#charts">
								<i class="fas fa-server"></i>
								<p>Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse 
						<?php if($sidebar=="pengguna"): ?>show<?php endif;?>
						<?php if($sidebar=="vendor2"): ?>show<?php endif;?>
						<?php if($sidebar=="armada"): ?>show<?php endif;?>
						<?php if($sidebar=="pengumuman"): ?>show<?php endif;?>
							" id="charts">
								<ul class="nav nav-collapse">
									<li class="<?php if($sidebar=="pengguna"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pengguna">
											<span class="sub-item">Pengguna</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="armada"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>armada">
											<span class="sub-item">Armada</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="vendor2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>vendor2">
											<span class="sub-item">Perusahaan</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pengumuman"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pengumuman">
											<span class="sub-item">Pengumuman</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<?php endif;?>

						
						<li class="nav-item 
						<?php if($sidebar=="sopir"): ?>active<?php endif;?>
						<?php if($sidebar=="pengajuan_simper"): ?>active<?php endif;?>
						<?php if($sidebar=="produksi"): ?>active<?php endif;?>
						<?php if($sidebar=="target_produksi"): ?>active<?php endif;?>
						<?php if($sidebar=="arsip_dokumen"): ?>active<?php endif;?>
						">
							<a data-toggle="collapse" href="#charts2">
								<i class="fas fa-database"></i>
								<p>Transaksi Data</p>
								<span class="caret"></span>
							</a>
							<div class="collapse 
						<?php if($sidebar=="sopir"): ?>show<?php endif;?>
						<?php if($sidebar=="pengajuan_simper"): ?>show<?php endif;?>
						<?php if($sidebar=="produksi"): ?>show<?php endif;?>
						<?php if($sidebar=="target_produksi"): ?>show<?php endif;?>
						<?php if($sidebar=="arsip_dokumen"): ?>show<?php endif;?>
							" id="charts2">
								<ul class="nav nav-collapse">
									<li class="<?php if($sidebar=="sopir"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>sopir">
											<span class="sub-item">Data Driver</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pengajuan_simper"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pengajuan_simper">
											<span class="sub-item">Pengajuan SIMPER</span>
										</a>
									</li>
									<?php if($this->session->userdata('level')!="vendor"):?>
									<li class="<?php if($sidebar=="produksi"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>produksi">
											<span class="sub-item">Data Produksi</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="target_produksi"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>target_produksi">
											<span class="sub-item">Data Target Produksi</span>
										</a>
									</li>
								<?php endif;?>
									<li class="<?php if($sidebar=="arsip_dokumen"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>arsip_dokumen">
											<span class="sub-item">Data Arsip Dokumen</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						
						<?php if($this->session->userdata('level')!="vendor"):?>
						<li class="nav-item 
						<?php if($sidebar=="sopir2"): ?>active<?php endif;?>
						<?php if($sidebar=="pengajuan_simper2"): ?>active<?php endif;?>
						<?php if($sidebar=="produksi2"): ?>active<?php endif;?>
						<?php if($sidebar=="target_produksi2"): ?>active<?php endif;?>
						<?php if($sidebar=="arsip_dokumen2"): ?>active<?php endif;?>
						<?php if($sidebar=="berita_acara_produksi"): ?>active<?php endif;?>
						">
							<a data-toggle="collapse" href="#charts3">
								<i class="fas fa-print"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse 
						<?php if($sidebar=="sopir2"): ?>show<?php endif;?>
						<?php if($sidebar=="pengajuan_simper2"): ?>show<?php endif;?>
						<?php if($sidebar=="produksi2"): ?>show<?php endif;?>
						<?php if($sidebar=="target_produksi2"): ?>show<?php endif;?>
						<?php if($sidebar=="arsip_dokumen2"): ?>show<?php endif;?>
						<?php if($sidebar=="berita_acara_produksi"): ?>show<?php endif;?>
							" id="charts3">
								<ul class="nav nav-collapse">
									<li class="<?php if($sidebar=="sopir2"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>sopir/print2">
											<span class="sub-item">Laporan Data Driver</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pengajuan_simper2"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>pengajuan_simper/print2">
											<span class="sub-item">Laporan Pengajuan SIMPER</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="produksi2"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>produksi/print2">
											<span class="sub-item">Laporan Pencapaian Produksi</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="target_produksi2"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>target_produksi/print2">
											<span class="sub-item">Laporan Target Produksi</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="arsip_dokumen2"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>arsip_dokumen/print2">
											<span class="sub-item">Laporan Arsip Dokumen Subkontraktor</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="berita_acara_produksi"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>berita_acara_produksi">
											<span class="sub-item">Laporan Berita Acara Produksi</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<?php endif;?>


					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->