<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armada extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_armada');
	}

	public function index()
	{
		$x['data_armada']=$this->m_armada->get_all_armada();
		$x['sidebar']="armada";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('armada/armada');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_armada']=$this->m_armada->get_all_armada();
		$this->load->view('armada/cetak',$x);
	}

		public function simpan_armada()
	{

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_armada']['name']))
				{
				if($this->upload->do_upload('foto_armada'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data = array(
								'nomor_unit' => $this->input->post('nomor_unit'),
								'nama_armada' => $this->input->post('nama_armada'),
								'jenis_pengangkutan' => $this->input->post('jenis_pengangkutan'),
								'tanggal_komisioning' => $this->input->post('tanggal_komisioning'),
								'no_plat' => $this->input->post('no_plat'),
								'no_rangka_mesin' => $this->input->post('no_rangka_mesin'),
								'berat_kosongan' => $this->input->post('berat_kosongan'),
								'foto_armada' => $dok,
							);

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('armada');
					}
				}
				else{
						$data = array(
								'nomor_unit' => $this->input->post('nomor_unit'),
								'nama_armada' => $this->input->post('nama_armada'),
								'jenis_pengangkutan' => $this->input->post('jenis_pengangkutan'),
								'tanggal_komisioning' => $this->input->post('tanggal_komisioning'),
								'no_plat' => $this->input->post('no_plat'),
								'no_rangka_mesin' => $this->input->post('no_rangka_mesin'),
								'berat_kosongan' => $this->input->post('berat_kosongan'),
							);
					
				}

				
					$result = $this->m_armada->add_armada($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('armada'));
					}
	}


	


		public function update_armada()
	{
		$id = $this->input->post('id_armada'); 
			

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_armada']['name']))
				{
				if($this->upload->do_upload('foto_armada'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data = array(
								'nomor_unit' => $this->input->post('nomor_unit'),
								'nama_armada' => $this->input->post('nama_armada'),
								'jenis_pengangkutan' => $this->input->post('jenis_pengangkutan'),
								'tanggal_komisioning' => $this->input->post('tanggal_komisioning'),
								'no_plat' => $this->input->post('no_plat'),
								'no_rangka_mesin' => $this->input->post('no_rangka_mesin'),
								'berat_kosongan' => $this->input->post('berat_kosongan'),
								'foto_armada' => $dok,
							);

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('armada');
					}
				}
				else{
						$data = array(
								'nomor_unit' => $this->input->post('nomor_unit'),
								'nama_armada' => $this->input->post('nama_armada'),
								'jenis_pengangkutan' => $this->input->post('jenis_pengangkutan'),
								'tanggal_komisioning' => $this->input->post('tanggal_komisioning'),
								'no_plat' => $this->input->post('no_plat'),
								'no_rangka_mesin' => $this->input->post('no_rangka_mesin'),
								'berat_kosongan' => $this->input->post('berat_kosongan'),
							);
					
				}
					
				
					$result = $this->m_armada->edit_armada($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('armada'));
					}
	}

	function hapus_armada(){
		$kode=$this->input->post('kode');
		$this->m_armada->hapus_armada($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('armada');
	}
}