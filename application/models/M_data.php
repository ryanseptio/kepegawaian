<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('data');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM data WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_syarat($id) {
		
		$sql = "SELECT s.id as id_syarat, s.bobot, d.id as id_data, d.nama_data, d.keterangan, d.penilaian FROM data d JOIN syarat s ON (d.id_syarat = s.id) WHERE d.id_syarat = '{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
		/*
		$this->db->select('d.*, s.*');
		$this->db->from('syarat as s');
		$this->db->join('data as d', 's.id=d.id_syarat');
		$this->db->where('d.id_syarat =', $id);
		$query = $this->db->get();
   		return $query->row();*/
	}

	public function insert($data) {
		$sql = "INSERT INTO data VALUES(default,'','" .$data['nama_data'] ."','" .$data['keterangan'] ."','" .$data['penilaian'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('data', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE data SET nama_data='" .$data['nama_data'] ."', keterangan='" .$data['keterangan'] ."', penilaian='" .$data['penilaian'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM data WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama_data) {
		$this->db->where('nama_data', $nama_data);
		$data = $this->db->get('data');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('data');

		return $data->num_rows();
	}
}

/* End of file M_data.php */
/* Location: ./application/models/M_data.php */