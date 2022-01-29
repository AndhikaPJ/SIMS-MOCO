<?php
class M_arsip_dokumen extends CI_Model{

	function get_all_arsip_dokumen(){
		if ($this->session->userdata('level')=="vendor") {
			$id_vendor=$this->session->userdata('id_pengguna2');
			$hsl=$this->db->query("SELECT * FROM arsip_dokumen,vendor where arsip_dokumen.id_vendor=vendor.id_vendor AND arsip_dokumen.id_vendor='$id_vendor'");
		}else{
			$hsl=$this->db->query("SELECT * FROM arsip_dokumen,vendor where arsip_dokumen.id_vendor=vendor.id_vendor");
		}
		return $hsl;
	}


	function hapus_arsip_dokumen($kode){
		$hsl=$this->db->query("DELETE FROM arsip_dokumen where id_arsip_dokumen='$kode'");
		return $hsl;
	}

	public function add_arsip_dokumen($data){
			$this->db->insert('arsip_dokumen', $data);
			return true;
		}

		public function get_arsip_dokumen_by_id($id){
			$query = $this->db->get_where('arsip_dokumen', array('id_arsip_dokumen' => $id));
			return $result = $query->row_array();
		}

		public function edit_arsip_dokumen($data, $id){
			$this->db->where('id_arsip_dokumen', $id);
			$this->db->update('arsip_dokumen', $data);
			return true;
		}

}	