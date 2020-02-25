<?php

class Mod_prestasi extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            // Your own constructor code
    }

    function insert($data)
    {
        return $this->db->insert('prestasi_v2', $data);
    }

    function get()
    {
        $this->db->select('*, prestasi_v2.foto AS fotoprestasi');
        $this->db->join('siswa', 'prestasi_v2.nisn = siswa.nisn', 'left');
        return $this->db->get('prestasi_v2')->result();
        // var_dump($this->db->get('prestasi_v2')->result());
        // die();
    }

    function edit($data)
    {
        $this->db->where("id_prestasi", $data["id_prestasi"]);
        return $this->db->update("prestasi_v2",$data);
    }
    function delete($id)
    {
        $id = array("id_prestasi" => $id);
        return $this->db->delete('prestasi_v2', $id);
    }
}