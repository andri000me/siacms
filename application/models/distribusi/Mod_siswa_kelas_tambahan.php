<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_siswa_kelas_tambahan extends CI_Model {

	private $table = 'siswa_kelas_tambahan';

	public function get() {
		return $this->db->get($this->table)->result();
	}

	public function insert($data) {
		$this->db->insert('siswa_kelas_tambahan', $data);
	}

	public function delete($id) {
		$this->db->where('id_siswa_kelas_tambahan', $id);
		$this->db->delete('siswa_kelas_tambahan');
	}

	public function select($id) {
		$this->db->where('id_siswa_kelas_tambahan', $id);
		return $this->db->get('siswa_kelas_tambahan')->row();		
	}

	public function update($data, $id) {
		$this->db->where('id_siswa_kelas_tambahan', $id);
		$this->db->update('siswa_kelas_tambahan', $data);
	}

	public function get_siswa_kelas_tambahan()
	{
		return $this->db->select('s.nisn, s.nama, s.jenis_kelamin')
						->from($this->table.' tb1')
						->join('siswa s', 's.nisn=tb1.nisn')
						->join('kelas_tambahan kt', 'tb1.id_siswa_kelas_tambahan=kt.id_kelas_tambahan')
						// ->join('kelas_reguler kr', 'krb.id_kelas_reguler=kr.id_kelas_reguler')
						->get()
						->result();
	}

	// public function getjoin(){

	// 	$this->db->select('kelas_tambahan_baru.nisn, kelas_tambahan_baru.nama');
	// 	$this->db->from('kelas_tambahan_baru')
	// 	// $this->db->join('kelas_tambahan', 'kelas_tambahan.id_kelas_tambahan = siswa_kelas_tambahan.id_kelas_tambahan');
	// 	$this->db->join('siswa_kelas_tambahan', 'siswa_kelas_tambahan.id_siswa_excel = kelas_tambahan_baru.id_siswa_excel');
	// 	$query = $this->db->get()->result();

	// 	return $query
	// }
	
}


