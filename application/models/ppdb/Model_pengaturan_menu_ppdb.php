 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengaturan_menu_ppdb extends CI_Model {

	public function get()
	{
		return $this->db->get('pengaturan_menu_ppdb')->result(); 
	}

	public function insert($data) {
		$this->db->insert('pengaturan_menu_ppdb', $data);
	}

	public function select($id)
	{
		$this->db->where('id_pengaturan_menu_ppdb', $id);
		return $this->db->get('pengaturan_menu_ppdb')->row(); 
	}

	public function update($data, $id) {
		$this->db->where('id_pengaturan_menu_ppdb', $id);
		$this->db->update('pengaturan_menu_ppdb', $data);
	}	

	public function delete($id) {
		$this->db->where('id_pengaturan_menu_ppdb', $id);
		$this->db->delete('pengaturan_menu_ppdb');
	}	
}
