<?php

class Mod_pengaturan_pelanggaran extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            // Your own constructor code
    }

    function update($data=[])
    {
        $masak = [];
        $skema = $this->db->list_fields('pengaturan_pelanggaran');
        foreach ($skema as $key) {
            $masak[$key] = "off";
        }
        foreach ($data as $key => $value) {
            $masak[$key] = $value;
        }
        $this->db->truncate("pengaturan_pelanggaran");
        $this->db->insert("pengaturan_pelanggaran", $masak);
    }

    function get_check(){
        if($this->db->get('pengaturan_pelanggaran')->num_rows() > 0){
            return $this->db->get('pengaturan_pelanggaran')->result_array()[0];
        }else{
            $skema = $this->db->list_fields('pengaturan_pelanggaran');
            foreach ($skema as $key) {
                $masak[$key] = "off";
            }
            $this->db->insert("pengaturan_pelanggaran", $masak);
            return $this->db->get('pengaturan_pelanggaran')->result_array()[0];
        }
    }
}