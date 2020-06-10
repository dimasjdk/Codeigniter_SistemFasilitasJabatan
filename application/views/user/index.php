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
  #body1{
    width: 100%;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Management User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Management User</li>
            <li class="breadcrumb-item active">Users</li>
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
            <h6 class="card-title">Data User &nbsp;
                <a href="<?= base_url('user/add'); ?>" class="btn btn-warning btn-sm">Tambah User</a>
            </h6>
          </div>
        </div>
        <?php if($this->session->flashdata('flash_data')) :?>
          <div class="card-body">    
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data User <strong>berhasil</strong> <?= $this->session->flashdata('flash_user'); ?>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        <?php endif; ?>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Unit</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $no= 1; 
                
                foreach ($user as $b) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['unit'] ?></td>
                    
                    <td>
                      <?php if ($b['role'] == "1") { ?>
                        ADMIN
                        <?php 
                      } elseif ($b['role'] == "2") { ?>
                        HR Kantor Div IV
                        <?php
                      } elseif ($b['role'] == "3") { ?>
                        HR Non TREG IV
                        <?php
                      } elseif ($b['role'] == "4") { ?>
                        HR Witel Semarang
                        <?php
                      } elseif ($b['role'] == "5") { ?>
                        HR Witel Solo
                        <?php
                      } elseif ($b['role'] == "6") { ?>
                        HR Witel Yogyakarta
                        <?php
                      } elseif ($b['role'] == "7") { ?>
                        HR Witel Magelang
                        <?php
                      } elseif ($b['role'] == "8") { ?>
                        HR Witel Pekalongan
                        <?php
                      } elseif ($b['role'] == "9") { ?>
                        HR Witel Purwokerto
                        <?php
                      } elseif ($b['role'] == "10") { ?>
                        HR Witel Kudus
                        <?php
                      } elseif ($b['role'] == "11") { ?>
                        CC Witel Non TREG IV
                        <?php
                      } elseif ($b['role'] == "12") { ?>
                        CC Witel Semarang
                        <?php
                      } elseif ($b['role'] == "13") { ?>
                        Witel Semarang
                        <?php
                      } elseif ($b['role'] == "4") { ?>
                        Witel Semarang
                        <?php
                      } elseif ($b['role'] == "4") { ?>
                        Witel Semarang
                        <?php
                      } elseif ($b['role'] == "4") { ?>
                        Witel Semarang
                        <?php
                      } elseif ($b['role'] == "4") { ?>
                        Witel Semarang
                        <?php
                      } elseif ($b['role'] == "4") { ?>
                        Witel Semarang
                        <?php
                      } ?>
                    </td>
                    <td><?= $b['username'] ?></td>
                    <td><?= $b['password'] ?></td>
                    <td>
                      <!-- <button type="button" class="btn-primary btn-xs" data-toggle="modal" data-target="#modal-sm">Maintenance</button> -->

                      <a href="<?= base_url(); ?>user/edit/<?= $b['id']; ?>" class="btn-primary btn-xs">Edit</a>
                        <a href="<?= base_url(); ?>user/hapus/<?= $b['id']; ?>" class="btn-danger btn-xs" onclick="return confirm('yakin?');">Hapus</a>
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
                </table>
              </div>
            </div>
          </div>

        </section>





