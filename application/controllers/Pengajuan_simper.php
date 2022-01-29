<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_simper extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pengajuan_simper');
	}

	public function index()
	{
		$x['data_pengajuan_simper']=$this->m_pengajuan_simper->get_all_pengajuan_simper();
		$x['sidebar']="pengajuan_simper";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pengajuan_simper/pengajuan_simper');
		$this->load->view('footer');
	}

	public function print2()
	{
		$x['data_pengajuan_simper']=$this->m_pengajuan_simper->get_all_pengajuan_simper();
		$x['sidebar']="pengajuan_simper2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pengajuan_simper/print');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_pengajuan_simper']=$this->db->query("SELECT * FROM sopir,armada,vendor,pengajuan_simper where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND pengajuan_simper.id_sopir=sopir.id_sopir AND date(tanggal_pengajuan) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('pengajuan_simper/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_pengajuan_simper']=$this->m_pengajuan_simper->get_all_pengajuan_simper();
		$this->load->view('pengajuan_simper/cetak',$x);
	}

	public function cetak2($id)
	{	
		$x['data_pengajuan_simper']=$this->db->query("SELECT * FROM sopir,armada,vendor,pengajuan_simper where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND pengajuan_simper.id_sopir=sopir.id_sopir AND pengajuan_simper.id_pengajuan_simper='$id'")->row_array();
		$this->load->view('pengajuan_simper/cetak2',$x);
	}

	public function cetak3($id)
	{	
		$x['data_pengajuan_simper']=$this->db->query("SELECT * FROM sopir,armada,vendor,pengajuan_simper where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND pengajuan_simper.id_sopir=sopir.id_sopir AND pengajuan_simper.id_pengajuan_simper='$id'")->row_array();
		$this->load->view('pengajuan_simper/simper',$x);
	}

		public function simpan_pengajuan_simper()
	{
			if ($this->session->userdata('level')=="vendor") {
				$status_pengajuan="MENUNGGU KONFIRMASI";
			}else{
				$status_pengajuan="DITERIMA";
			}
					
				    $data['id_sopir'] = $this->input->post('id_sopir');
				    $data['jenis_simper'] = $this->input->post('jenis_simper');
				    $data['tanggal_pengajuan'] = $this->input->post('tanggal_pengajuan');
				    $data['nomor_sim'] = $this->input->post('nomor_sim');
				    $data['status_pengajuan'] = $status_pengajuan;
				
					$result = $this->m_pengajuan_simper->add_pengajuan_simper($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pengajuan_simper'));
					}
	}


	


		public function update_pengajuan_simper()
	{
		$id = $this->input->post('id_pengajuan_simper'); 
			

					$data['id_sopir'] = $this->input->post('id_sopir');
				    $data['jenis_simper'] = $this->input->post('jenis_simper');
				    $data['tanggal_pengajuan'] = $this->input->post('tanggal_pengajuan');
				    $data['nomor_sim'] = $this->input->post('nomor_sim');
					
				
					$result = $this->m_pengajuan_simper->edit_pengajuan_simper($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pengajuan_simper'));
					}
	}

		public function konfir()
	{
		$id = $this->input->post('id_pengajuan_simper'); 
			

					$data['status_pengajuan'] = $this->input->post('status_pengajuan');
					$data['keterangan_admin'] = $this->input->post('keterangan_admin');
					
				
					$result = $this->m_pengajuan_simper->edit_pengajuan_simper($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit2', 'Record is Added Successfully!');
						redirect(base_url('pengajuan_simper'));
					}
	}

	function hapus_pengajuan_simper(){
		$kode=$this->input->post('kode');
		$this->m_pengajuan_simper->hapus_pengajuan_simper($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pengajuan_simper');
	}
}