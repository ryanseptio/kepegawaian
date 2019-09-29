<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kriteria');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['datakriteria'] 	= $this->M_kriteria->select_all();

		$data['page'] 		= "kriteria";
		$data['judul'] 		= "Data Kriteria";
		$data['deskripsi'] 	= "Manage Data Kriteria Penilaian";

		$data['modal_tambah_kriteria'] = show_my_modal('modals/modal_tambah_kriteria', 'tambah-kriteria', $data);

		$this->template->views('kriteria/home', $data);
	}

	public function tampil() {
		$data['dataKriteria'] = $this->M_kriteria->select_all();
		$this->load->view('kriteria/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('kriteria', 'Nama Kriteria', 'trim|required');
		$this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('atr1', 'Penilaian 1', 'trim|required');
		$this->form_validation->set_rules('nilai1', 'Nilai 1', 'trim|required');
		$this->form_validation->set_rules('atr2', 'Penilaian 2', 'trim|required');
		$this->form_validation->set_rules('nilai2', 'Nilai 2', 'trim|required');
		$this->form_validation->set_rules('atr3', 'Penilaian 3', 'trim|required');
		$this->form_validation->set_rules('nilai3', 'Nilai 3', 'trim|required');
		$this->form_validation->set_rules('atr4', 'Penilaian 4', 'trim|required');
		$this->form_validation->set_rules('nilai4', 'Nilai 4', 'trim|required');
		$this->form_validation->set_rules('atr5', 'Penilaian 5', 'trim|required');
		$this->form_validation->set_rules('nilai5', 'Nilai 5', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kriteria->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kriteria Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Kriteria Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$idkriteria 				= trim($_POST['idkriteria']);
		$data['dataKriteria'] = $this->M_kriteria->select_by_id($idkriteria);

		echo show_my_modal('modals/modal_update_kriteria', 'update-kriteria', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('kriteria', 'Nama Kriteria', 'trim|required');
		$this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('atr1', 'Penilaian 1', 'trim|required');
		$this->form_validation->set_rules('nilai1', 'Nilai 1', 'trim|required');
		$this->form_validation->set_rules('atr2', 'Penilaian 2', 'trim|required');
		$this->form_validation->set_rules('nilai2', 'Nilai 2', 'trim|required');
		$this->form_validation->set_rules('atr3', 'Penilaian 3', 'trim|required');
		$this->form_validation->set_rules('nilai3', 'Nilai 3', 'trim|required');
		$this->form_validation->set_rules('atr4', 'Penilaian 4', 'trim|required');
		$this->form_validation->set_rules('nilai4', 'Nilai 4', 'trim|required');
		$this->form_validation->set_rules('atr5', 'Penilaian 5', 'trim|required');
		$this->form_validation->set_rules('nilai5', 'Nilai 5', 'trim|required');

		$data 	= $this->input->post();
		// print_r($data);
		// die();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kriteria->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kriteria Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Kriteria Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$idkriteria = $_POST['idkriteria'];
		$result = $this->M_kriteria->delete($idkriteria);
		
		if ($result > 0) {
			echo show_succ_msg('Data Kriteria Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Kriteria Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$idkriteria 				= trim($_POST['idkriteria']);
		$data['kriteria'] = $this->M_kriteria->select_by_id($idkriteria);
		$data['jumlahKriteria'] = $this->M_kriteria->total_rows();
		$data['dataKriteria'] = $this->M_kriteria->select_by_id($idkriteria);

		echo show_my_modal('modals/modal_detail_kriteria', 'detail-kriteria', $data, 'lg');
	}

}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */