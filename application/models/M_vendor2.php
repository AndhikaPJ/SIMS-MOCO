<?php
class M_vendor2 extends CI_Model{

	function get_all_vendor2(){
		$hsl=$this->db->query("SELECT * FROM vendor");
		return $hsl;
	}


	function hapus_vendor2($kode){
		$hsl=$this->db->query("DELETE FROM vendor where id_vendor='$kode'");
		return $hsl;
	}

	public function add_vendor2($data){
			$this->db->insert('vendor', $data);
			return true;
		}

		public function get_vendor2_by_id($id){
			$query = $this->db->get_where('vendor', array('id_vendor' => $id));
			return $result = $query->row_array();
		}

		public function edit_vendor2($data, $id){
			$this->db->where('id_vendor', $id);
			$this->db->update('vendor', $data);
			return true;
		}

}	