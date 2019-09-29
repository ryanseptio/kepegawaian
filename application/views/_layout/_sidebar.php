<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <?php
              if($userdata->username == "admin"){
          ?>
      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      <ul class="sidebar-menu">
        <li <?php if ($page == 'jabatan' || $page == 'promosi' || $page == 'departemen' || $page == 'kota' || $page == 'kriteria') {echo 'class="active"';} ?>>
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Master Data</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
          <ul class="treeview-menu">
      <li <?php if ($page == 'jabatan') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Jabatan'); ?>">
          <i class="fa fa-briefcase"></i>
          <span>Data Jabatan</span>
        </a>
      </li>
      <li <?php if ($page == 'departemen') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Departemen'); ?>">
          <i class="fa fa-briefcase"></i>
          <span>Data Departemen</span>
        </a>
      </li>
      <li <?php if ($page == 'kota') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kota'); ?>">
          <i class="fa fa-location-arrow"></i>
          <span>Data Kota</span>
        </a>
      </li>
      </ul>
        </li>
      </ul>

            <ul class="sidebar-menu">
        <li <?php if($page == 'pegawai' || $page == 'kepegawaian') {echo 'class="active"';} ?>>
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Pegawai</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
      <ul class="treeview-menu">
        <li <?php if ($page == 'pegawai') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pegawai'); ?>">
          <i class="fa fa-user"></i>
          <span>Data Pegawai</span>
        </a>
      </li> 
      <li <?php if ($page == 'kepegawaian') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kepegawaian'); ?>">
          <i class="fa fa-hdd-o"></i>
          <span>E- Leave</span>
        </a>
      </li>
      <li <?php if ($page == 'kepegawaian') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kepegawaian'); ?>">
          <i class="fa fa-hdd-o"></i>
          <span>Cuti</span>
        </a>
      </li>
      </ul>
     
      <?php
              }if($userdata->departemen == "HRD"){
          ?>
      <ul class="sidebar-menu">
        <li <?php if ($page == 'absensi' || $page == 'kepegawaian') {echo 'class="active"';} ?>>
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Pegawai</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
      <ul class="treeview-menu">
      <li <?php if ($page == 'absensi') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Absensi'); ?>">
          <i class="fa fa-user"></i>
          <span>Data Absensi</span>
        </a>
      </li> 
      <li <?php if ($page == 'kepegawaian') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kepegawaian'); ?>">
          <i class="fa fa-hdd-o"></i>
          <span>E- Leave</span>
        </a>
      </li>
      <li <?php if ($page == 'kepegawaian') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kepegawaian'); ?>">
          <i class="fa fa-hdd-o"></i>
          <span>Cuti</span>
        </a>
      </li>
      </ul>
        </li>
      </ul>
        </li>
      </ul>


          <?php
              }if($userdata->username !== "admin" && $userdata->departemen !== "HRD"){
          ?>
      <ul class="sidebar-menu">
        <li <?php if ($page == 'kepegawaian') {echo 'class="active"';} ?>>
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Kepegawaian</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
          <ul class="treeview-menu">
      <li <?php if ($page == 'kepegawaian') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kepegawaian'); ?>">
          <i class="fa fa-hdd-o"></i>
          <span>E- Leave</span>
        </a>
      </li>
      <li <?php if ($page == 'kepegawaian') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kepegawaian'); ?>">
          <i class="fa fa-hdd-o"></i>
          <span>Cuti</span>
        </a>
      </li>
      </ul>
        </li>
      </ul>
        </li>
      </ul>
          <?php
            }
          ?>  
 
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>