<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_acara_produksi extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$x['sidebar']="berita_acara_produksi";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('berita_acara_produksi/berita_acara_produksi');
		$this->load->view('footer');
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['data_berita_acara_produksi'] = $this->db->query("SELECT *, SUM(produksi.berat_bersih) as bb FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND date(tanggal_masuk) BETWEEN '$tgl1' AND '$tgl2' AND produksi.lokasi='Sei Putting KPP-BGM' ")->row_array();
		$data['data_berita_acara_produksi2'] = $this->db->query("SELECT *, SUM(produksi.berat_bersih) as bb FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND date(tanggal_masuk) BETWEEN '$tgl1' AND '$tgl2' AND produksi.lokasi='Sei Putting H3254' ")->row_array();
		$data['data_berita_acara_produksi3'] = $this->db->query("SELECT *, SUM(produksi.berat_bersih) as bb FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir AND date(tanggal_masuk) BETWEEN '$tgl1' AND '$tgl2' AND produksi.lokasi='TCT' ")->row_array();
		$this->load->view('berita_acara_produksi/cetak_filter',$data);
	}

	
}