<?php
	class Pdf_Controller extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_penilaian_topsis');
			$this->load->library('Pdf_Library');
			$this->load->model('M_auth');

		}
		

		public function generate_pdf_report_penilaian()
		{		
			$data1 = $this->M_penilaian_topsis->select_report();

			for ($i=0; $i < count($data1) ; $i++)
			{
				$data['listdata'][$i]['pegawai'] = $data1[$i]->pegawai;
				$data['listdata'][$i]['absensi'] = $data1[$i]->absensi;
				$data['listdata'][$i]['v'] = $data1[$i]->v;
			}

			$this->load->view('report_penilaian', $data);
		}
	}

