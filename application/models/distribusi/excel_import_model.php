<?php
class Excel_import_model extends CI_Model
{
 function select()
 {
  $this->db->order_by('nisn', 'DESC');
  $query = $this->db->get('kelas_tambahan_baru');
  return $query;
 }

 function insert($data)
 {
  $this->db->insert_batch('kelas_tambahan_baru', $data);
 }
}