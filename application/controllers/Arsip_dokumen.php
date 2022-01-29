<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class arsip_dokumen extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_arsip_dokumen');
	}

	public function index()
	{
		$x['data_arsip_dokumen']=$this->m_arsip_dokumen->get_all_arsip_dokumen();
		$x['sidebar']="arsip_dokumen";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('arsip_dokumen/arsip_dokumen');
		$this->load->view('footer');
	}

		public function print2()
	{
		$x['data_arsip_dokumen']=$this->m_arsip_dokumen->get_all_arsip_dokumen();
		$x['sidebar']="arsip_dokumen2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('arsip_dokumen/print');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_arsip_dokumen']=$this->db->query("SELECT * FROM arsip_dokumen,vendor where arsip_dokumen.id_vendor=vendor.id_vendor AND date(tanggal_dokumen) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('arsip_dokumen/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_arsip_dokumen']=$this->m_arsip_dokumen->get_all_arsip_dokumen();
		$this->load->view('arsip_dokumen/cetak',$x);
	}

		public function simpan_arsip_dokumen()
	{

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|docx';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['file_dokumen']['name']))
				{
				if($this->upload->do_upload('file_dokumen'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data = array(
								'id_vendor' => $this->input->post('id_vendor'),
								'nama_dokumen' => $this->input->post('nama_dokumen'),
								'nomor_dokumen' => $this->input->post('nomor_dokumen'),
								'tanggal_dokumen' => $this->input->post('tanggal_dokumen'),
								'keterangan' => $this->input->post('keterangan'),
								'status_dokumen' => $this->input->post('status_dokumen'),
								'file_dokumen' => $dok,
							);

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('benda');
					}
				}
				else{
						$data = array(
								'id_vendor' => $this->input->post('id_vendor'),
								'nama_dokumen' => $this->input->post('nama_dokumen'),
								'nomor_dokumen' => $this->input->post('nomor_dokumen'),
								'tanggal_dokumen' => $this->input->post('tanggal_dokumen'),
								'keterangan' => $this->input->post('keterangan'),
								'status_dokumen' => $this->input->post('status_dokumen'),
							);
					
				}

				
					$result = $this->m_arsip_dokumen->add_arsip_dokumen($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('arsip_dokumen'));
					}
	}


	


		public function update_arsip_dokumen()
	{
		$id = $this->input->post('id_arsip_dokumen'); 
			

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|docx';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['file_dokumen']['name']))
				{
				if($this->upload->do_upload('file_dokumen'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data = array(
								'id_vendor' => $this->input->post('id_vendor'),
								'nama_dokumen' => $this->input->post('nama_dokumen'),
								'nomor_dokumen' => $this->input->post('nomor_dokumen'),
								'tanggal_dokumen' => $this->input->post('tanggal_dokumen'),
								'keterangan' => $this->input->post('keterangan'),
								'status_dokumen' => $this->input->post('status_dokumen'),
								'file_dokumen' => $dok,
							);

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('benda');
					}
				}
				else{
						$data = array(
								'id_vendor' => $this->input->post('id_vendor'),
								'nama_dokumen' => $this->input->post('nama_dokumen'),
								'nomor_dokumen' => $this->input->post('nomor_dokumen'),
								'tanggal_dokumen' => $this->input->post('tanggal_dokumen'),
								'keterangan' => $this->input->post('keterangan'),
								'status_dokumen' => $this->input->post('status_dokumen'),
							);
					
				}
					
				
					$result = $this->m_arsip_dokumen->edit_arsip_dokumen($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('arsip_dokumen'));
					}
	}

	function hapus_arsip_dokumen(){
		$kode=$this->input->post('kode');
		$this->m_arsip_dokumen->hapus_arsip_dokumen($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('arsip_dokumen');
	}
}