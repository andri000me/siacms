<?php

class Mod_pengaturan extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            // Your own constructor code
    }

    function update($data)
    {
        $masak = [];
        $skema = $this->db->list_fields('pengaturan');
        foreach ($skema as $key) {
            $masak[$key] = "off";
        }
        foreach ($data as $key => $value) {
            $masak[$key] = $value;
        }
        $this->db->truncate("pengaturan");
        $this->db->insert("pengaturan", $masak);
    }

    function get_check(){
        return $this->db->get('pengaturan')->result_array()[0];
    }
}