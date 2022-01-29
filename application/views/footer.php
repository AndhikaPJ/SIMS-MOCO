			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright ml-auto">
					Copyright &copy; 2021 Andhika Prima Jaya
					</div>				
				</div>
			</footer>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/setting-demo.js"></script>
	<script>
		$('#basic-datatables').DataTable({
			}); 
		//Untuk Data Jumlah Driver
		Circles.create({
			id:'circles-1',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: <?php echo $this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor")->num_rows();?>,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		//Status Pengajuan Simper
		Circles.create({
			id:'circles-2',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: <?php echo $this->db->query("SELECT * FROM pengajuan_simper,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND pengajuan_simper.id_sopir=sopir.id_sopir")->num_rows();?>,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		//Jumlah Produksi
		Circles.create({
			id:'circles-3',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: <?php echo $this->db->query("SELECT * FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir")->num_rows();?>,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		//Target Produksi
		Circles.create({
			id:'circles-4',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: <?php echo $this->db->query("SELECT * FROM target_produksi,vendor where target_produksi.id_vendor=vendor.id_vendor")->num_rows();?>,
			colors:['#f1f1f1', '#7d664b'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		//Pencapaian Produksi
		Circles.create({
			id:'circles-5',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: 0,
			colors:['#f1f1f1', '#487a76'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		//Arsip Dokumen
		Circles.create({
			id:'circles-6',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: <?php echo $this->db->query("SELECT * FROM arsip_dokumen,vendor where arsip_dokumen.id_vendor=vendor.id_vendor")->num_rows();?>,
			colors:['#f1f1f1', '#6f487a'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>
</html>