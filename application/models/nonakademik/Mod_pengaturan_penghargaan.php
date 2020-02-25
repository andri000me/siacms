<?php

class Mod_pengaturan_penghargaan extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            // Your own constructor code
    }

    function update($data=[])
    {
        $masak = [];
        $skema = $this->db->list_fields('pengaturan_penghargaan');
        foreach ($skema as $key) {
            $masak[$key] = "off";
        }
        foreach ($data as $key => $value) {
            $masak[$key] = $value;
        }
        $this->db->truncate("pengaturan_penghargaan");
        $this->db->insert("pengaturan_penghargaan", $masak);
    }

    function get_check(){
        if($this->db->get('pengaturan_penghargaan')->num_rows() > 0){
            return $this->db->get('pengaturan_penghargaan')->result_array()[0];
        }else{
            $skema = $this->db->list_fields('pengaturan_penghargaan');
            foreach ($skema as $key) {
                $masak[$key] = "off";
            }
            $this->db->insert("pengaturan_penghargaan", $masak);
            return $this->db->get('pengaturan_penghargaan')->result_array()[0];
        }
    }
}