<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pengumuman');
	}

	public function index()
	{
		$x['data_pengumuman']=$this->m_pengumuman->get_all_pengumuman();
		$x['sidebar']="pengumuman";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pengumuman/pengumuman');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_pengumuman']=$this->m_pengumuman->get_all_pengumuman();
		$this->load->view('pengumuman/cetak',$x);
	}

		public function simpan_pengumuman()
	{

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['lampiran']['name']))
				{
				if($this->upload->do_upload('lampiran'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data = array(
								'di_buat_oleh' => $this->session->userdata('nama_lengkap'),
								'level' => $this->session->userdata('level'),
								'judul_kegiatan' => $this->input->post('judul_kegiatan'),
								'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
								'detail_kegiatan' => $this->input->post('detail_kegiatan'),
								'status' => $this->input->post('status'),
								'lampiran' => $dok,
							);

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pengumuman');
					}
				}
				else{
						$data = array(
								'di_buat_oleh' => $this->session->userdata('nama_lengkap'),
								'level' => $this->session->userdata('level'),
								'judul_kegiatan' => $this->input->post('judul_kegiatan'),
								'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
								'detail_kegiatan' => $this->input->post('detail_kegiatan'),
								'status' => $this->input->post('status'),
							);
					
				}

				
					$result = $this->m_pengumuman->add_pengumuman($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pengumuman'));
					}
	}


	


		public function update_pengumuman()
	{
		$id = $this->input->post('id_pengumuman'); 
			

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['lampiran']['name']))
				{
				if($this->upload->do_upload('lampiran'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data = array(
								'di_buat_oleh' => $this->session->userdata('nama_lengkap'),
								'level' => $this->session->userdata('level'),
								'judul_kegiatan' => $this->input->post('judul_kegiatan'),
								'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
								'detail_kegiatan' => $this->input->post('detail_kegiatan'),
								'status' => $this->input->post('status'),
								'lampiran' => $dok,
							);

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pengumuman');
					}
				}
				else{
						$data = array(
								'di_buat_oleh' => $this->session->userdata('nama_lengkap'),
								'level' => $this->session->userdata('level'),
								'judul_kegiatan' => $this->input->post('judul_kegiatan'),
								'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
								'detail_kegiatan' => $this->input->post('detail_kegiatan'),
								'status' => $this->input->post('status'),
							);
					
				}
					
				
					$result = $this->m_pengumuman->edit_pengumuman($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pengumuman'));
					}
	}

	function hapus_pengumuman(){
		$kode=$this->input->post('kode');
		$this->m_pengumuman->hapus_pengumuman($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pengumuman');
	}
}