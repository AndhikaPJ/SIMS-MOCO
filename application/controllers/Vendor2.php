<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor2 extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_vendor2');
	}

	public function index()
	{
		$x['data_vendor2']=$this->m_vendor2->get_all_vendor2();
		$x['sidebar']="vendor2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('vendor2/vendor2');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_vendor2']=$this->m_vendor2->get_all_vendor2();
		$this->load->view('vendor2/cetak',$x);
	}

		public function simpan_vendor2()
	{
				$data = array(
								'nama_vendor' => $this->input->post('nama_vendor'),
								'alamat_vendor' => $this->input->post('alamat_vendor'),
								'pemilik' => $this->input->post('pemilik'),
								'no_telp_vendor' => $this->input->post('no_telp_vendor'),
								'username' => $this->input->post('username'),
								'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
								'jumlah_aktual_unit_komisioning' => $this->input->post('jumlah_aktual_unit_komisioning'),
							);
				
					$result = $this->m_vendor2->add_vendor2($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('vendor2'));
					}
	}


	


		public function update_vendor2()
	{
		$id = $this->input->post('id_vendor'); 
			

			if (empty($this->input->post('password'))) {
				$data = array(
								'nama_vendor' => $this->input->post('nama_vendor'),
								'alamat_vendor' => $this->input->post('alamat_vendor'),
								'pemilik' => $this->input->post('pemilik'),
								'no_telp_vendor' => $this->input->post('no_telp_vendor'),
								'username' => $this->input->post('username'),
								'jumlah_aktual_unit_komisioning' => $this->input->post('jumlah_aktual_unit_komisioning'),
							);
			}else{
				$data = array(
								'nama_vendor' => $this->input->post('nama_vendor'),
								'alamat_vendor' => $this->input->post('alamat_vendor'),
								'pemilik' => $this->input->post('pemilik'),
								'no_telp_vendor' => $this->input->post('no_telp_vendor'),
								'username' => $this->input->post('username'),
								'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
								'jumlah_aktual_unit_komisioning' => $this->input->post('jumlah_aktual_unit_komisioning'),
							);
			}
					
				
					$result = $this->m_vendor2->edit_vendor2($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('vendor2'));
					}
	}

	function hapus_vendor2(){
		$kode=$this->input->post('kode');
		$this->m_vendor2->hapus_vendor2($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('vendor2');
	}
}