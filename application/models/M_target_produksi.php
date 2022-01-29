<?php
class M_target_produksi extends CI_Model{

	function get_all_target_produksi(){
		$hsl=$this->db->query("SELECT * FROM target_produksi,vendor where target_produksi.id_vendor=vendor.id_vendor");
		return $hsl;
	}


	function hapus_target_produksi($kode){
		$hsl=$this->db->query("DELETE FROM target_produksi where id_target_produksi='$kode'");
		return $hsl;
	}

	public function add_target_produksi($data){
			$this->db->insert('target_produksi', $data);
			return true;
		}

		public function get_target_produksi_by_id($id){
			$query = $this->db->get_where('target_produksi', array('id_target_produksi' => $id));
			return $result = $query->row_array();
		}

		public function edit_target_produksi($data, $id){
			$this->db->where('id_target_produksi', $id);
			$this->db->update('target_produksi', $data);
			return true;
		}

}	