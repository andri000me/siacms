<?php

class Mod_keterlambatan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }

    public function insert($data)
    {
        $query = $this->db->insert('keterlambatan', $data);
        return $query;
    }

    public function edit($data)
    {
        // var_dump($data);
        // echo "<br/>";
        $this->db->where("id_keterlambatan", $data["id_keterlambatan"]);
        return $this->db->update("keterlambatan", $data);
    }

    public function delete($id)
    {
        $this->db->where('id_keterlambatan', $id);
        $query = $this->db->delete('keterlambatan');
        return $query;
    }
    public function select($id)
    {
        $this->db->join('siswa', 'siswa.nisn=keterlambatan.nisn', 'left');
        $this->db->join('siswa_kelas_reguler_berjalan AS sk', 'siswa.nisn=sk.nisn');
        $this->db->join('kelas_reguler_berjalan AS kr', 'sk.id_kelas_reguler_berjalan=kr.id_kelas_reguler_berjalan');
        $this->db->join('kelas_reguler AS k', 'k.id_kelas_reguler=kr.id_kelas_reguler');
        $this->db->where('id_keterlambatan', $id);
        $query = $this->db->get('keterlambatan');
        return $query->row();
    }

    public function getjumlah($tglmulai, $tglselesai)
    {
        // return $this->db->query("SELECT COUNT(nisn) AS orang, jml FROM (SELECT nisn, COUNT(id_keterlambatan) AS jml FROM `keterlambatan` GROUP BY nisn) T GROUP BY jml ORDER BY jml")->result();
        return $this->db->query("SELECT COUNT(nisn) AS orang, jml FROM (SELECT nisn, COUNT(id_keterlambatan) AS jml FROM `keterlambatan` WHERE tgl_terlambat >= '$tglmulai' AND tgl_terlambat <= '$tglselesai' GROUP BY nisn) T GROUP BY jml ORDER BY jml")->result();
    }

    public function getdatabyjumlah($tglmulai, $tglselesai, $jumlah)
    {
        // return $this->db->query("SELECT COUNT(nisn) AS orang, jml FROM (SELECT nisn, COUNT(id_keterlambatan) AS jml FROM `keterlambatan` GROUP BY nisn) T GROUP BY jml ORDER BY jml")->result();
        return $this->db->query("SELECT keterlambatan.*, siswa.nama FROM `keterlambatan` LEFT JOIN siswa ON keterlambatan.nisn = siswa.nisn WHERE tgl_terlambat >= '$tglmulai' AND tgl_terlambat <= '$tglselesai' AND keterlambatan.nisn IN (SELECT nisn FROM (SELECT nisn, COUNT(id_keterlambatan) AS jml FROM `keterlambatan` WHERE tgl_terlambat >= '$tglmulai' AND tgl_terlambat <= '$tglselesai' GROUP BY nisn) T WHERE jml = '$jumlah') ORDER BY nisn")->result();
    }

    public function getjumlahbulan($bulan, $tahun)
    {
        return $this->db->query("SELECT COUNT(id_keterlambatan) AS jml FROM `keterlambatan` WHERE MONTH(tgl_terlambat) = '$bulan' AND YEAR(tgl_terlambat) = '$tahun'")->row();
    }

    public function getjumlahtahun()
    {
        return $this->db->query("SELECT YEAR(tgl_terlambat) AS tahun, COUNT(id_keterlambatan) AS jml FROM `keterlambatan` GROUP BY YEAR(tgl_terlambat)")->result();
    }

    //kodingan baru
    public function get_all()
    {
        return $this->db->query("SELECT K.*, COUNT(K.nisn) AS total_terlambat,(SELECT nama FROM siswa_kelas S WHERE S.nisn=K.nisn) as nama FROM keterlambatan K GROUP BY K.nisn")->result_array();
    }

    //kodingan baru
    public function get_detail($id)
    {

        return $this->db->query("SELECT K.* FROM keterlambatan K WHERE K.nisn = " . $id)
            ->result_array();
    }

    public function get_laporan()
    {
        return $this->db->get('keterlambatan')->result();
    }

    public function get_siswa($id)
    {
        $result = $this->db->query("SELECT siswa_kelas.*, tahunajaran.tahun_ajaran, tahunajaran.semester, kelas_reguler.*
        FROM siswa_kelas, tahunajaran, siswa_kelas_reguler_berjalan, kelas_reguler_berjalan, kelas_reguler
        WHERE siswa_kelas.nisn = " . $id . "
        AND siswa_kelas_reguler_berjalan.nisn = siswa_kelas.nisn
        AND siswa_kelas_reguler_berjalan.id_kelas_reguler_berjalan = kelas_reguler_berjalan.id_kelas_reguler_berjalan
        AND kelas_reguler_berjalan.id_kelas_reguler = kelas_reguler.id_kelas_reguler
        ")
            ->result_array();
        if (empty($result)) {
            return [];
        }

        return $result[0];
    }
}
