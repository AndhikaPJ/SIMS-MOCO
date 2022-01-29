<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sopir extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_sopir');
	}

	public function index()
	{
		$x['data_sopir']=$this->m_sopir->get_all_sopir();
		$x['sidebar']="sopir";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('sopir/sopir');
		$this->load->view('footer');
	}

	public function print2()
	{
		$x['data_sopir']=$this->m_sopir->get_all_sopir();
		$x['sidebar']="sopir2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('sopir/print');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_sopir']=$this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND date(tanggal_masuk_sopir) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('sopir/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_sopir']=$this->m_sopir->get_all_sopir();
		$this->load->view('sopir/cetak',$x);
	}

	public function cetak2($id)
	{	
		$x['data_sopir']=$this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND sopir.id_sopir='$id'")->row_array();
		$this->load->view('sopir/cetak2',$x);
	}

		public function simpan_sopir()
	{
					$config['upload_path'] = './assets/image/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['encrypt_name'] = TRUE;
					$config['max_size']    = 0;
					$this->upload->initialize($config);
					$data = array();

					if(!empty($_FILES['foto_sopir']['name']))
					{
						if($this->upload->do_upload('foto_sopir')) {   
					        $dataInfo = $this->upload->data();
					        $data['foto_sopir'] = $dataInfo['file_name'];
					    }
					    else{
					    	$this->session->set_flashdata('foto_sopir_salah', 'Record is Added Successfully!');
							redirect(base_url('sopir'));
					    }
					}

					if(!empty($_FILES['foto_ktp']['name']))
					{
						if($this->upload->do_upload('foto_ktp')) {   
					        $dataInfo = $this->upload->data();
					        $data['foto_ktp'] = $dataInfo['file_name'];
					    }
					    else{
					    	$this->session->set_flashdata('foto_ktp_salah', 'Record is Added Successfully!');
							redirect(base_url('sopir'));
					    }
					}

					if(!empty($_FILES['foto_sim']['name']))
					{
						if($this->upload->do_upload('foto_sim')) {   
					        $dataInfo = $this->upload->data();
					        $data['foto_sim'] = $dataInfo['file_name'];
					    }
					    else{
					    	$this->session->set_flashdata('foto_sim_salah', 'Record is Added Successfully!');
							redirect(base_url('sopir'));
					    }
					}

				   
					
				    $data['id_armada'] = $this->input->post('id_armada');
				    $data['id_vendor'] = $this->input->post('id_vendor');
				    $data['nik'] = $this->input->post('nik');
				    $data['nama_sopir'] = $this->input->post('nama_sopir');
				    $data['tempat_lahir'] = $this->input->post('tempat_lahir');
				    $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
				    $data['alamat'] = $this->input->post('alamat');
				    $data['no_hp'] = $this->input->post('no_hp');
				    $data['jenis_sim'] = $this->input->post('jenis_sim');
				    $data['posisi'] = $this->input->post('posisi');
					$data['tanggal_masuk_sopir'] = $this->input->post('tanggal_masuk_sopir');
				
					$result = $this->m_sopir->add_sopir($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('sopir'));
					}
	}


	


		public function update_sopir()
	{
		$id = $this->input->post('id_sopir'); 
			

			$config['upload_path'] = './assets/image/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['encrypt_name'] = TRUE;
					$config['max_size']    = 0;
					$this->upload->initialize($config);
					$data = array();

					if(!empty($_FILES['foto_sopir']['name']))
					{
						if($this->upload->do_upload('foto_sopir')) {   
					        $dataInfo = $this->upload->data();
					        $data['foto_sopir'] = $dataInfo['file_name'];
					    }
					    else{
					    	$this->session->set_flashdata('foto_sopir_salah', 'Record is Added Successfully!');
							redirect(base_url('sopir'));
					    }
					}

					if(!empty($_FILES['foto_ktp']['name']))
					{
						if($this->upload->do_upload('foto_ktp')) {   
					        $dataInfo = $this->upload->data();
					        $data['foto_ktp'] = $dataInfo['file_name'];
					    }
					    else{
					    	$this->session->set_flashdata('foto_ktp_salah', 'Record is Added Successfully!');
							redirect(base_url('sopir'));
					    }
					}

					if(!empty($_FILES['foto_sim']['name']))
					{
						if($this->upload->do_upload('foto_sim')) {   
					        $dataInfo = $this->upload->data();
					        $data['foto_sim'] = $dataInfo['file_name'];
					    }
					    else{
					    	$this->session->set_flashdata('foto_sim_salah', 'Record is Added Successfully!');
							redirect(base_url('sopir'));
					    }
					}

				   
					
				    $data['id_armada'] = $this->input->post('id_armada');
				    $data['id_vendor'] = $this->input->post('id_vendor');
				    $data['nik'] = $this->input->post('nik');
				    $data['nama_sopir'] = $this->input->post('nama_sopir');
				    $data['tempat_lahir'] = $this->input->post('tempat_lahir');
				    $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
				    $data['alamat'] = $this->input->post('alamat');
				    $data['no_hp'] = $this->input->post('no_hp');
				    $data['jenis_sim'] = $this->input->post('jenis_sim');
				    $data['posisi'] = $this->input->post('posisi');
					$data['tanggal_masuk_sopir'] = $this->input->post('tanggal_masuk_sopir');
					
				
					$result = $this->m_sopir->edit_sopir($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('sopir'));
					}
	}

	function hapus_sopir(){
		$kode=$this->input->post('kode');
		$this->m_sopir->hapus_sopir($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('sopir');
	}
}