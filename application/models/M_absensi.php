<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absensi extends CI_Model {
	public function select_all_pegawai() {
		$sql = "SELECT * FROM pegawai ORDER BY  pegawai.nama ASC";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, jabatan.nama AS jabatan , absensi, username, departemen, npp FROM pegawai, kota, kelamin, jabatan WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_jabatan = jabatan.id AND pegawai.id_kota = kota.id ORDER BY  pegawai.nama ASC";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT pegawai.id AS id_pegawai, pegawai.nama AS nama_pegawai, pegawai.id_kota, pegawai.id_kelamin, pegawai.id_jabatan, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, jabatan.nama AS jabatan, absensi, username, password, departemen,npp FROM pegawai, kota, kelamin, jabatan WHERE pegawai.id_kota = kota.id AND pegawai.id_kelamin = kelamin.id AND pegawai.id_jabatan = jabatan.id AND pegawai.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_jabatan($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_jabatan = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_nama_jabatan($jabatan) {
		$sql = "SELECT nama FROM jabatan WHERE id = {$jabatan}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE pegawai SET absensi='" .$data['absensi'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM pegawai WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		// $id = md5(DATE('ymdhms').rand());
		$pass = md5($data['password']);
		$sql = "INSERT INTO pegawai VALUES(default,'" .$data['nama'] ."','" .$data['npp'] ."','" .$data['telp'] ."','" .$data['kota'] ."','" .$data['jk'] ."','" .$data['jabatan'] ."',1 , '" .$data['absensi'] ."', '" .$data['username'] ."', '{$pass}', 'user', '" .$data['departemen'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pegawai', $data);
		
		return $this->db->affected_rows();
	}

	public function insertUser($data1) {
		$pass = md5($data1['password']);
		$sql = "INSERT INTO admin VALUES(default, '" .$data1['username'] ."', '{$pass}', '" .$data1['nama'] ."', 'ieu.jpg', 'user', '" .$data1['departemen'] ."', '" .$data1['jabatan'] ."', '" .$data1['npp'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function updateUser($data1) {
		$pass = md5($data1['password']);
		$sql = "UPDATE admin SET username='" .$data1['username'] ."', password='{$pass}', nama='" .$data1['nama'] ."', departemen='" .$data1['departemen'] ."', jabatan='" .$data1['jabatan'] ."', npp='" .$data1['npp'] ."' WHERE username='" .$data1['username'] ."'";

		$this->db->query($sql);
		return $this->db->affected_rows();
	}


	public function select_user($id) {
		$sql = "SELECT username FROM pegawai where id = '" .$id ."'";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function deleteUser($hasil) {
		$sql = "DELETE FROM admin WHERE username ='" .$hasil."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */