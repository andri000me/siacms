<?php

class Mod_pengaturan_perizinan extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            // Your own constructor code
    }

    function update($data=[])
    {
        $masak = [];
        $skema = $this->db->list_fields('pengaturan_perizinan');
        foreach ($skema as $key) {
            $masak[$key] = "off";
        }
        foreach ($data as $key => $value) {
            $masak[$key] = $value;
        }
        $this->db->truncate("pengaturan_perizinan");
        $this->db->insert("pengaturan_perizinan", $masak);
    }

    function get_check(){
        if($this->db->get('pengaturan_perizinan')->num_rows() > 0){
            return $this->db->get('pengaturan_perizinan')->result_array()[0];
        }else{
            $skema = $this->db->list_fields('pengaturan_perizinan');
            foreach ($skema as $key) {
                $masak[$key] = "off";
            }
            $this->db->insert("pengaturan_perizinan", $masak);
            return $this->db->get('pengaturan_perizinan')->result_array()[0];
        }
    }
}