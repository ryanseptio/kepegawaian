<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepegawaian extends AUTH_Controller {
	public function index() {
		$data['userdata'] 	= $this->userdata;
		

		$data['page'] 		= "kepegawaian";
		$data['judul'] 		= "Data Kepegawaian";


		$this->template->views('kepegawaian/home', $data);
	}

	
}

/* End of file Kepegawaian.php */
/* Location: ./application/controllers/Kepegawaian.php */