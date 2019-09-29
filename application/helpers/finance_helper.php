<?php
	if(!defined('BASEPATH'))exit('No direct script access allowed');
	if(!function_exists('formatRupiah'))
	{
		function formatRupiah($nilaiUang)
		{
			$value	= $nilaiUang;
			if($value < 0)
			{
				return 'Rp&nbsp;'.number_format(abs($value), 0, '', '.').',-';
			}
			else
			{
				$nilaiRupiah	= "";
				$jumlahAngka 	= strlen($nilaiUang);
				while($jumlahAngka > 3)
				{
					$nilaiRupiah	= ".".substr($nilaiUang,-3).$nilaiRupiah;
					$sisaNilai  	= strlen($nilaiUang) - 3;
					$nilaiUang   	= substr($nilaiUang,0,$sisaNilai);
					$jumlahAngka 	= strlen($nilaiUang);
				}
				$nilaiRupiah       = "Rp&nbsp;".$nilaiUang.$nilaiRupiah.",-";
				return $nilaiRupiah;
			}
		}
	}
	if(!function_exists('formatRupiah2'))
	{
		function formatRupiah2($nilaiUang)
		{
			$value	= $nilaiUang;
			if($value < 0)
			{
				return 'Rp '.number_format(abs($value), 0, '', '.').',-';
			}
			else
			{
				$nilaiRupiah	= "";
				$jumlahAngka 	= strlen($nilaiUang);
				while($jumlahAngka > 3)
				{
					$nilaiRupiah	= ".".substr($nilaiUang,-3).$nilaiRupiah;
					$sisaNilai  	= strlen($nilaiUang) - 3;
					$nilaiUang   	= substr($nilaiUang,0,$sisaNilai);
					$jumlahAngka 	= strlen($nilaiUang);
				}
				$nilaiRupiah       = "Rp ".$nilaiUang.$nilaiRupiah.",-";
				return $nilaiRupiah;
			}
		}
	}
?>