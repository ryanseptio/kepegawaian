<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
  </div>
  <!-- /.box-header -->
  <div class="box-body" style="overflow: auto;">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <!-- <th>Username</th> -->
          <th>NPP</th>
          <!-- <th>No Telp</th>
          <th>Asal kota</th>
          <th>Jenis Kelamin</th> -->
          <th>Jabatan</th>
          <th>Departemen</th>
          <th>Absensi</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-absensi">
        
      </tbody>
    </table>
  </div>
</div>


<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataAbsensi', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Absensi';
  $data['url'] = 'Absensi/import';
  echo show_my_modal('modals/modal_import', 'import-absensi', $data);
?>