<?php
$no = 1;
  foreach ($dataPegawai as $pegawai) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td style="min-width:200px;"><?php echo $pegawai->pegawai; ?></td>
      <td><?php echo $pegawai->username; ?></td>
      <td><?php echo $pegawai->npp; ?></td>
      <td><?php echo $pegawai->telp; ?></td>
      <td><?php echo $pegawai->kota; ?></td>
      <td><?php echo $pegawai->jabatan; ?></td>
      <td><?php echo $pegawai->departemen; ?></td>
      <td><?php echo $pegawai->status_penilaian; ?></td>
      
      <td class="text-center" width="290" style="min-width:180px;">
        <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $pegawai->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<?php echo $pegawai->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>