<?php
class M_sopir extends CI_Model{

	function get_all_sopir(){
		if ($this->session->userdata('level')=="vendor") {
			$id_vendor=$this->session->userdata('id_pengguna2');
			$hsl=$this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND sopir.id_vendor='$id_vendor'");
		}else{
			$hsl=$this->db->query("SELECT * FROM sopir,armada,vendor where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor");
		}
		return $hsl;
	}


	function hapus_sopir($kode){
		$hsl=$this->db->query("DELETE FROM sopir where id_sopir='$kode'");
		return $hsl;
	}

	public function add_sopir($data){
			$this->db->insert('sopir', $data);
			return true;
		}

		public function get_sopir_by_id($id){
			$query = $this->db->get_where('sopir', array('id_sopir' => $id));
			return $result = $query->row_array();
		}

		public function edit_sopir($data, $id){
			$this->db->where('id_sopir', $id);
			$this->db->update('sopir', $data);
			return true;
		}

}	