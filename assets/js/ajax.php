<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		url  = window.location.href;
		if (url.indexOf("Pegawai") != -1){
			tampilPegawai();
		}
		else if (url.indexOf("Absensi") != -1){
			tampilAbsensi();
		}
		else if (url.indexOf("Posisi") != -1){
			tampilPosisi();
		}
		else if (url.indexOf("Kota") != -1){
			tampilKota();
		}
		else if (url.indexOf("Jabatan") != -1){
			tampilJabatan();
		}
		else if (url.indexOf("Kepegawaian") != -1){
			tampilJabatan();
		}
		else if (url.indexOf("Departemen") != -1){
			tampilDepartemen();
		}
		else if (url.indexOf("Kriteria") != -1){
			tampilKriteria();
		}
		else if (url.indexOf("Promosi") != -1){
			tampilPromosi();
		}
		else if (url.indexOf("Penilaian_topsis") != -1){
			tampilPenilaian_topsis();
		}
		else if (url.indexOf("Analisis_topsis") != -1){
			tampilAnalisis_topsis();
		}
		
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}


	//Departemen
	function tampilDepartemen() {
		$.get('<?php echo base_url('Departemen/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-departemen').html(data);
			refresh();
		});
	}

	var id_departemen;
	$(document).on("click", ".konfirmasiHapus-departemen", function() {
		id_departemen = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataDepartemen", function() {
		var id = id_departemen;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Departemen/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilDepartemen();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataDepartemen", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Departemen/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-departemen').modal('show');
		})
	})

	$(document).on("click", ".detail-dataDepartemen", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Departemen/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": true,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": true,
		  		  "scrollX": true
				});
			$('#detail-departemen').modal('show');
		})
	})

	$('#form-tambah-departemen').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Departemen/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilDepartemen();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-departemen").reset();
				$('#tambah-departemen').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-departemen', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Departemen/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilDepartemen();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-departemen").reset();
				$('#update-departemen').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-departemen').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-departemen').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//absensi
	function tampilAbsensi() {
		$.get('<?php echo base_url('Absensi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-absensi').html(data);
			refresh();
		});
	}

	var id_absensi;
	$(document).on("click", ".konfirmasiHapus-absensi", function() {
		id_absensi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataAbsensi", function() {
		var id = id_absensi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Absensi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilAbsensi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataAbsensi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Absensi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-absensi').modal('show');
		})
	})

	$('#form-tambah-absensi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Absensi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilAbsensi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-absensi").reset();
				$('#tambah-absensi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-absensi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Absensi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilAbsensi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-absensi").reset();
				$('#update-absensi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-absensi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-absensi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	//Pegawai
	function tampilPegawai() {
		$.get('<?php echo base_url('Pegawai/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pegawai').html(data);
			refresh();
		});
	}

	var id_pegawai;
	$(document).on("click", ".konfirmasiHapus-pegawai", function() {
		id_pegawai = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPegawai", function() {
		var id = id_pegawai;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPegawai();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPegawai", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pegawai').modal('show');
		})
	})

	$('#form-tambah-pegawai').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pegawai").reset();
				$('#tambah-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pegawai', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pegawai").reset();
				$('#update-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


	//Jabatan
	function tampilJabatan() {
		$.get('<?php echo base_url('Jabatan/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-jabatan').html(data);
			refresh();
		});
	}

	var id_jabatan;
	$(document).on("click", ".konfirmasiHapus-jabatan", function() {
		id_jabatan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataJabatan", function() {
		var id = id_jabatan;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Jabatan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilJabatan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataJabatan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Jabatan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-jabatan').modal('show');
		})
	})

	$(document).on("click", ".detail-dataJabatan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Jabatan/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": true,
				  "searching": true,
				  "ordering": true,
				  "autoWidth": true,
		  		  "scrollX": true
				});
			$('#detail-jabatan').modal('show');
		})
	})

	$('#form-tambah-jabatan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Jabatan/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJabatan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-jabatan").reset();
				$('#tambah-jabatan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-jabatan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Jabatan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJabatan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-jabatan").reset();
				$('#update-jabatan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-jabatan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-jabatan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Promosi
	function tampilPromosi() {
		$.get('<?php echo base_url('Promosi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-promosi').html(data);
			refresh();
		});
	}

	var id_promosi;
	$(document).on("click", ".konfirmasiHapus-promosi", function() {
		id_promosi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPromosi", function() {
		var id = id_promosi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Promosi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPromosi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPromosi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Promosi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-promosi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPromosi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Promosi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": true,
				  "searching": true,
				  "ordering": true,
				  "autoWidth": true,
		  		  "scrollX": true
				});
			$('#detail-promosi').modal('show');
		})
	})

	$('#form-tambah-promosi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Promosi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPromosi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-promosi").reset();
				$('#tambah-promosi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-promosi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Promosi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPromosi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-promosi").reset();
				$('#update-promosi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-promosi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-promosi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


	//Kota
	function tampilKota() {
		$.get('<?php echo base_url('Kota/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kota').html(data);
			refresh();
		});
	}

	var id_kota;
	$(document).on("click", ".konfirmasiHapus-kota", function() {
		id_kota = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKota", function() {
		var id = id_kota;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKota();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kota').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-kota').modal('show');
		})
	})

	$('#form-tambah-kota').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kota").reset();
				$('#tambah-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kota', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kota").reset();
				$('#update-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	
//Kriteria

	function tampilKriteria() {
		$.get('<?php echo base_url('Kriteria/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kriteria').html(data);
			refresh();
		});
	}

	var idkriteria;
	$(document).on("click", ".konfirmasiHapus-kriteria", function() {
		idkriteria = $(this).attr("data-idkriteria");

	})
	$(document).on("click", ".hapus-dataKriteria", function() {
		var idkriteria1 = idkriteria;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kriteria/delete'); ?>",
			data: "idkriteria=" +idkriteria1
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKriteria();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKriteria", function() {
		var idkriteria = $(this).attr("data-idkriteria");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kriteria/update'); ?>",
			data: "idkriteria=" +idkriteria
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kriteria').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKriteria", function() {
		var idkriteria = $(this).attr("data-idkriteria");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kriteria/detail'); ?>",
			data: "idkriteria=" +idkriteria
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			// $('#tabel-detail').dataTable({
			// 	  "paging": true,
			// 	  "lengthChange": false,
			// 	  "searching": true,
			// 	  "ordering": true,
			// 	  "info": true,
			// 	  "autoWidth": false
			// 	});
			$('#detail-kriteria').modal('show');
		})
	})

	$('#form-tambah-kriteria').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kriteria/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKriteria();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kriteria").reset();
				$('#tambah-kriteria').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kriteria', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kriteria/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKriteria();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kriteria").reset();
				$('#update-kriteria').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kriteria').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kriteria').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


//Analisis_topsis

	function tampilAnalisis_topsis() {
		$.get('<?php echo base_url('Analisis_topsis/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-analisis_topsis').html(data);
			refresh();
		});
	}

	var id_analisis_topsis;
	$(document).on("click", ".konfirmasiHapus-analisis_topsis", function() {
		id_analisis_topsis = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataAnalisis_topsis", function() {
		var id = id_analisis_topsis;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Analisis_topsis/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilAnalisis_topsis();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataAnalisis_topsis", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Analisis_topsis/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-analisis_topsis').modal('show');
		})
	})

	$(document).on("click", ".detail-dataAnalisis_topsis", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Analisis_topsis/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": false,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-analisis_topsis').modal('show');
		})
	})

	$('#form-tambah-analisis_topsis').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Analisis_topsis/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilAnalisis_topsis();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-analisis_topsis").reset();
				$('#tambah-analisis_topsis').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-analisis_topsis', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Analisis_topsis/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilAnalisis_topsis();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-analisis_topsis").reset();
				$('#update-analisis_topsis').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-analisis_topsis').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-analisis_topsis').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Posisi
	function tampilPosisi() {
		$.get('<?php echo base_url('Posisi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-posisi').html(data);
			refresh();
		});
	}

	var id_posisi;
	$(document).on("click", ".konfirmasiHapus-posisi", function() {
		id_posisi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPosisi", function() {
		var id = id_posisi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPosisi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-posisi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-posisi').modal('show');
		})
	})

	$('#form-tambah-posisi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-posisi").reset();
				$('#tambah-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-posisi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-posisi").reset();
				$('#update-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Penilaian_topsis topsis

	function tampilPenilaian_topsis() {
		$.get('<?php echo base_url('Penilaian_topsis/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-penilaian_topsis').html(data);
			refresh();
		});
	}

	var id_penilaian_topsis;
	$(document).on("click", ".konfirmasiHapus-penilaian_topsis", function() {
		id_penilaian_topsis = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPenilaian_topsis", function() {
		var id = id_penilaian_topsis;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Penilaian_topsis/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPenilaian_topsis();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPenilaian_topsis", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Penilaian_topsis/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-penilaian_topsis').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPenilaian_topsis", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Penilaian_topsis/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#modal-editData4').modal('show');
		})
	})

	$('#form-tambah-penilaian_topsis').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Penilaian_topsis/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPenilaian_topsis();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-penilaian_topsis").reset();
				$('#tambah-penilaian_topsis').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-penilaian_topsis', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Penilaian_topsis/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPenilaian_topsis();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-penilaian_topsis").reset();
				$('#update-penilaian_topsis').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-penilaian_topsis').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-penilaian_topsis').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
</script>