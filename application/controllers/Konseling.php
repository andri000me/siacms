<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konseling extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('setting_helper');
        $this->setting = get_setting();

        $this->load->model('pegawai_model');
        $this->load->model('presensi_pegawai_model');
        $this->load->model('penilaian/presensi_siswa_model');
        $this->load->model('tahunajaran_model');
        $this->load->model('tanggal_libur_model');
        $this->load->model('tanggal_libur_nasional_model');
        $this->load->model('jabatan_model');
        $this->load->model('ppdb/model_pendaftar_ppdb');
        $this->load->model('ppdb/model_form_ppdb');
        $this->load->model('ppdb/model_ketentuan_ppdb');
        $this->load->model('ppdb/model_form_ujian');
        $this->load->model('ppdb/model_pengumuman_ppdb');
        $this->load->model('ppdb/model_tahunajaran');
        $this->load->model('ppdb/Model_siswa');
        $this->load->model('pegawai_model');
        if ($this->session->userdata('isLogin') != true) {
            $this->session->set_flashdata("warning", '<script> swal( "Maaf Anda Belum Login!" ,  "Silahkan Login Terlebih Dahulu" ,  "error" )</script>');
            redirect('login');
            exit;
        }

        if (($this->session->userdata('jabatan') === 'Konseling') || ($this->session->userdata('jabatan') === 'Wali Kelas')
            || ($this->session->userdata('jabatan') === 'Guru Piket') || ($this->session->userdata('jabatan') === 'Siswa')) {
        } else {
            $this->session->set_flashdata("warning", '<script> swal( "Anda Tidak Berhak!" ,  "Silahkan Login dengan Akun Anda" ,  "error" )</script>');
            redirect('login');
            exit;
        }

    }
    public function index()
    {
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->template->load('konseling/dashboard', 'konseling/home', $data);
    }

    public function profile()
    {
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $data['datpeg'] = $this->pegawai_model->rowPegawai($this->session->userdata('NIP'));
        $this->template->load('konseling/dashboard', 'konseling/profile', $data);
    }

    public function editprofil()
    {
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $data['rowpeg'] = $this->pegawai_model->rowPegawai($this->session->userdata('NIP'));
        $this->template->load('konseling/dashboard', 'konseling/editprofil', $data);
        if ($this->input->post('submit')) {
            $this->load->model('pegawai_model');
            $this->pegawai_model->updatedatpeg();
            $this->session->set_flashdata('warning', '<script>swal("Berhasil!", "Data Berhasil Disimpan", "success")</script>');
            redirect('konseling/editprofil');
        }
    }

    public function gantipassword()
    {
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->template->load('konseling/dashboard', 'konseling/gantipassword', $data);
    }

    public function updatepassword()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $passwordbaru = $this->input->post('passwordbaru', true);
        $confirmpassword = $this->input->post('confirmpassword', true);
        if ($passwordbaru == $confirmpassword) {
            $cek = $this->login_model->proseslogin($username, $password);
            $hasil = count($cek);
            if ($hasil > 0) {
                // $this->login_model->cekPegawai($cek);

                $this->load->model('akun_model');
                $this->akun_model->update(array("password" => $passwordbaru), $cek->id_akun);

                // redirect($result->url.'/');
                redirect('konseling/gantipassword');
            } else {
                // $this->session->set_flashdata("warning","<b>Kombinasi Username dan Password Anda tidak ditemukan, Pastikan Anda memasukkan Username dan Password yang benar</b>");

                $this->session->set_flashdata("warning", '<script> swal( "Oops" ,  "Password Lama Salah !" ,  "error" )</script>');
                redirect('konseling/gantipassword');
            }
        } else {
            $this->session->set_flashdata("warning", '<script> swal( "Oops" ,  "password Baru Harus Ganti !" ,  "error" )</script>');

            redirect('konseling/gantipassword');
        }

    }
    // Non AKADEMIK NOVEN
    public function pendaftaran($action = null)
    {
        $this->load->model('nonakademik/Mod_ekskul', 'me');
        if ($action == null) {
            $data["data_ekskul"] = $this->me->data_ekskul();
            $data["jdwal_ekskul"] = $this->me->jdwal_ekskul("jadwal1");

            $data["statistik_ekskul"] = $this->me->statistik_ekskul("2016 - 2017", "Genap");
            // echo $this->db->last_query();
            $data['nama'] = $this->session->Nama;
            $data['foto'] = $this->session->foto;
            $data['username'] = $this->session->username;

            $this->template->load('konseling/dashboard', 'konseling/nonakademik/pendaftaran', $data);

            // redirect('nonakademik/pendaftaran');
        } else if ($action == "get_siswa") {
            $data_siswa = $this->me->get_siswa($_POST["nik"]);
            if (!empty($data_siswa)) {
                echo json_encode($data_siswa);
            } else {
                echo "";
            }

        } else if ($action == "simpan") {
            $dtdaftar = $this->input->post();
            $hasil = $this->me->simpan($dtdaftar);
            if ($hasil) {

                $this->session->set_flashdata('pesan', '<script>swal("Berhasil","Data Berhasil Disimpan", "success")</script>');
                redirect("nonakademik/pendaftaran");
            }
        }
    }

    public function datapeserta($id_jenis_kls_tambahan)
    {
        $this->load->model('nonakademik/mod_ekskul');
        $data["ekskul"] = $this->mod_ekskul->get_peserta2($id_jenis_kls_tambahan, $this->setting->id_tahun_ajaran);
        //echo $this->db->last_query();
        $this->load->view('nonakademik/datapeserta', $data);
    }

    public function jadwal()
    {
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->load->model('nonakademik/Mod_ekskul', 'me');
        $data["jadwal_ekskul"] = $this->me->jdwal_ekskul();
        $this->template->load('konseling/dashboard', 'konseling/nonakademik/jadwal', $data);
    }

    public function presensi($action = null)
    {
        $this->load->model('nonakademik/Mod_ekskul', 'me');

        if ($action == null) {
            $data['nama'] = $this->session->Nama;
            $data['foto'] = $this->session->foto;
            $data['username'] = $this->session->username;
            $data["jadwal_ekskul"] = $this->me->jdwal_ekskul();
            $data["data_konseling"] = $this->me->data_konseling();
            $data["tahun_presensi"] = $this->me->get_presensi_tahun();
            $data["data_ekskul"] = $this->me->data_ekskul();
            $this->template->load('konseling/dashboard', 'konseling/nonakademik/presensi', $data);

        } else if ($action == "save") {
            $dt_save["konseling"] = $_POST["pp_konseling"];
            $pp_tanggal = explode("-", $_POST["pp_tanggal"]);
            $dt_save["tanggal"] = $pp_tanggal[2] . "-" . $pp_tanggal[1] . "-" . $pp_tanggal[0];
            $dt_save["status"] = $_POST["pp_status"];
            $dt_save["jadwal_id"] = $_POST["pp_jadwal_id"];

            $this->me->simpan_presensi_konseling($dt_save);
        } else if ($action == "pp_report") {
            $tahun = $_POST["tahun"];
            $bulan = $_POST["bulan"];
            $hasil = $this->me->get_presensi_konseling_report($tahun, $bulan);

            $result = "";
            $i = 0;
            foreach ($hasil as $prensesi) {
                $i++;
                $tgl = date_create($prensesi->tgl_kegiatan);
                $result .= "<tr>
			                    <td>" . $i . ".</td>
			                    <td>" . $tgl->format("d-m-Y") . "</td>
			                    <td>" . $prensesi->nama_konseling . "</td>
			                    <td>" . $prensesi->jabatan . "</td>
			                  </tr>";
            }

            echo $result;
        } else if ($action == "siswa") {
            $thnajaran = $_POST["thnajaran"];
            $semester = $_POST["semester"];
            $idjadwal = $_POST["idjadwal"];
            $tanggal = $_POST["tanggal"];

            $pp_tanggal = explode("-", $tanggal);
            $stanggal = $pp_tanggal[2] . "-" . $pp_tanggal[1] . "-" . $pp_tanggal[0];
            //print_r($_POST);

            $arr_hasil = $this->me->get_presensi_siswa($thnajaran, $semester, $idjadwal, $stanggal);
            $result = "";
            foreach ($arr_hasil as $siswa) {
                $result .= '<tr>
                              <td>' . $siswa->nama . '</td>
                              <td>
                                <label style="margin-right: 10px;"><input type="radio" name="siswa[' . $siswa->nisn . ']" value="h" ' . ($siswa->status_kehadiran == "h" ? "checked" : "") . ' > H</label>
                                <label style="margin-right: 10px;"><input type="radio" name="siswa[' . $siswa->nisn . ']" value="i" ' . ($siswa->status_kehadiran == "i" ? "checked" : "") . '> I</label>
                                <label style="margin-right: 10px;"><input type="radio" name="siswa[' . $siswa->nisn . ']" value="s" ' . ($siswa->status_kehadiran == "s" ? "checked" : "") . '> S</label>
                                <label style="margin-right: 10px;"><input type="radio" name="siswa[' . $siswa->nisn . ']" value="a" ' . ($siswa->status_kehadiran == "a" ? "checked" : "") . '> A</label>
                              </td>
                            </tr>';
            }
            echo $result;
        } else if ($action == "siswa_save") {
            //print_r($_POST["siswa"]);
            if (!empty($_POST["siswa"])) {
                foreach ($_POST["siswa"] as $nisn => $status) {
                    $pp_tanggal = explode("-", $_POST["tanggal"]);
                    $tanggal = $pp_tanggal[2] . "-" . $pp_tanggal[1] . "-" . $pp_tanggal[0];
                    $arr_hasil = $this->me->simpan_presensi_siswa(array("nisn" => $nisn, "jadwal_id" => $_POST["pp_jadwal_id"], "tanggal" => $tanggal, "status" => $status));
                }
            }
        } else if ($action == "siswa_report") {
            $tanggal = $_POST["tanggal"];
            $tgl = explode("-", $tanggal);
            $stgl = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];
            $ekskul = $_POST["ekskul"];
            $arr_hasil = $this->me->presensi_siswa($stgl, $ekskul);

            $content = "";
            $i = 0;
            foreach ($arr_hasil as $hasil) {
                $i++;
                $content .= "<tr>
		                        <td>" . $i . "</td>
		                        <td>" . $hasil->nisn . "</td>
		                        <td>" . $hasil->nama . "</td>
		                        <td>" . strtoupper($hasil->status_kehadiran) . "</td>
		                      </tr>";
            }

            echo $content;
        } else if ($action == "siswa_report_pertemuan") {
            $dt = array();
            $dt["thn_ajaran"] = $_POST["thn_ajaran"];
            $dt["semester"] = $_POST["semester"];
            $dt["jenis_kls_tambahan"] = $_POST["ekskul"];

            if ($_POST["subaction"] == "jum_pertemuan") {
                $arr_jum_prtemuan = $this->me->report_presensi("siswa_jum_pertemuan", $dt);
                echo json_encode($arr_jum_prtemuan);
            } else if ($_POST["subaction"] == "siswa_pertemuan") {
                $arr_siswa_pertemuan = $this->me->report_presensi("siswa_pertemuan", $dt);
                echo json_encode($arr_siswa_pertemuan);
            } else if ($_POST["subaction"] == "siswa_status_presensi") {
                $dt["nisn"] = $_POST["nisn"];
                $arr_siswa_status = $this->me->report_presensi("siswa_status_presensi", $dt);
                echo json_encode($arr_siswa_status);
            }

            // print_r($arr_jum_prtemuan);

        } else if ($action == "konseling_report") {
            $subaction = isset($_POST["subaction"]) ? $_POST["subaction"] : "";
            $dt = array();
            if ($subaction == "get_tanggal") {
                $dt["tahun"] = $_POST["tahun"];
                $dt["bulan"] = $_POST["bulan"];

                $arr_hasil["tanggal"] = $this->me->report_presensi_konseling("get_tanggal", $dt);
                $arr_hasil["konseling"] = $this->me->report_presensi_konseling("get_konseling", $dt);
                echo json_encode($arr_hasil);
            }
        }

    }

    public function nilai($id_kelas_reguler = "", $idthn = "")
    {
        $this->load->model('nonakademik/mod_ekskul', 'me');
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/mod_jenis_kls_tambahan');
        $this->load->model('nonakademik/Mod_tahunajaran');
        $data['tahunajaran'] = $this->Mod_tahunajaran->get();
        //$id_tahun_ajaran = "";// klo tdk dipilih kosong

        $id_tahun_ajaran = $this->setting->id_tahun_ajaran; //$data['tahunajaran'][0]->id_tahun_ajaran; //kalo dipilih kosong
        if ($idthn != "") {$id_tahun_ajaran = $idthn;}
        $data['id_tahun_ajaran'] = $id_tahun_ajaran;

        $data['id_kelas_reguler'] = $id_kelas_reguler;
        $data['kelas_reguler'] = $this->mod_kelas_reguler->get(array('id_tahun_ajaran' => $this->setting->id_tahun_ajaran));
        $data['jenis_kls_tambahan'] = $this->mod_jenis_kls_tambahan->get();
        //echo $this->db->last_query();

        $data['siswa_kelas_reguler_berjalan'] = $this->mod_siswa_kelas_reguler_berjalan->get_siswa_kelas_reguler_berjalan2($id_kelas_reguler, $id_tahun_ajaran);
        //echo $this->db->last_query();
        $data['siswa_ekskul'] = $this->mod_siswa_kelas_reguler_berjalan->get_siswa_ekskul($id_kelas_reguler);
        // $data['record'] = $this->mod_siswa_kelas_reguler_berjalan->get_all_kelas();

        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        // $this->template->load('konseling/dashboard','nonakademik/nilai', $data);
        $this->template->load('konseling/dashboard', 'konseling/nonakademik/nilai', $data);
    }

    public function simpan_nilai($id_kelas_reguler = "")
    {
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/mod_nilaiekskul');

        $data['id_kelas_reguler'] = $id_kelas_reguler;

        $siswa_kelas_reguler_berjalan = $this->mod_siswa_kelas_reguler_berjalan->get_siswa_kelas_reguler_berjalan($id_kelas_reguler);

        foreach ($siswa_kelas_reguler_berjalan as $row) {
            $nilai = @$this->input->post("nilai_" . $row->nisn . "_" . $row->id_jenis_kls_tambahan);
            if ($nilai != "") {
                $arrdata = array(
                    "nisn" => $row->nisn,
                    "id_jenis_kls_tambahan" => $row->id_jenis_kls_tambahan,
                    "nilai_ekskul" => $nilai,
                );
                $cek = $this->mod_nilaiekskul->cek($row->nisn, $row->id_jenis_kls_tambahan);

                if ($cek) {
                    $this->mod_nilaiekskul->update($arrdata, $cek->id_nilaiekskul);
                } else {
                    $this->mod_nilaiekskul->insert($arrdata);
                }
            }
        }

        redirect('nonakademik/nilai/' . $id_kelas_reguler);
    }

    public function pembayaran()
    {
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->load->model('nonakademik/Mod_danamandiri');
        $tgl = date('Y-m-d');
        if ($this->input->post('tgl') != "") {$tgl = $this->input->post('tgl');}
        $data['danamandiri'] = $this->Mod_danamandiri->get(); //"tgl_pembayaran <= '$tgl' AND batas_akhir_pembayaran >= '$tgl'");
        //echo $this->db->last_query();
        // $this->template->load('nonakademik/dashboard','nonakademik/danamandiri', $data);
        $this->template->load('konseling/dashboard', 'konseling/nonakademik/danamandiri', $data);
    }

    public function simpanpembayaran()
    {
        $this->load->model('nonakademik/Mod_danamandiri');
        $data = array(
            'nisn' => $this->input->post('nisn'),
            'nominal' => $this->input->post('nominal'),
            'jenis_tagihan' => $this->input->post('jenis_tagihan'),
            'tgl_pembayaran' => $this->input->post('tgl_pembayaran'),
            'batas_akhir_pembayaran' => $this->input->post('batas_akhir_pembayaran'),
        );
        $this->Mod_danamandiri->insert($data);
        redirect('nonakademik/pembayaran');
    }

    public function deletepembayaran($id)
    {
        $this->load->model('nonakademik/Mod_danamandiri');
        $this->Mod_danamandiri->delete($id);
        $this->session->set_flashdata('pesan', "<script>alert('Data Berhasil Dihapus')</script>");
        redirect('nonakademik/pembayaran');
    }

//-----------------------------------------------------------------------------------------------------------------//
    //bimbingan konseling
    public function pengaturan()
    {
        if ($this->session->userdata('jabatan') === 'Siswa') {
            redirect('konseling/laporanketerlambatan');
        }
        $this->load->model('nonakademik/Mod_pengaturan');

        if (!empty($_POST)):
            $this->Mod_pengaturan->update($_POST);
            redirect('konseling/keterlambatan');
        endif;

        $data["check"] = $this->Mod_pengaturan->get_check();
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/pengaturan', $data);
    }

    public function pengaturan_pelanggaran()
    {
        if ($this->session->userdata('jabatan') === 'Siswa') {
            redirect('konseling/laporan_pelanggaran');
        }

        $this->load->model('nonakademik/Mod_pengaturan_pelanggaran');

        if (!empty($_POST)):
            $this->Mod_pengaturan_pelanggaran->update($_POST);
            redirect('konseling/pelanggaran');
        endif;

        $data["check"] = $this->Mod_pengaturan_pelanggaran->get_check();
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/pengaturan_pelanggaran', $data);
    }

    public function suratperingatan($id)
    {
        $this->load->model('nonakademik/mod_keterlambatan');
        $data["siswa"] = $this->mod_keterlambatan->get_siswa($id);
        $this->load->view('konseling/nonakademik/printsp', $data);
    }

    public function cetaksp($id)
    {
        $this->load->model('nonakademik/mod_keterlambatan');
        $data["siswa"] = $this->mod_keterlambatan->get_siswa($id);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = "surat_peringatan.pdf";
        $this->pdf->load_view('konseling/nonakademik/cetak_sp', $data);
    }

    public function cetakbk($id)
    {
        $this->load->model('nonakademik/mod_keterlambatan');
        $data["siswa"] = $this->mod_keterlambatan->get_siswa($id);

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = "surat_panggilan.pdf";
        $this->pdf->load_view('konseling/nonakademik/cetak_bk', $data);
    }
    public function dataketerlambatan($id, $jumlah)
    {
        $this->load->model('nonakademik/Mod_keterlambatan');
        $this->load->model('nonakademik/Mod_tahunajaran');
        $data['tahunajaran'] = $this->Mod_tahunajaran->get();
        //$id_tahun_ajaran = "";// klo tdk dipilih kosong
        $data['tahunajaran'][0]->id_tahun_ajaran; //kalo dipilih kosong
        $id_tahun_ajaran = "";
        if ($id != "") {$id_tahun_ajaran = $id;}
        $data['id_tahun_ajaran'] = $id_tahun_ajaran;
        $data['jumlah'] = $jumlah;
        $data['tahunajaranpilih'] = $this->Mod_tahunajaran->get("id_tahun_ajaran = '$id_tahun_ajaran'");
        $data['keterlambatan'] = $this->Mod_keterlambatan->getdatabyjumlah(@$data['tahunajaranpilih'][0]->tanggal_mulai, @$data['tahunajaranpilih'][0]->tanggal_selesai, $jumlah);
        $this->load->view('konseling/nonakademik/dataketerlambatan', $data);
    }

    public function keterlambatan($id = "")
    {
        if ($this->session->userdata('jabatan') === 'Siswa') {
            redirect('konseling/laporanketerlambatan');
        }
        $this->load->model('nonakademik/Mod_pengaturan');
        $data['check'] = $this->Mod_pengaturan->get_check();

        $this->load->model('nonakademik/Mod_keterlambatan'); //mempersiapkan model
        $this->load->model('nonakademik/Mod_tahunajaran');
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');

        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $data['tahunajaran'] = $this->Mod_tahunajaran->get(); //menjalankan method get

        $id_tahun_ajaran = $data['tahunajaran'][0]->id_tahun_ajaran; //kalo dipilih kosong
        if ($id != "") {$id_tahun_ajaran = $id;}
        $data['id_tahun_ajaran'] = $id_tahun_ajaran;
        $data['kelas_reguler'] = $this->mod_kelas_reguler->get(array('id_tahun_ajaran' => $this->setting->id_tahun_ajaran));
        $data['tahunajaranpilih'] = $this->Mod_tahunajaran->get("id_tahun_ajaran = '$id_tahun_ajaran'");
        $data['keterlambatan'] = $this->Mod_keterlambatan->getjumlah(@$data['tahunajaranpilih'][0]->tanggal_mulai, @$data['tahunajaranpilih'][0]->tanggal_selesai);

        // $this->load->view('konseling/nonakademik/keterlambatan', $data);
        $this->template->load('konseling/dashboard', 'konseling/nonakademik/keterlambatan', $data);
    }

    public function laporanketerlambatan()
    {
        $this->load->model('nonakademik/Mod_keterlambatan');

        $ter = $this->Mod_keterlambatan->get_all();
        foreach ($ter as $k => $o) {
            $det = $this->Mod_keterlambatan->get_siswa($o['nisn']);
            $ter[$k]['nama_kelas'] = isset($det['nama_kelas']) ? $det['nama_kelas'] : '-';
        }
        $data["terlambat"] = $ter;
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;

        $this->load->model('nonakademik/Mod_pengaturan');
        $data['check'] = $this->Mod_pengaturan->get_check();

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/laporan', $data);
    }

    public function detailketerlambatan($id)
    {
        $this->load->model('nonakademik/Mod_pengaturan');
        $data['check'] = $this->Mod_pengaturan->get_check();
        $this->load->model('nonakademik/Mod_keterlambatan');

        $data["terlambat"] = $this->Mod_keterlambatan->get_detail($id);
        $data["siswa"] = $this->Mod_keterlambatan->get_siswa($id);
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/detail_laporan_keterlambatan', $data);
    }

    public function laporanKODINGANLAMA($id = "")
    {
        // $dataketerlambatan = "keterlambatan" ;
        // $this->load->view('konseling/nonakademik/laporan', $data);
        $this->load->model('nonakademik/Mod_keterlambatan');
        $this->load->model('nonakademik/Mod_tahunajaran');
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['tahunajaran'] = $this->Mod_tahunajaran->get();
        $data['username'] = $this->session->username;

        //$id_tahun_ajaran = "";// klo tdk dipilih kosong
        //$data['tahunajaran'][0]->id_tahun_ajaran; //kalo dipilih kosong
        $id_tahun_ajaran = $data['tahunajaran'][0]->id_tahun_ajaran; //kalo dipilih kosong
        if ($id != "") {$id_tahun_ajaran = $id;}
        $data['id_tahun_ajaran'] = $id_tahun_ajaran;

        $data['kelas_reguler'] = $this->mod_kelas_reguler->get(array('id_tahun_ajaran' => $this->setting->id_tahun_ajaran));

        //nadine coba
        //$data['kelas_reguler'] = $this->mod_kelas_reguler->get(array('id_tahun_ajaran'=>$id_tahun_ajaran));

        $data['tahunajaranpilih'] = $this->Mod_tahunajaran->get("id_tahun_ajaran = '$id_tahun_ajaran'");
        $data['keterlambatan'] = $this->Mod_keterlambatan->getjumlah(@$data['tahunajaranpilih'][0]->tanggal_mulai, @$data['tahunajaranpilih'][0]->tanggal_selesai);
        //echo $this->db->last_query();
        // $this->template->load('nonakademik/dashboard','nonakademik/keterlambatan', $data);
        $this->template->load('konseling/dashboard', 'konseling/nonakademik/laporan', $data);
    }

    public function deleteketerlambatan($id)
    {
        $this->load->model('nonakademik/Mod_keterlambatan');

        $this->Mod_keterlambatan->delete($id);
        $this->session->set_flashdata('pesan', "<script>alert('Data Berhasil Dihapus')</script>");
        redirect('konseling/laporanketerlambatan');
    }

    public function grafikketerlambatan($jenis = "")
    {
        $this->load->model('nonakademik/Mod_keterlambatan');
        $this->load->model('nonakademik/Mod_tahunajaran');
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['tahunajaran'] = $this->Mod_tahunajaran->get();
        $data['username'] = $this->session->username;
        $this->load->model('nonakademik/Mod_keterlambatan'); //mempersiapkan model
        $data['keterlambatan'] = $this->Mod_keterlambatan->get_laporan();

        $tahun = date('Y');
        //if ($this->input->post('tahun') != "") { $tahun = $this->input->post('tahun'); }
        $categories = [];
        $jumlah = [];
        if ($jenis === "Tahunan") {
            $curr = date("Y") - 5;
            for ($i = 0; $i < 6; $i++) {
                $c = 0;
                $categories[] = $curr;
                foreach ($data['keterlambatan'] as $pl) {
                    if (strpos($pl->tgl_terlambat, '' . $curr) !== false) {
                        $c += 1;
                    }
                }
                $jumlah[] = $c;
                $curr += 1;
            }
        } else if ($jenis === "Bulanan") {
            $mn = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');

            for ($curr = 1; $curr < 13; $curr++) {
                $c = 0;
                $categories[] = $mn[$curr];
                foreach ($data['keterlambatan'] as $pl) {
                    if (date("m", strtotime($pl->tgl_terlambat)) == $curr) {
                        $c += 1;
                    }
                }
                $jumlah[] = $c;
            }
        }
        $data['jenis'] = $jenis;
        $data['jumlah'] = $jumlah;
        $data['categories'] = $categories;
        $this->template->load('konseling/dashboard', 'konseling/nonakademik/grafik_keterlambatan', $data);
    }
    public function editketerlambatan()
    {
        $this->load->model('nonakademik/Mod_keterlambatan');

        $data = array(
            'id_keterlambatan' => $this->input->post('id'),
            'tgl_terlambat' => $this->input->post('tgl_terlambat'),
            'jam' => $this->input->post('jam'),
            'alasan' => $this->input->post('alasan'),
            'kelamin' => $this->input->post('kelamin'),
            'jenis_sanksi' => $this->input->post("jenis_sanksi"),
            'bentuk_sanksi' => $this->input->post("bentuk_sanksi"),
            'wali_kelas' => $this->input->post("wali_kelas"),
            'guru_piket' => $this->input->post("guru_piket"),
        );

        $this->Mod_keterlambatan->edit($data);
        $this->session->set_flashdata('pesan', 'Berhasil Menyimpan Keteralambatan !');
        redirect('konseling/laporanketerlambatan');
    }

    public function simpanketerlambatan()
    {
        $this->load->model('nonakademik/Mod_keterlambatan');

        $data = array(
            'nisn' => $this->input->post('nisn'),
            'tgl_terlambat' => $this->input->post('tgl_terlambat'),
            'jam' => $this->input->post('jam'),
            'alasan' => $this->input->post('alasan'),
            'kelamin' => $this->input->post('kelamin'),
            'jenis_sanksi' => $this->input->post("jenis_sanksi"),
            'bentuk_sanksi' => $this->input->post("bentuk_sanksi"),
            'wali_kelas' => $this->input->post("wali_kelas"),
            'guru_piket' => $this->input->post("guru_piket"),
        );

        $this->Mod_keterlambatan->insert($data);
        $this->session->set_flashdata('pesan', 'Berhasil Menyimpan Keteralambatan !');

        redirect('konseling/keterlambatan');
    }

    public function perizinan()
    {
        if ($this->session->userdata('jabatan') === 'Siswa') {
            redirect('konseling/laporan_perizinan');
        }

        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->load->model('nonakademik/Mod_absensi_harian');
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/Mod_pengaturan_perizinan', "atur");
        $data['check'] = $this->atur->get_check();

        $data['kelas_reguler'] = $this->mod_kelas_reguler->get(array('id_tahun_ajaran' => $this->setting->id_tahun_ajaran));
        $tgl = date('Y-m-d');
        if ($this->input->post('tgl') != "") {$tgl = $this->input->post('tgl');}
        $data['absenharian'] = $this->Mod_absensi_harian->get("tgl_mulai <= '$tgl' AND tgl_selesai >= '$tgl'");
        // $this->template->load('nonakademik/dashboard','nonakademik/absensi_harian', $data);
        $this->template->load('konseling/dashboard', 'konseling/nonakademik/absensi_harian', $data);
    }

    public function laporan_perizinan()
    {
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->load->model('nonakademik/Mod_absensi_harian');
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/Mod_pengaturan_perizinan', "atur");
        $data['check'] = $this->atur->get_check();

        $data['absenharian'] = $this->Mod_absensi_harian->get();
        // $this->template->load('nonakademik/dashboard','nonakademik/absensi_harian', $data);
        $this->template->load('konseling/dashboard', 'konseling/nonakademik/laporan_perizinan', $data);
    }

    public function pengaturan_perizinan()
    {
        if ($this->session->userdata('jabatan') === 'Siswa') {
            redirect('konseling/laporan_perizinan');
        }
        $this->load->model('nonakademik/Mod_pengaturan_perizinan');

        if (!empty($_POST)):
            $this->Mod_pengaturan_perizinan->update($_POST);
            redirect('konseling/perizinan');
        endif;

        $data["check"] = $this->Mod_pengaturan_perizinan->get_check();
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/pengaturan_perizinan', $data);
    }

    public function simpanperizinan()
    {
        $this->load->model('nonakademik/Mod_absensi_harian');
        $data = array(
            'nisn' => $this->input->post('nisn'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_selesai' => $this->input->post('tgl_selesai'),
            'keterangan' => $this->input->post('keterangan'),
            'jam_ke' => $this->input->post('jam_ke'),
            'jenis_perizinan' => $this->input->post('jenis_perizinan'),
            'penanggung_jawab' => $this->input->post('penanggung_jawab'),
            'wali_kelas' => $this->input->post('wali_kelas'),
            'guru_piket' => $this->input->post('guru_piket'),
        );
        $this->Mod_absensi_harian->insert($data);
        $this->session->set_flashdata('pesan', 'Berhasil Menyimpan Perizinan !');
        redirect('konseling/perizinan');
    }

    public function edit_perizinan()
    {
        $this->load->model('nonakademik/Mod_absensi_harian');
        $data = array(
            'id_absen_harian' => $this->input->post('id_absen_harian'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_selesai' => $this->input->post('tgl_selesai'),
            'keterangan' => $this->input->post('keterangan'),
            'jam_ke' => $this->input->post('jam_ke'),
            'jenis_perizinan' => $this->input->post('jenis_perizinan'),
            'penanggung_jawab' => $this->input->post('penanggung_jawab'),
            'wali_kelas' => $this->input->post('wali_kelas'),
            'guru_piket' => $this->input->post('guru_piket'),
        );
        $this->Mod_absensi_harian->edit($data);
        redirect('konseling/laporan_perizinan');
    }

    public function deleteperizinan($id)
    {
        $this->load->model('nonakademik/Mod_absensi_harian');
        $this->Mod_absensi_harian->delete($id);
        $this->session->set_flashdata('pesan', "<script>alert('Data Berhasil Dihapus')</script>");
        redirect('konseling/laporan_perizinan');
    }

    public function izin_kelas()
    {

    }

    public function pelanggaran()
    {
        if ($this->session->userdata('jabatan') === 'Siswa') {
            redirect('konseling/laporan_pelanggaran');
        }

        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/Mod_pelanggaran');
        $data['pelanggaran'] = $this->Mod_pelanggaran->get();
        $data['kelas_reguler'] = $this->mod_kelas_reguler->getall();
        $this->load->model('nonakademik/Mod_pengaturan_pelanggaran', "atur");
        $data['check'] = $this->atur->get_check();
        $this->load->model('nonakademik/Mod_pelanggaran_bentuk');
        $data['pelanggaran_bentuk'] = $this->Mod_pelanggaran_bentuk->get();

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/pelanggaran', $data);
    }

    public function bentuk_pelanggaran()
    {
        if ($this->session->userdata('jabatan') === 'Siswa') {
            redirect('konseling/laporan_pelanggaran');
        }

        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/Mod_pelanggaran_bentuk');
        $data['bentuk'] = $this->Mod_pelanggaran_bentuk->get();

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/pelanggaran_bentuk', $data);
    }

    public function laporan_pelanggaran($kategori = "all", $semester = "all")
    {
        $kategori = urldecode($kategori);
        $data['kategori'] = $kategori;

        $this->load->model('nonakademik/Mod_pelanggaran');
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/Mod_pelanggaran');
        $allp = $this->Mod_pelanggaran->get();
        $filp = [];
        foreach ($allp as $pel) {
            $go = false;
            if ($kategori === 'all' || $pel->kategori_pelanggaran === $kategori) {
                $go = true;
            }
            if ($semester === 'all') {
                $go = $go ? true : $go;
            } elseif($go) {
                $semester = (int) $semester;
                $month = date("m", strtotime($pel->tanggal));
                if ($semester == 1 && $month >= 7 && $month <= 12) {
                    $go = true;
                } elseif ($semester === 2 && $month >= 1 && $month <= 6) {
                    $go = true;
                } else {
                    $go = false;
                }

            }
            if ($go) {
                $filp[] = $pel;
            }
        }
        $data['semester'] = $semester;
        $data['pelanggaran'] = $filp;
        $data['kelas_reguler'] = $this->mod_kelas_reguler->getall();

        $this->load->model('nonakademik/Mod_pengaturan_pelanggaran', "atur");
        $data['check'] = $this->atur->get_check();

        $this->load->model('nonakademik/Mod_pelanggaran_bentuk');
        $data['pelanggaran_bentuk'] = $this->Mod_pelanggaran_bentuk->get();

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/laporan_pelanggaran', $data);
    }

    public function grafikpelanggaran($jenis = "all", $kategori ="all", $bentuk ="all")
    {
        $kategori = urldecode($kategori);
        $data['kategori'] = $kategori;
        $data['jenis'] = $jenis;
        
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/Mod_pelanggaran');
        $this->load->model('nonakademik/Mod_pengaturan_pelanggaran', "atur");

        $allp =  $this->Mod_pelanggaran->get();
        $filp = [];
        foreach ($allp as $pel) {
            $go = false;
            if ($kategori === 'all' || $pel->kategori_pelanggaran === $kategori) {
                $go = true;
            }
            if ($bentuk === 'all') {
                $go = $go ? true : $go;
            } elseif($go) {
                $bentuk = (int) $bentuk;
                $go = $pel->id_bentuk == $bentuk ? true : false;
            }
            if ($go) {
                $filp[] = $pel;
            }
        }

        $data['bentuk'] = $bentuk;

        $data['pelanggaran'] = $filp;
        $tahun = date('Y');

        $categories = [];
        $jumlah = [];

        if ($jenis === "Tahunan") {
            $curr = date("Y") - 5;
            for ($i = 0; $i < 6; $i++) {
                $c = 0;
                $categories[] = $curr;
                foreach ($data['pelanggaran'] as $pl) {
                    if (strpos($pl->tanggal, '' . $curr) !== false) {
                        $c += 1;
                    }
                }
                $jumlah[] = $c;
                $curr += 1;
            }
        } else if ($jenis === "Bulanan") {
            $mn = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
            for ($curr = 1; $curr < 13; $curr++) {
                $c = 0;
                $categories[] = $mn[$curr];
                foreach ($data['pelanggaran'] as $pl) {
                    if (date("m", strtotime($pl->tanggal)) == $curr) {
                        $c += 1;
                    }
                }
                $jumlah[] = $c;
            }
        }
        $data['jenis'] = $jenis;
        $data['jumlah'] = $jumlah;
        $data['categories'] = $categories;
        $this->load->model('nonakademik/Mod_pelanggaran_bentuk');
        $data['pelanggaran_bentuk'] = $this->Mod_pelanggaran_bentuk->get();

        $this->load->model('nonakademik/Mod_pengaturan_pelanggaran', "atur");
        $data['check'] = $this->atur->get_check();

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/grafik_pelanggaran', $data);
    }

    public function simpanpelanggaran()
    {
        $this->load->model('nonakademik/Mod_pelanggaran');
        $data = $this->input->post();
        $this->Mod_pelanggaran->insert($data);
        $this->session->set_flashdata('pesan', 'Berhasil Menyimpan Pelanggaran !');
        redirect('konseling/laporan_pelanggaran', $data);
    }

    public function deletepelanggaran($id)
    {
        $this->load->model('nonakademik/Mod_pelanggaran');
        $this->Mod_pelanggaran->delete($id);
        $this->session->set_flashdata('pesan', "<script>alert('Data Berhasil Dihapus')</script>");
        redirect('konseling/laporan_pelanggaran');
        // $this->template->load('konseling/dashboard','konseling/nonakademik/pelanggaran', $data);
    }

    public function editpelanggaran()
    {
        $this->load->model('nonakademik/Mod_pelanggaran');
        $this->Mod_pelanggaran->editpelanggaran($this->input->post());
        redirect('konseling/laporan_pelanggaran');
    }

    public function simpanbentukpelanggaran()
    {
        $this->load->model('nonakademik/Mod_pelanggaran_bentuk');
        $data = $this->input->post();
        $this->Mod_pelanggaran_bentuk->insert($data);
        $this->session->set_flashdata('pesan', 'Berhasil Menyimpan Pelanggaran !');
        redirect('konseling/bentuk_pelanggaran', $data);
    }

    public function deletebentukpelanggaran($id)
    {
        $this->load->model('nonakademik/Mod_pelanggaran_bentuk');
        $this->Mod_pelanggaran_bentuk->delete($id);
        $this->session->set_flashdata('pesan', "<script>alert('Data Berhasil Dihapus')</script>");
        redirect('konseling/bentuk_pelanggaran');
    }

    public function editbentukpelanggaran()
    {
        $this->load->model('nonakademik/Mod_pelanggaran_bentuk');
        $this->Mod_pelanggaran_bentuk->edit($this->input->post()['id'], $this->input->post()['nama_pelanggaran'], $this->input->post()['poin']);
        redirect('konseling/bentuk_pelanggaran');
    }

    public function prestasi()
    {
        if ($this->session->userdata('jabatan') === 'Siswa') {
            redirect('konseling/laporan_penghargaan');
        }
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/Mod_prestasi');
        $data['kelas_reguler'] = $this->mod_kelas_reguler->getall();
        $data['prestasi'] = $this->Mod_prestasi->get();

        $this->load->model('nonakademik/Mod_pengaturan_penghargaan', "atur");
        $data['check'] = $this->atur->get_check();
        //$data['check'] = $this->Mod_pengaturan_penghargaan->get_check();
        $this->template->load('konseling/dashboard', 'konseling/nonakademik/prestasi', $data);
    }

    public function deleteprestasi($id)
    {
        $this->load->model('nonakademik/Mod_prestasi');
        $this->Mod_prestasi->delete($id);
        $this->session->set_flashdata('pesan', "<script>alert('Data Berhasil Dihapus')</script>");
        redirect('konseling/laporan_penghargaan');
        // $this->template->load('konseling/dashboard','konseling/nonakademik/pelanggaran', $data);
    }

    public function grafik_penghargaan($jenis = "")
    {

        $this->load->model('nonakademik/Mod_tahunajaran');
        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['tahunajaran'] = $this->Mod_tahunajaran->get();
        $data['username'] = $this->session->username;

        $this->load->model('nonakademik/Mod_prestasi');
        $data['prestasi'] = $this->Mod_prestasi->get();

        $tahun = date('Y');
        //if ($this->input->post('tahun') != "") { $tahun = $this->input->post('tahun'); }
        $categories = [];
        $jumlah = [];
        if ($jenis === "Tahunan") {
            $curr = date("Y") - 5;
            for ($i = 0; $i < 6; $i++) {
                $c = 0;
                $categories[] = $curr;
                foreach ($data['prestasi'] as $pl) {
                    if (strpos($pl->tanggal, '' . $curr) !== false) {
                        $c += 1;
                    }
                }
                $jumlah[] = $c;
                $curr += 1;
            }
        } else if ($jenis === "Bulanan") {
            $mn = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');

            for ($curr = 1; $curr < 13; $curr++) {
                $c = 0;
                $categories[] = $mn[$curr];
                foreach ($data['prestasi'] as $pl) {
                    if (date("m", strtotime($pl->tanggal)) == $curr) {
                        $c += 1;
                    }
                }
                $jumlah[] = $c;
            }
        }
        $data['jenis'] = $jenis;
        $data['jumlah'] = $jumlah;
        $data['categories'] = $categories;
        $this->template->load('konseling/dashboard', 'konseling/nonakademik/grafik_prestasi', $data);
    }

    public function laporan_penghargaan()
    {
        $this->load->model('nonakademik/Mod_prestasi');
        $data['prestasi'] = $this->Mod_prestasi->get();

        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;

        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/Mod_pengaturan_penghargaan', "atur");

        $data['kelas_reguler'] = $this->mod_kelas_reguler->getall();
        $data['check'] = $this->atur->get_check();

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/laporan_penghargaan', $data);
    }

    public function pengaturan_penghargaan()
    {
        if ($this->session->userdata('jabatan') === 'Siswa') {
            redirect('konseling/laporan_penghargaan');
        }
        $this->load->model('nonakademik/Mod_pengaturan_penghargaan');

        if (!empty($_POST)):
            $this->Mod_pengaturan_penghargaan->update($_POST);
            redirect('konseling/prestasi');
        endif;

        $data["check"] = $this->Mod_pengaturan_penghargaan->get_check();
        $data['nama'] = $this->session->Nama;
        $data['foto'] = $this->session->foto;
        $data['username'] = $this->session->username;

        $this->template->load('konseling/dashboard', 'konseling/nonakademik/pengaturan_penghargaan', $data);

    }

    public function editprestasi()
    {
        $this->load->model('nonakademik/Mod_prestasi');

        $config['upload_path'] = './assets/nonakademik/image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 10240;
        $config['max_height'] = 7680;

        $this->load->library('upload', $config);

        $data = array(
            'id_prestasi' => $this->input->post('id_prestasi'),
            'kategori_prestasi' => $this->input->post('kategori_prestasi'),
            'nama_prestasi' => $this->input->post('nama_prestasi'),
            'tingkat_prestasi' => $this->input->post('tingkat_prestasi'),
            'tahun' => $this->input->post('tahun'),
            'tanggal' => $this->input->post('tanggal'),
            'peringkat' => $this->input->post('peringkat'),
            'penyelenggara' => $this->input->post('penyelenggara'),
            'keterangan' => $this->input->post('keterangan'),
        );

        if (!$this->upload->do_upload('foto')) {
            $foto = $this->input->post('old_poto');
        } else {
            $data['foto'] = $this->upload->data('file_name');
        }

        $this->Mod_prestasi->edit($data);
        $this->session->set_flashdata('pesan', 'Berhasil Menyimpan Prestasi !');
        redirect('konseling/laporan_penghargaan');
    }

    public function simpanprestasi()
    {

        $this->load->model('nonakademik/Mod_prestasi');

        $config['upload_path'] = './assets/nonakademik/image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 10240;
        $config['max_height'] = 7680;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $foto = "Gagal";
        } else {
            $foto = $this->upload->data('file_name');
        }

        // $data = array(
        //     'nisn' => $this->input->post('nisn'),
        //     'nama' => $this->input->post('nisn'),
        //     'kategori_prestasi' => $this->input->post('kategori_prestasi'),
        //     'nama_prestasi' => $this->input->post('nama_prestasi'),
        //     'tingkat_pend' => $this->input->post('tingkat_prestasi'),
        //     'tahun' => $this->input->post('tahun'),
        //     'peringkat' => $this->input->post('peringkat'),
        //     'penyelenggara' => $this->input->post('penyelenggara'),
        //     'keterangan' => $this->input->post('keterangan'),
        //     'foto' => $foto,
        //     );
        $data = $this->input->post();
        $data['foto'] = $foto;
        $this->Mod_prestasi->insert($data);
        redirect('konseling/prestasi');
    }

//---------------------------------------------------------------------------------------------------------------------------
    //belum selesai dari sananya
    public function tmbh_konseling()
    {
        $this->load->model('nonakademik/Mod_mengelola', 'me');
        $this->load->myview('nonakademik/tmbh_konseling');
    }

    public function simpan_tmbh_konseling()
    {
        $this->load->model('Mod_mengelola');
        $data = array(
            'nip' => $this->input->post('nip'),
            'nama_konseling' => $this->input->post('nama_konseling'),
            'jabatan' => $this->input->post('jabatan'),
        );
        $this->Mod_mengelola->simpan_konseling($data);
        redirect('nonakademik/tmbh_konseling');
    }

    public function tmbh_ekskul()
    {
        $this->load->model('Mod_mengelola', 'me');
        $this->load->myview('nonakademik/tmbh_ekstrakurikuler');
    }

    public function simpan_tmbh_ekskul()
    {
        $this->load->model('Mod_mengelola');
        $data = array(
            'jenis_kls_tambahan' => $this->input->post('jenis_kls_tambahan'),
        );
        $this->Mod_mengelola->simpan_ekskul($data);
        redirect('nonakademik/tmbh_ekskul');
    }

    public function tmbh_pelanggaran()
    {
        $this->load->model('Mod_mengelola', 'me');
        $this->load->myview('nonakademik/tmbh_pelanggaran');
    }

    public function simpan_tmbh_pelanggaran()
    {
        $this->load->model('Mod_mengelola');
        $data = array(
            'kategori' => $this->input->post('kategori'),
            'no_pasal' => $this->input->post('no_pasal'),
            'poin' => $this->input->post('poin'),
        );
        $this->Mod_mengelola->simpan_kpn_pelanggaran($data);
        redirect('nonakademik/tmbh_pelanggaran');
    }

    public function getsiswa($id_kelas_reguler = 0)
    {

        // echo '<option value="">Pilih Siswa</option>';
        // echo '<option value="23423">AAAAA</option>';
        // echo '<option value="23423223">BBBBB</option>';

        $this->load->model('nonakademik/mod_kelas_reguler');
        $this->load->model('nonakademik/mod_siswa_kelas_reguler_berjalan');
        $this->load->model('nonakademik/Mod_tahunajaran');
        $data['tahunajaran'] = $this->Mod_tahunajaran->get();
        //$id_tahun_ajaran = "";// klo tdk dipilih kosong

        $id_tahun_ajaran = $this->setting->id_tahun_ajaran; //$data['tahunajaran'][0]->id_tahun_ajaran; //kalo dipilih kosong
        //if ($idthn != "") { $id_tahun_ajaran = $idthn; }
        $data['id_tahun_ajaran'] = $id_tahun_ajaran;

        $data['id_kelas_reguler'] = $id_kelas_reguler;
        //$data['kelas_reguler'] = $this->mod_kelas_reguler->get(array('id_tahun_ajaran'=>$this->setting->id_tahun_ajaran));
        //$data['jenis_kls_tambahan'] = $this->mod_jenis_kls_tambahan->get();
        //echo $this->db->last_query();

        $siswa_kelas_reguler_berjalan = $this->mod_siswa_kelas_reguler_berjalan->get_siswa_kelas_reguler_berjalan3($id_kelas_reguler, $id_tahun_ajaran);
        //echo $this->db->last_query();
        // $data['siswa_ekskul'] = $this->mod_siswa_kelas_reguler_berjalan->get_siswa_ekskul($id_kelas_reguler);
        // $data['record'] = $this->mod_siswa_kelas_reguler_berjalan->get_all_kelas();

        echo '<option value="">Pilih Siswa</option>';
        foreach ($siswa_kelas_reguler_berjalan as $row) {
            echo '<option value="' . $row->nisn . '">' . $row->nisn . ' ' . $row->nama . '</option>';
        }

    }
}

// Tutup NON AKADEMIK
