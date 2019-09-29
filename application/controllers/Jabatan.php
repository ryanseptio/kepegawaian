<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_jabatan');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataJabatan'] = $this->M_jabatan->select_all();

		$data['page'] 		= "jabatan";
		$data['judul'] 		= "Data Jabatan";
		$data['deskripsi'] 	= "Manage Data Jabatan";

		$data['modal_tambah_jabatan'] = show_my_modal('modals/modal_tambah_jabatan', 'tambah-jabatan', $data);

		$this->template->views('jabatan/home', $data);
	}

	public function tampil() {
		$data['dataJabatan'] = $this->M_jabatan->select_all();
		$this->load->view('jabatan/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_jabatan->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jabatan Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Jabatan Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataJabatan'] = $this->M_jabatan->select_by_id($id);

		echo show_my_modal('modals/modal_update_jabatan', 'update-jabatan', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_jabatan->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jabatan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jabatan Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_jabatan->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Jabatan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Jabatan Gagal dihapus', '20px');
		}
	}
}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */