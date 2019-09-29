<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_departemen');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataDepartemen'] = $this->M_departemen->select_all();

		$data['page'] 		= "departemen";
		$data['judul'] 		= "Data Departemen";
		$data['deskripsi'] 	= "Manage Data Departemen";

		$data['modal_tambah_departemen'] = show_my_modal('modals/modal_tambah_departemen', 'tambah-departemen', $data);

		$this->template->views('departemen/home', $data);
	}

	public function tampil() {
		$data['dataDepartemen'] = $this->M_departemen->select_all();
		$this->load->view('departemen/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('departemen', 'departemen', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_departemen->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Departemen Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Departemen Gagal ditambahkan', '20px');
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
		$data['dataDepartemen'] = $this->M_departemen->select_by_id($id);

		echo show_my_modal('modals/modal_update_departemen', 'update-departemen', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('departemen', 'departemen', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_departemen->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Departemen Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Departemen Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_departemen->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Departemen Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Departemen Gagal dihapus', '20px');
		}
	}
}

/* End of file Departemen.php */
/* Location: ./application/controllers/Departemen.php */