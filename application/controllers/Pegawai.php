<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_jabatan');
		$this->load->model('M_kota');
		$this->load->model('M_departemen');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all_pegawai();
		$data['dataJabatan'] = $this->M_jabatan->select_all();
		$data['dataKota'] = $this->M_kota->select_all();
		$data['dataDepartemen'] = $this->M_departemen->select_all();

		$data['page'] = "pegawai";
		$data['judul'] = "Data Pegawai";
		$data['deskripsi'] = "Manage Data Pegawai";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

		$this->template->views('pegawai/home', $data);
	}

	public function tampil() {
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$this->load->view('pegawai/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		// $this->form_validation->set_rules('absensi', 'Absensi Pegawai', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('departemen', 'Departemen', 'trim|required');
		$this->form_validation->set_rules('npp', 'NPP', 'trim|required');
		$this->form_validation->set_rules('status_penilaian', 'Status Penilaian', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$npp = $this->input->post('npp');
			$departemen = $this->input->post('departemen');
			$jabatan = $this->input->post('jabatan');
			$nama_jabatan = $this->M_pegawai->select_nama_jabatan($jabatan);
			$nama_jabatan1 = $nama_jabatan[0]->nama;
			// print_r($nama_jabatan1);
			// die();
			$data1 = [
				'nama' => $nama,
				'username' => $username,
				'password' => $password,
				'npp' => $npp,
				'departemen' => $departemen,
				'jabatan' => $nama_jabatan1
			];

			$result = $this->M_pegawai->insert($data);
			$this->M_pegawai->insertUser($data1);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Pegawai Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$id = trim($_POST['id']);

		$data['dataPegawai'] = $this->M_pegawai->select_by_id($id);
		$data['dataJabatan'] = $this->M_jabatan->select_all();
		$data['dataKota'] = $this->M_kota->select_all();
		$data['dataDepartemen'] = $this->M_departemen->select_all();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_pegawai', 'update-pegawai', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		// $this->form_validation->set_rules('absensi', 'Absensi Pegawai', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('departemen', 'Departemen', 'trim|required');
		$this->form_validation->set_rules('npp', 'NPP', 'trim|required');
		$this->form_validation->set_rules('status_penilaian', 'Status Penilaian', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$id = $_POST['id'];
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$npp = $this->input->post('npp');
			$jabatan = $this->input->post('jabatan');
			$departemen = $this->input->post('departemen');
			$password = $this->input->post('password');
			$nama_jabatan = $this->M_pegawai->select_nama_jabatan($jabatan);
			$nama_jabatan1 = $nama_jabatan[0]->nama;
			// print_r($nama_jabatan1);
			// die();
			$data1 = [
				'id' => $id,
				'nama' => $nama,
				'username' => $username,
				'password' => $password,
				'npp' => $npp,
				'departemen' => $departemen,
				'jabatan' => $nama_jabatan1
			];

			$this->M_pegawai->updateUser($data1);
			$result = $this->M_pegawai->update($data);
			

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$username = $this->M_pegawai->select_user($id);
		$hasil = $username[0]->username;
		// print_r($hasil);
		// die();
		$result = $this->M_pegawai->delete($id);
		$this->M_pegawai->deleteUser($hasil);

		if ($result > 0) {
			echo show_succ_msg('Data Pegawai Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pegawai Gagal dihapus', '20px');
		}
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */