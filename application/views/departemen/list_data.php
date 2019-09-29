<?php
  $no = 1;
  foreach ($dataDepartemen as $departemen) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $departemen->kode; ?></td>
      <td><?php echo $departemen->nama_departemen; ?></td>
      <td class="text-center" width="270" style="min-width:100px;">
        <button class="btn btn-warning update-dataDepartemen" data-id="<?php echo $departemen->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-departemen" data-id="<?php echo $departemen->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        <!-- <button class="btn btn-info detail-dataDepartemen" data-id="<?php //echo $departemen->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button> -->
      </td>
    </tr>
    <?php
    $no++;
  }
?>