<?php
$no = 1;
  foreach ($dataAbsensi as $absensi) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td style="min-width:230px;"><?php echo $absensi->pegawai; ?></td>
      <td><?php echo $absensi->npp; ?></td>
      <td><?php echo $absensi->jabatan; ?></td>
      <td><?php echo $absensi->departemen; ?></td>
      <td><?php echo $absensi->absensi; ?></td>
      <td class="text-center" width="100" style="min-width:80px;">
         <button class="btn btn-warning update-dataAbsensi" data-id="<?php echo $absensi->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button> 
      </td>
    </tr>
    <?php
    $no++;
  }
?>

