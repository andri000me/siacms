<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('distribusi/excel_import_model');
  $this->load->library('excel');
 }


// public function index()
//  {
//  	$data['nama'] = $this->session->Nama;
// 	$data['foto'] = $this->session->foto;
//     $this->template->load('kesiswaan/dashboard','kesiswaan/distribusi/kesiswaan/hasil_pembagian_tambahan', $data);
//  }

function fetch()
	{
		$data = $this->excel_import_model->select();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Pilih</th>
				<th>No</th>
				<th>NISN</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Jenis Kelamin</th>
				<th>Nilai TPM</th>
			</tr>
		';
		$i=0;
		foreach($data->result() as $row)
		{

			$i++;
			$output .= '
			<tr>
				<td>
                    <input type="checkbox" name="pilih[]" value="'.$row->id_siswa_excel.'">
                <?php } ?></td> 
				<td>'.$i.'</td>
				<td>'.$row->nisn.'</td>
				<td>'.$row->nama.'</td>
				<td>'.$row->kelas.'</td>
				<td>'.$row->jenis_kelamin.'</td>
				<td>'.$row->nilai_tpm.'</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				echo "$highestRow";
				for($row=2; $row<=$highestRow; $row++)
				{
					$nisn = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$kelas = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$jenis_kelamin = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$nilai_tpm = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$data[] = array(
						'nisn'				=>	$nisn,
						'nama'				=>	$nama,
						'kelas'				=>	$kelas,
						'jenis_kelamin'		=>	$jenis_kelamin,
						'nilai_tpm'			=>	$nilai_tpm
					);
				}
			}
			$this->excel_import_model->insert($data);
			echo 'Data Imported successfully';
		}	
	}
}

?>
