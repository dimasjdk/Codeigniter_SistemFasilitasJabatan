<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard'); ?>" class="brand-link">
      <img src="<?= base_url('assets/images/logo.png'); ?>" alt="TELKOM Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Fasteljab V.1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/images/admin.png'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION["unit"]?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('dashboard'); ?>" class="nav-link 
              <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == ''? 'active' : ''?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if($this->session->userdata('role')==='1') { ?>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('user'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Management User</p>
            </a>
          </li>
          <?php }?>
          <li class="nav-item has-treeview <?= $this->uri->segment(2) == 'kantor_div' || 
          $this->uri->segment(2) == 'non_treg' || $this->uri->segment(2) == 'witel_semarang' ||
          $this->uri->segment(2) == 'witel_solo' || $this->uri->segment(2) == 'witel_yogya' ||
          $this->uri->segment(2) == 'witel_magelang' || $this->uri->segment(2) == 'witel_pekalongan' ||
          $this->uri->segment(2) == 'witel_purwokerto' || $this->uri->segment(2) == 'add_div' || 
          $this->uri->segment(2) == 'add_non' || $this->uri->segment(2) == 'add_semarang' ||
          $this->uri->segment(2) == 'add_solo' || $this->uri->segment(2) == 'add_yogya' ||
          $this->uri->segment(2) == 'add_magelang' || $this->uri->segment(2) == 'add_pekalongan' ||
          $this->uri->segment(2) == 'add_purwokerto' || $this->uri->segment(2) == 'add_kudus' ||
          $this->uri->segment(2) == 'witel_kudus' || $this->uri->segment(2) == 'edit_div' ||
          $this->uri->segment(2) == 'edit_non' || $this->uri->segment(2) == 'edit_semarang' ||
          $this->uri->segment(2) == 'edit_solo' || $this->uri->segment(2) == 'edit_yogya' ||
          $this->uri->segment(2) == 'edit_magelang' || $this->uri->segment(2) == 'edit_pekalongan' ||
          $this->uri->segment(2) == 'edit_purwokerto' || $this->uri->segment(2) == 'edit_kudus' ||
          $this->uri->segment(2) == 'edit_all' ||
          ''
          ? 'menu-open' : ''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($this->session->userdata('role')==='1') { ?>
              <li class="nav-item">
                <a href="<?= base_url('Data_Karyawan/all_karyawan'); ?>" class="nav-link 
                  <?= $this->uri->segment(2) == 'all_karyawan' ||
                  $this->uri->segment(2) == 'add' || $this->uri->segment(2) == 'edit_all' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Karyawan DIVRE</p>
                </a>
              </li>
              <?php }?>
              <li class="nav-item">
                <a href="<?= base_url('Data_Karyawan/kantor_div'); ?>" class="nav-link 
                  <?= $this->uri->segment(2) == 'kantor_div' ||
                  $this->uri->segment(2) == 'add_div' || $this->uri->segment(2) == 'edit_div' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kantor DIV IV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Data_Karyawan/non_treg'); ?>" class="nav-link
                  <?= $this->uri->segment(2) == 'non_treg' ||
                  $this->uri->segment(2) == 'add_non' || $this->uri->segment(2) == 'edit_non' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>NON TREG IV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Data_Karyawan/witel_semarang'); ?>" class="nav-link 
                  <?= $this->uri->segment(2) == 'witel_semarang' ||
                  $this->uri->segment(2) == 'add_semarang' || $this->uri->segment(2) == 'edit_semarang' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Semarang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Data_Karyawan/witel_solo'); ?>" class="nav-link 
                  <?= $this->uri->segment(2) == 'witel_solo' ||
                  $this->uri->segment(2) == 'add_solo' || $this->uri->segment(2) == 'edit_solo' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Solo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Data_Karyawan/witel_yogya'); ?>" class="nav-link 
                  <?= $this->uri->segment(2) == 'witel_yogya' ||
                  $this->uri->segment(2) == 'add_yogya' || $this->uri->segment(2) == 'edit_yogya' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Yogyakarta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Data_Karyawan/witel_magelang'); ?>" class="nav-link 
                  <?= $this->uri->segment(2) == 'witel_magelang' ||
                  $this->uri->segment(2) == 'add_magelang' || $this->uri->segment(2) == 'edit_magelang' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Magelang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Data_Karyawan/witel_pekalongan'); ?>" class="nav-link 
                  <?= $this->uri->segment(2) == 'witel_pekalongan' ||
                  $this->uri->segment(2) == 'add_pekalongan' || $this->uri->segment(2) == 'edit_pekalongan' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Pekalongan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Data_Karyawan/witel_purwokerto'); ?>" class="nav-link 
                  <?= $this->uri->segment(2) == 'witel_purwokerto' ||
                  $this->uri->segment(2) == 'add_purwokerto' || $this->uri->segment(2) == 'edit_purwokerto' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Purwokerto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Data_Karyawan/witel_kudus'); ?>" class="nav-link 
                  <?= $this->uri->segment(2) == 'witel_kudus' ||
                  $this->uri->segment(2) == 'add_kudus' || $this->uri->segment(2) == 'edit_kudus' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Kudus</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?= $this->uri->segment(2) == 'cc_non' || 
          $this->uri->segment(2) == 'verify_non' || $this->uri->segment(2) == 'cc_semarang' ||
          $this->uri->segment(2) == 'verify_semarang' || $this->uri->segment(2) == 'cc_solo' ||
          $this->uri->segment(2) == 'verify_solo' || $this->uri->segment(2) == 'cc_yogya' ||
          $this->uri->segment(2) == 'verify_yogya' || $this->uri->segment(2) == 'cc_magelang' || 
          $this->uri->segment(2) == 'verify_magelang' || $this->uri->segment(2) == 'cc_pekalongan' ||
          $this->uri->segment(2) == 'verify_pekalongan' || $this->uri->segment(2) == 'cc_purwokerto' ||
          $this->uri->segment(2) == 'verify_purwokerto' || $this->uri->segment(2) == 'cc_kudus' ||
          $this->uri->segment(2) == 'verify_kudus' || '' ? 'menu-open' : ''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                CC Witel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('cc_witel/cc_non'); ?>" class="nav-link 
                  <?= $this->uri->segment(2) == 'cc_non' || $this->uri->segment(2) == 'verify_non' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Non TREG IV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('cc_witel/cc_semarang'); ?>" class="nav-link
                  <?= $this->uri->segment(2) == 'cc_semarang' || $this->uri->segment(2) == 'verify_semarang' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Semarang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('cc_witel/cc_solo'); ?>" class="nav-link 
                <?= $this->uri->segment(2) == 'cc_solo' || $this->uri->segment(2) == 'verify_solo' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Solo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('cc_witel/cc_yogya'); ?>" class="nav-link 
                <?= $this->uri->segment(2) == 'cc_yogya' || $this->uri->segment(2) == 'verify_yogya' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Yogyakarta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('cc_witel/cc_magelang'); ?>" class="nav-link 
                <?= $this->uri->segment(2) == 'cc_magelang' || $this->uri->segment(2) == 'verify_magelang' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Magelang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('cc_witel/cc_pekalongan'); ?>" class="nav-link 
                <?= $this->uri->segment(2) == 'cc_pekalongan' || $this->uri->segment(2) == 'verify_pekalongan' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Pekalongan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('cc_witel/cc_purwokerto'); ?>" class="nav-link 
                <?= $this->uri->segment(2) == 'cc_purwokerto' || $this->uri->segment(2) == 'verify_purwokerto' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Purwokerto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('cc_witel/cc_kudus'); ?>" class="nav-link 
                <?= $this->uri->segment(2) == 'cc_kudus' || $this->uri->segment(2) == 'verify_kudus' || '' ? 'active' : ''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Witel Kudus</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('login/logout'); ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>