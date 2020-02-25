<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_ppdb extends CI_Controller {


	public function index()
	{
		$this->load->model('ppdb/model_pendaftar_ppdb');
		//$data['tabel_pendaftar_jalur_un'] = $this->model_pendaftar_jalur_un->get();
		//$this->load->view('kesiswaan/admin/view_pendaftar_jalur_un', $data);
		$this->load->model('ppdb/model_pengaturan_menu_ppdb');
		$data['pengaturan_menu_un'] = $this->model_pengaturan_menu_ppdb->get();	

		foreach ($this->db->get('pengaturan_menu_ppdb')->result() as $menu) 
         { 
         	$settingmenu[$menu->nama_pengaturan_menu] = $menu->nilai;
         	$settingmenuberkas[$menu->nama_pengaturan_menu] = $menu->atribut;
         }
         $data['settingmenu'] = $settingmenu;
         $data['settingmenuberkas'] = $settingmenuberkas;
		
		$this->template->load('kesiswaan/ppdb/calon_siswa/view_template_calon_siswa', 'kesiswaan/ppdb/calon_siswa/view_frontend_ppdb', $data);

	}

}
