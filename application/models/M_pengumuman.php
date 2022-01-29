<?php
class M_pengumuman extends CI_Model{

	function get_all_pengumuman(){
		$hsl=$this->db->query("SELECT * FROM pengumuman");
		return $hsl;
	}


	function hapus_pengumuman($kode){
		$hsl=$this->db->query("DELETE FROM pengumuman where id_pengumuman='$kode'");
		return $hsl;
	}

	public function add_pengumuman($data){
			$this->db->insert('pengumuman', $data);
			return true;
		}

		public function get_pengumuman_by_id($id){
			$query = $this->db->get_where('pengumuman', array('id_pengumuman' => $id));
			return $result = $query->row_array();
		}

		public function edit_pengumuman($data, $id){
			$this->db->where('id_pengumuman', $id);
			$this->db->update('pengumuman', $data);
			return true;
		}

}	