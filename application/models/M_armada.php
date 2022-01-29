<?php
class M_armada extends CI_Model{

	function get_all_armada(){
		$hsl=$this->db->query("SELECT * FROM armada");
		return $hsl;
	}


	function hapus_armada($kode){
		$hsl=$this->db->query("DELETE FROM armada where id_armada='$kode'");
		return $hsl;
	}

	public function add_armada($data){
			$this->db->insert('armada', $data);
			return true;
		}

		public function get_armada_by_id($id){
			$query = $this->db->get_where('armada', array('id_armada' => $id));
			return $result = $query->row_array();
		}

		public function edit_armada($data, $id){
			$this->db->where('id_armada', $id);
			$this->db->update('armada', $data);
			return true;
		}

}	