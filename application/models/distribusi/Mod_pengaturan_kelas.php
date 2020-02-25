 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pengaturan_kelas extends CI_Model {

	public function get()
	{
		return $this->db->get('tabel_pengaturan_kelas_reg')->result(); 
	}

	public function insert($data) {
		$this->db->insert('tabel_pengaturan_kelas_reg', $data);
	}

	public function select($id)
	{
		$this->db->where('id_pengaturan_kelas_reg', $id);
		return $this->db->get('tabel_pengaturan_kelas_reg')->row(); 
	}

	public function update($data, $id) {
		$this->db->where('id_pengaturan_kelas_reg', $id);
		$this->db->update('tabel_pengaturan_kelas_reg', $data);
	}	

	public function delete($id) {
		$this->db->where('id_pengaturan_kelas_reg', $id);
		$this->db->delete('tabel_pengaturan_kelas_reg');
	}	
}
