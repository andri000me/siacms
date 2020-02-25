<?php

class Mod_pelanggaran extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }

    public function insert($data)
    {
        $query = $this->db->insert('pelanggaran_v2', $data);
        return $query;
    }

    public function get($search = "")
    {
        $this->db->join('siswa', 'pelanggaran_v2.nisn = siswa.nisn', 'left');
        $this->db->join('pelanggaran_bentuk', 'pelanggaran_v2.id_bentuk = pelanggaran_bentuk.id_bentuk_pelanggaran', 'left');
        if (!empty($search)) {
            $this->db->where("siswa.nisn", $search)->or_where('siswa.nama', $search);
        }
        return $this->db->get('pelanggaran_v2')->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('pelanggaran_v2');
        return $query;
    }

    public function edit($id, $nisn, $nama, $jenis_kelamin, $kelas, $tanggal, $kategori_pelanggaran, $bentuk_pelanggaran, $poin_pelanggaran, $pasal, $jenis_sanksi, $bentuk_sanksi, $guru_piket)
    {
        $hasil = $this->db->query("UPDATE pelanggaran_v2 SET nama='$nama',nisn='$nisn',kelas='$kelas',jenis_kelamin='$jenis_kelamin',tanggal='$tanggal',kategori_pelanggaran='$kategori_pelanggaran',bentuk_pelanggaran='$bentuk_pelanggaran',poin_pelanggaran='$poin_pelanggaran',pasal='$pasal',jenis_sanksi='$jenis_sanksi',bentuk_sanksi='$bentuk_sanksi',guru_piket='$guru_piket' WHERE id ='$id'");
        return $hsl;
    }

    public function editpelanggaran($data)
    {
        // var_dump($data);
        // echo "<br/>";
        $this->db->where("id", $data["id"]);
        return $this->db->update("pelanggaran_v2", $data);
    }

    //kodingan baru
    public function getall()
    {
        return $this->db->query("SELECT * FROM `pelanggaran_v2`")->result_array();
    }

}
