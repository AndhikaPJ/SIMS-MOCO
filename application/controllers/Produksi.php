<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_produksi');
	}

	public function index()
	{
		$x['data_produksi']=$this->m_produksi->get_all_produksi();
		$x['sidebar']="produksi";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('produksi/produksi');
		$this->load->view('footer');
	}

	public function print2()
	{
		$x['data_produksi']=$this->m_produksi->get_all_produksi();
		$x['sidebar']="produksi2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('produksi/print');
		$this->load->view('footer');
	}

	public function perhari()
	{	
		$tgl1=$this->input->post('tgl1');
		$x['tgl1']=$tgl1;
		$x['data_produksi']=$this->db->query("SELECT * FROM sopir,armada,vendor,produksi where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND date(tanggal_masuk) = '$tgl1' ");
		$this->load->view('produksi/perhari',$x);
	}

	public function perminggu()
	{	
		$week=$this->input->post('week');
		$tgl1=date("Y-m-d", strtotime($week."1"));
		$tgl2=date("Y-m-d", strtotime($week."7"));
		$x['tgl1']=$tgl1;
		$x['tgl2']=$tgl2;
		$x['data_produksi']=$this->db->query("SELECT * FROM sopir,armada,vendor,produksi where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND date(tanggal_masuk) BETWEEN '$tgl1' AND '$tgl2' ");
		$this->load->view('produksi/perminggu',$x);
	}

	public function perbulan()
	{	
		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');
		$x['bulan']=$bulan;
		$x['tahun']=$tahun;
		if ($this->input->post('bulan')=="Januari") {
			$bln=1;
		}elseif ($this->input->post('bulan')=="Februari") {
			$bln=2;
		}elseif ($this->input->post('bulan')=="Maret") {
			$bln=3;
		}elseif ($this->input->post('bulan')=="April") {
			$bln=4;
		}elseif ($this->input->post('bulan')=="Mei") {
			$bln=5;
		}elseif ($this->input->post('bulan')=="Juni") {
			$bln=6;
		}elseif ($this->input->post('bulan')=="Juli") {
			$bln=7;
		}elseif ($this->input->post('bulan')=="Agustus") {
			$bln=8;
		}elseif ($this->input->post('bulan')=="September") {
			$bln=9;
		}elseif ($this->input->post('bulan')=="Oktober") {
			$bln=10;
		}elseif ($this->input->post('bulan')=="November") {
			$bln=11;
		}elseif ($this->input->post('bulan')=="Desember") {
			$bln=12;
		}
		$x['data_produksi']=$this->db->query("SELECT * FROM sopir,armada,vendor,produksi where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND MONTH(tanggal_masuk) = '$bln' AND YEAR(tanggal_masuk) = '$tahun'");
		$this->load->view('produksi/perbulan',$x);
	}

	public function cetak()
	{	
		$x['data_produksi']=$this->m_produksi->get_all_produksi();
		$this->load->view('produksi/cetak',$x);
	}

	public function cetak2($id)
	{	
		$x['data_produksi']=$this->db->query("SELECT * FROM produksi,armada,vendor where produksi.id_armada=armada.id_armada AND produksi.id_vendor=vendor.id_vendor AND produksi.id_produksi='$id'")->row_array();
		$this->load->view('produksi/cetak2',$x);
	}

		public function simpan_produksi()
	{			
					$id_sopir=$this->input->post('id_sopir');
					$data_sopir=$this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND sopir.id_sopir='$id_sopir'")->row_array();
					$berat_bersih=$this->input->post('berat_kotor')-$data_sopir['berat_kosongan'];


				    $data['no_tiket'] = $this->input->post('no_tiket');
				    $data['jenis_pengangkutan'] = $this->input->post('jenis_pengangkutan');
				    $data['shift'] = $this->input->post('shift');
				    $data['id_sopir'] = $this->input->post('id_sopir');
				    $data['tanggal_masuk'] = $this->input->post('tanggal_masuk');
				    $data['jam_masuk'] = $this->input->post('jam_masuk');
				    $data['tanggal_keluar'] = $this->input->post('tanggal_keluar');
				    $data['jam_keluar'] = $this->input->post('jam_keluar');
				    $data['berat_kotor'] = $this->input->post('berat_kotor');
				    $data['berat_bersih'] = $berat_bersih;
				    $data['lokasi'] = $this->input->post('lokasi');
				    $data['jam_validasi'] = $this->input->post('jam_validasi');
				
					$result = $this->m_produksi->add_produksi($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('produksi'));
					}
	}


	


		public function update_produksi()
	{
		$id = $this->input->post('id_produksi'); 
			

					$id_sopir=$this->input->post('id_sopir');
					$data_sopir=$this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND sopir.id_sopir='$id_sopir'")->row_array();
					$berat_bersih=$this->input->post('berat_kotor')-$data_sopir['berat_kosongan'];


				    $data['no_tiket'] = $this->input->post('no_tiket');
				    $data['jenis_pengangkutan'] = $this->input->post('jenis_pengangkutan');
				    $data['shift'] = $this->input->post('shift');
				    $data['id_sopir'] = $this->input->post('id_sopir');
				    $data['tanggal_masuk'] = $this->input->post('tanggal_masuk');
				    $data['jam_masuk'] = $this->input->post('jam_masuk');
				    $data['tanggal_keluar'] = $this->input->post('tanggal_keluar');
				    $data['jam_keluar'] = $this->input->post('jam_keluar');
				    $data['berat_kotor'] = $this->input->post('berat_kotor');
				    $data['berat_bersih'] = $berat_bersih;
				    $data['lokasi'] = $this->input->post('lokasi');
				    $data['jam_validasi'] = $this->input->post('jam_validasi');
					
				
					$result = $this->m_produksi->edit_produksi($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('produksi'));
					}
	}

	function hapus_produksi(){
		$kode=$this->input->post('kode');
		$this->m_produksi->hapus_produksi($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('produksi');
	}
}