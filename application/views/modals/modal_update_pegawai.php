<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pegawai</h3>
      <form method="POST" id="form-update-pegawai">
        <input type="hidden" name="id" value="<?php echo $dataPegawai->id_pegawai; ?>">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->nama_pegawai; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <input type="text" class="form-control" placeholder="NPP" name="npp" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->npp; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="Nomor Telepon" name="telp" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->telp; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-home"></i>
          </span>
          <select name="kota" class="form-control select2"  aria-describedby="sizing-addon2"  style="width: 100%">
            <?php
            foreach ($dataKota as $kota) {
              ?>
              <option value="<?php echo $kota->id; ?>" <?php if($kota->id == $dataPegawai->id_kota){echo "selected='selected'";} ?>><?php echo $kota->nama; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="input-group form-group" style="display: inline-block;">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-tag"></i>
          </span>
          <span class="input-group-addon">
              <input type="radio" name="jk" value="1" id="laki" class="minimal" <?php if($dataPegawai->id_kelamin == 1){echo "checked='checked'";} ?>>
          <label for="laki">Laki-laki</label>
            </span>
            <span class="input-group-addon">
              <input type="radio" name="jk" value="2" id="perempuan" class="minimal" <?php if($dataPegawai->id_kelamin == 2){echo "checked='checked'";} ?>> 
          <label for="perempuan">Perempuan</label>
            </span>
        </div>
         <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <select name="departemen" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
            <?php
            foreach ($dataDepartemen as $departemen) {
              ?>
              <option value="<?php echo $departemen->nama_departemen; ?>" <?php if($departemen->nama_departemen == $dataPegawai->departemen){echo "selected='selected'";} ?>><?php echo $departemen->nama_departemen; ?></option>
              <?php
            }
            ?>
          </select>
          </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-briefcase"></i>
          </span>
          <select name="jabatan" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
            <?php
            foreach ($dataJabatan as $jabatan) {
              ?>
              <option value="<?php echo $jabatan->id; ?>" <?php if($jabatan->id == $dataPegawai->id_jabatan){echo "selected='selected'";} ?>><?php echo $jabatan->nama; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <!-- <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <input type="number" class="form-control" placeholder="Absensi Pegawai" name="absensi" aria-describedby="sizing-addon2" value="<?php //echo $dataPegawai->absensi; ?>" >
        </div> -->
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <input type="text" class="form-control" placeholder="Username" name="username" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->username; ?>" readonly>
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <input type="password" class="form-control" placeholder="Password Again" name="password" aria-describedby="sizing-addon2" value="" required="">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-briefcase"></i>
          </span>
          <select name="status_penilaian" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
              <option value="<?php echo $dataPegawai->status_penilaian; ?>" hidden="">
              <?php echo $dataPegawai->status_penilaian; ?>
              </option>
              <option value="Aktif">
              Aktif
              </option>
              <option value="Tidak Aktif">
              Tidak Aktif
              </option>
          </select>
        </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>