<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_produksi extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_target_produksi');
	}

	public function index()
	{
		$x['data_target_produksi']=$this->m_target_produksi->get_all_target_produksi();
		$x['sidebar']="target_produksi";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('target_produksi/target_produksi');
		$this->load->view('footer');
	}

	public function print2()
	{
		$x['data_target_produksi']=$this->m_target_produksi->get_all_target_produksi();
		$x['sidebar']="target_produksi2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('target_produksi/print');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tahun=$this->input->post('tahun');
		$bulan=$this->input->post('bulan');
		$x['tahun']=$this->input->post('tahun');
		$x['bulan']=$this->input->post('bulan');
		$x['data_target_produksi']=$this->db->query("SELECT * FROM target_produksi,vendor where target_produksi.id_vendor=vendor.id_vendor AND YEAR(tahun) ='$tahun' AND bulan ='$bulan'");
		$this->load->view('target_produksi/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_target_produksi']=$this->m_target_produksi->get_all_target_produksi();
		$this->load->view('target_produksi/cetak',$x);
	}

		public function simpan_target_produksi()
	{

				$data = array(
								'tahun' => $this->input->post('tahun'),
								'bulan' => $this->input->post('bulan'),
								'volume_bulanan' => $this->input->post('volume_bulanan'),
								'jumlah_hari' => $this->input->post('jumlah_hari'),
								'id_vendor' => $this->input->post('id_vendor'),
							);

				
					$result = $this->m_target_produksi->add_target_produksi($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('target_produksi'));
					}
	}


	


		public function update_target_produksi()
	{
		$id = $this->input->post('id_target_produksi'); 
			
				$data = array(
								'tahun' => $this->input->post('tahun'),
								'bulan' => $this->input->post('bulan'),
								'volume_bulanan' => $this->input->post('volume_bulanan'),
								'jumlah_hari' => $this->input->post('jumlah_hari'),
								'id_vendor' => $this->input->post('id_vendor'),
							);
					
				
					$result = $this->m_target_produksi->edit_target_produksi($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('target_produksi'));
					}
	}

	function hapus_target_produksi(){
		$kode=$this->input->post('kode');
		$this->m_target_produksi->hapus_target_produksi($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('target_produksi');
	}
}