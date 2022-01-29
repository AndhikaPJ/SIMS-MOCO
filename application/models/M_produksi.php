<?php
class M_produksi extends CI_Model{

	function get_all_produksi(){
		$hsl=$this->db->query("SELECT * FROM produksi,armada,vendor,sopir where sopir.id_armada=armada.id_armada AND sopir.id_vendor=vendor.id_vendor AND produksi.id_sopir=sopir.id_sopir");
		return $hsl;
	}


	function hapus_produksi($kode){
		$hsl=$this->db->query("DELETE FROM produksi where id_produksi='$kode'");
		return $hsl;
	}

	public function add_produksi($data){
			$this->db->insert('produksi', $data);
			return true;
		}

		public function get_produksi_by_id($id){
			$query = $this->db->get_where('produksi', array('id_produksi' => $id));
			return $result = $query->row_array();
		}

		public function edit_produksi($data, $id){
			$this->db->where('id_produksi', $id);
			$this->db->update('produksi', $data);
			return true;
		}

}	