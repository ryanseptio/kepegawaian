<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_departemen extends CI_Model {
	public function select_all() {
		$this->db->order_by("nama_departemen", "asc");
		$data = $this->db->get('departemen');

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM departemen WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, departemen.nama AS departemen FROM pegawai, kota, kelamin, departemen WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_departemen = departemen.id AND pegawai.id_kota = kota.id AND pegawai.id_departemen={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO departemen VALUES(default,'" .$data['kode'] ."','" .$data['departemen'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('departemen', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE departemen SET kode='" .$data['kode'] ."', nama_departemen='" .$data['departemen'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM departemen WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('departemen');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('departemen');

		return $data->num_rows();
	}
}

/* End of file M_departemen.php */
/* Location: ./application/models/M_departemen.php */