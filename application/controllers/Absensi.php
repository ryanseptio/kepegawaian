<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_absensi');
		$this->load->model('M_jabatan');
		$this->load->model('M_kota');
		$this->load->model('M_departemen');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataAbsensi'] = $this->M_absensi->select_all_pegawai();
		$data['dataJabatan'] = $this->M_jabatan->select_all();
		$data['dataKota'] = $this->M_kota->select_all();
		$data['dataDepartemen'] = $this->M_departemen->select_all();

		$data['page'] = "absensi";
		$data['judul'] = "Data Absensi";
		$data['deskripsi'] = "Manage Data Absensi";

		$data['modal_tambah_absensi'] = show_my_modal('modals/modal_tambah_absensi', 'tambah-absensi', $data);

		$this->template->views('absensi/home', $data);
	}

	public function tampil() {
		$data['dataAbsensi'] = $this->M_absensi->select_all();
		$this->load->view('absensi/list_data', $data);
	}

	public function toEditAbsensi(){
       $id = trim($_POST['id']);
      //$stack = array();
     	$data['dataAbsensi'] = $this->M_absensi->select_by_id($id);
         $jsonArr=array(
             'rows'=>$data['dataAbsensi']
         );
         echo json_encode($jsonArr);
	}

	public function update() {
		$id = trim($_POST['id']);

		$data['dataAbsensi'] = $this->M_absensi->select_by_id($id);
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_absensi', 'update-absensi', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('absensi', 'Absensi Pegawai', 'trim|required');
		
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_absensi->update($data);
			

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Absensi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Absensi Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
}

/* End of file absensi.php */
/* Location: ./application/controllers/absensi.php */