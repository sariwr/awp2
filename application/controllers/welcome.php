<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index($mess = 0)
	{
		$data = array(
			'content' => $this->my_model->GetData(),
			'message' => $mess
		);
		$this->load->view('index',$data);
	}
	
	public function add()
	{
		$data = array(
			'status' => 'Tambah',
			'nama' => '',
			'asal_sekolah' => '',
			'alamat' => '',
			'telepon' => '',
			'id' => ''
		);
		$this->load->view('manipulasi_data',$data);
	}
	
	public function edit($id = 0)
	{
		$temp = $this->my_model->GetData("where id = '$id'")->result_array();
		$data = array(
			'status' => 'Edit',
			'nama' => $temp[0]['nama'],
			'asal_sekolah' => $temp[0]['asal_sekolah'],
			'alamat' => $temp[0]['alamat'],
			'telepon' => $temp[0]['telepon'],
			'id' => $temp[0]['id']
		);
		$this->load->view('manipulasi_data',$data);
	}
	
	public function delete($id = 0)
	{
		$result = $this->my_model->DeleteData('tb_data',array('id' => $id));
		if($result == 1){
			header("location:".base_url().'index.php/welcome/index/3');
		}else{
			echo "<h2>Operasi Hapus Data Gagal !!!</h2><br><a href='".base_url()."'>Kembali ke Halaman sebelumnya</a>";
		}
	}
	
	public function simpan()
	{
		if($_POST){
			$kode 			= $_POST['kode'];
			$nama 			= $_POST['nama'];			
			$asal_sekolah	= $_POST['asal_sekolah'];
			$alamat 		= $_POST['alamat'];
			$telepon 		= $_POST['telepon'];
			$status 		= $_POST['status'];
			
			$data = array(
				'nama' => $nama,
				'asal_sekolah' => $asal_sekolah,
				'alamat' => $alamat,
				'telepon' => $telepon
			);
			if(strtolower($status) == "tambah"){
				$result = $this->my_model->InsertData('tb_data',$data);
				if($result == 1){
					header("location:".base_url().'index.php/welcome/index/1');
				}else{
					echo "<h2>Operasi Tambah Data Gagal !!!</h2><br><a href='".base_url()."'>Kembali ke Halaman sebelumnya</a>";
				}
			}else{
				$result = $this->my_model->UpdateData('tb_data',$data,array('id' => $kode));
				if($result == 1){
					header("location:".base_url().'index.php/welcome/index/2');
				}else{
					echo "<h2>Operasi Ubah Data Gagal !!!</h2><br><a href='".base_url()."'>Kembali ke Halaman sebelumnya</a>";
				}
			}
		}else{
			header('location:'.base_url());
		}
	}
	
	public function jsontulis()
	{
		$this->load->model('my_model');
		$siswa = new my_model();
		$data["datasiswa"] = $siswa->GetData();
		header("Content-Type: application/json");
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		echo json_encode($data);
	}
	
	public function jsonbaca()
	{
				$this->load->view('bacadatajson');
	}
	
	public function xmltulis()
	{
		$this->load->model('my_model');
		$siswa = new my_model();
		$data = $siswa->GetData();

		header ("Content-type: text/xml");
	
		$dataxml = "<datasiswa>";
	
		for ($i=0; $i < count($data); $i++) 
		{
			$dataxml .= "<data>";
			$dataxml .= "<id>".$data[$i]->id."</id>";
			$dataxml .= "<nama>".$data[$i]->nama."</nama>";
			$dataxml .= "<asal_sekolah>".$data[$i]->asal_sekolah."</asal_sekolah>";
			$dataxml .= "<alamat>".$data[$i]->alamat."</alamat>";
			$dataxml .= "<telepon>".$data[$i]->telepon."</telepon>";
			$dataxml .= "</data>";
		}
				
		$dataxml .= "</datasiswa>";
		$this->output->set_content_type('text/xml')->set_output($dataxml);
	}
	
	public function xmlbaca()
	{
		$get_xml = file_get_contents("http://milikindra.pe.hu/index.php/user/xmlwrite");
		$xml=simplexml_load_string($get_xml);

		$data['xml'] = $xml;
		$this->load->view('bacadataxml',$data);
	}
	
		
}