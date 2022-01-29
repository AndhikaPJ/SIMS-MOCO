<?php
class M_pengajuan_simper extends CI_Model{

	function get_all_pengajuan_simper(){
		if ($this->session->userdata('level')=="vendor") {
			$id_vendor=$this->session->userdata('id_pengguna2');
			$hsl=$this->db->query("SELECT * FROM pengajuan_simper,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND pengajuan_simper.id_sopir=sopir.id_sopir AND sopir.id_vendor='$id_vendor'");
		}else{
			$hsl=$this->db->query("SELECT * FROM pengajuan_simper,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND pengajuan_simper.id_sopir=sopir.id_sopir");
		}
		
		return $hsl;
	}


	function hapus_pengajuan_simper($kode){
		$hsl=$this->db->query("DELETE FROM pengajuan_simper where id_pengajuan_simper='$kode'");
		return $hsl;
	}

	public function add_pengajuan_simper($data){
			$this->db->insert('pengajuan_simper', $data);
			return true;
		}

		public function get_pengajuan_simper_by_id($id){
			$query = $this->db->get_where('pengajuan_simper', array('id_pengajuan_simper' => $id));
			return $result = $query->row_array();
		}

		public function edit_pengajuan_simper($data, $id){
			$this->db->where('id_pengajuan_simper', $id);
			$this->db->update('pengajuan_simper', $data);
			return true;
		}

}	