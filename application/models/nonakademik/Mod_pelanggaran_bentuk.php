<?php

class Mod_pelanggaran_bentuk extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }

    public function insert($data)
    {
        $query = $this->db->insert('pelanggaran_bentuk', $data);
        return $query;
    }

    public function get($id = "")
    {
        if (!empty($id)) {
            $this->db->where("id_bentuk_pelanggaran", $id);
        }
        return $this->db->get('pelanggaran_bentuk')->result();
    }

    public function delete($id)
    {
        $this->db->where('id_bentuk_pelanggaran', $id);
        $query = $this->db->delete('pelanggaran_bentuk');
        return $query;
    }

    public function edit($id, $nama_pelanggaran, $poin)
    {
        $hasil = $this->db->query("UPDATE pelanggaran_bentuk SET nama_pelanggaran = '$nama_pelanggaran', poin = '$poin' WHERE id_bentuk_pelanggaran ='$id'");
        return $hsl;
    }


}
