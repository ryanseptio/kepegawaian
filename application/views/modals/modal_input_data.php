<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Input Data Penilaian</h3>

  <form id="form-input-data" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataData->id; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Data" name="nama_data" aria-describedby="sizing-addon2" value="<?php echo $dataData->nama_data; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select name="nama_aspek" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
        <?php
        foreach ($dataData as $data) {
          ?>
          <option value="" hidden>
            <?php echo $dataData->nama_aspek; ?>
          </option>
          <option value="<?php echo $data->nama_data; ?>">
            <?php echo $data->nama_data; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Penilaian" name="penilaian" aria-describedby="sizing-addon2" value="<?php echo $dataData->penilaian; ?>">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Input Data Penilaian</button>
      </div>
    </div>
  </form>
</div>