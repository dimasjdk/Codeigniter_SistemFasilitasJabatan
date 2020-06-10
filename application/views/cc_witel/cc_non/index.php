<style type="text/css">
  #ada{
    width: 50%;
    background-color: #58F514;
    border-radius: 60px;
    shape-margin: 1em;
    text-align: center;
  }
  #tidak{
    width: 50%;
    background-color: #FDB40D;
    border-radius: 60px;
    shape-margin: 1em;
    text-align: center;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Fasteljab</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Fasteljab</li>
            <li class="breadcrumb-item active">CC Witel Non TREG IV</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->

      <div class="card card-danger">
        <div class="card-header py-3">
          <div class="d-sm-flex align-items-center justify-content-between">
            <h6 class="card-title">Data Fasteljab Witel Non TREG IV</h6>
            <?php if($this->session->userdata('role')==='1' || $this->session->userdata('role')==='11') { ?>
            <a href="<?= base_url('Export/exportCcNonTreg'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Excel</a>
            <?php }?>
          </div>
        </div>
        <?php if($this->session->flashdata('flash_data')) :?>
          <div class="card-body">    
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Karyawan <strong>berhasil</strong> <?= $this->session->flashdata('flash_data'); ?>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        <?php endif; ?>

        <div class="card-body">
          <div class="table-responsive">
            <table style="text-align: center;" id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nik</th>
                  <th>Nama</th>
                  <th>Band Posisi</th>
                  <th>Jabatan</th>
                  <th>Nomor Fasteljab</th>
                  <th>Alat Produksi</th>
                  <th>NIK di Data Pelanggan</th>
                  <th>Segmen/Paket</th>
                  <th>Hak Pagu</th>
                  <th>Realisasi Pagu</th>
                  <th>Keterangan</th>
                  <?php if($this->session->userdata('role')==='1' || $this->session->userdata('role')==='11') { ?>
                    <th>Action</th>
                  <?php }?>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($witel as $b) : ?>
                  <tr>
                    <td><?= $b['nik'] ?></td>
                    <td><?= $b['nama'] ?></td>
                    <td><?= $b['posisi'] ?></td>
                    <td><?= $b['jabatan'] ?></td>
                    <td><?= $b['no_telp'] ?><br><?= $b['no_internet'] ?></td>
                    <td>
                      <?php if (!$b['alpro']) { ?>
                        <label class="btn btn-warning btn-xs">On Check</label>
                        <?php 
                      } elseif ($b['alpro'] == "On Check") { ?>
                        <label class="btn btn-warning btn-xs"><?=$b['alpro'] ?></label>
                        <?php
                      } elseif ($b['alpro'] == "FO") { ?>
                        <label><?=$b['alpro'] ?></label>
                        <?php
                      } elseif ($b['alpro'] == "Non FO") { ?>
                        <label><?=$b['alpro'] ?></label>
                        <?php
                      } ?>
                    </td>
                    <td>
                      <?php if (!$b['isiska']) { ?>
                        <label class="btn btn-warning btn-xs">On Check</label>
                        <?php 
                      } elseif ($b['isiska'] == "On Check") { ?>
                        <label class="btn btn-warning btn-xs"><?=$b['isiska'] ?></label>
                        <?php
                      } elseif ($b['isiska'] == "Sudah Ada") { ?>
                        <label class="btn btn-success btn-xs"><?=$b['isiska'] ?></label>
                        <?php
                      } elseif ($b['isiska'] == "Tidak Perlu Ada") { ?>
                        <label><?=$b['isiska'] ?></label>
                        <?php
                      } elseif ($b['isiska'] == "Belum Ada") { ?>
                        <label class="btn btn-danger btn-xs"><?=$b['isiska'] ?></label>
                        <?php
                      } ?>
                    </td>
                    <td>
                      <?php if (!$b['segmen']) { ?>
                        <label class="btn btn-warning btn-xs">On Check</label>
                        <?php 
                      } elseif ($b['segmen'] == "On Check") { ?>
                        <label class="btn btn-warning btn-xs"><?=$b['segmen'] ?></label>
                        <?php
                      } elseif ($b['segmen'] == "Dinastel Rumah") { ?>
                        <label><?=$b['segmen'] ?></label>
                        <?php
                      } elseif ($b['segmen'] == "Reguler(Berbayar)") { ?>
                        <label><?=$b['segmen'] ?></label>
                        <?php
                      } ?>
                    </td>
                    <td>
                      <div class="dropdown">
                        <button 
                        <?php if ($b['pagu_telp'] == "0" || $b['non_fo'] == "0" || $b['fo'] == "0" || $b['kuota'] == "0" || $b['usee_tv'] == "0") { ?>
                         class="btn btn-danger dropdown-toggle"
                         <?php 
                       } elseif ($b['non_fo'] !== "0") { ?>
                        class="btn btn-default dropdown-toggle"
                         <?php
                       } ?>
                       id="menu1" type="button" data-toggle="dropdown">
                       Lihat Hak Pagu
                          <span class="caret"></span></button>
                         <ul style="text-align: center;" class="dropdown-menu" role="menu">
                            <li role="presentation"><b>Telp Rumah</b></li>
                            <li role="presentation"><?= $b['pagu_telp'] ?></li>
                            <hr>
                            <li role="presentation"><b>Non FO</b> | <b>FO (Kuota)</b></li>
                            <li role="presentation"><?= $b['non_fo'] ?> | <?= $b['fo'] ?>  (<?= $b['kuota'] ?>)</li>
                            <hr>
                            <li role="presentation"><b>Usee TV</b></li>
                            <li role="presentation"><?= $b['usee_tv'] ?></li>
                          </ul>
                        </div>
                      </td>
                      <td>
                        <?php if ($b['status'] == "On Check") { ?>
                          <label class="btn btn-warning btn-xs"><?= $b['status'] ?></label>
                          <?php 
                        } elseif ($b['status'] == "Sudah Sesuai") { ?>
                          <label class="btn btn-success btn-xs"><?=$b['status'] ?></label>
                          <?php
                        } elseif ($b['status'] == "Perlu Disesuaikan") { ?>
                          <label class="btn btn-danger btn-xs"><?=$b['status'] ?></label>
                          <?php
                        } ?>
                      </td>
                      <td>
                        <?= $b['keterangan'] ?>
                      </td>
                      <?php if($this->session->userdata('role')==='1' || $this->session->userdata('role')==='11') { ?>
                        <td>
                          <a href="<?= base_url(); ?>cc_witel/verify_non/<?= $b['id']; ?>" class="btn-primary btn-sm">Verify</a>
                        </td>
                      <?php }?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>





