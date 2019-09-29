<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model {
	public function select_all() {
		// $this->db->order_by("nama", "asc");
		$data = $this->db->get('jabatan');


		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM jabatan WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function insert($data) {
		$sql = "INSERT INTO jabatan VALUES(default,'" .$data['jabatan'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('jabatan', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE jabatan SET nama='" .$data['jabatan'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM jabatan WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('jabatan');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('jabatan');

		return $data->num_rows();
	}
}

/* End of file M_jabatan.php */
/* Location: ./application/models/M_jabatan.php */