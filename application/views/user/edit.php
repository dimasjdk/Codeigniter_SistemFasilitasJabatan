<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Unit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Data Unit</li>
            <li class="breadcrumb-item active">Form Tambah Unit</li>
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
            <h6 class="card-title">Tambah Unit Akses</div>
            </div>

            <!-- form start -->
            <form role="form" method="post" action="">
              <input type="hidden" name="id" value="<?= $user['id']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label>Unit</label>
                      <select class="custom-select" disabled>
                        <option value="<?= $user['role']; ?>">
                          <?php if ($user['role'] == "1") { ?>
                        ADMIN
                        <?php 
                      } elseif ($user['role'] == "2") { ?>
                        HR Kantor Div IV
                        <?php
                      } elseif ($user['role'] == "3") { ?>
                        HR Non TREG IV
                        <?php
                      } elseif ($user['role'] == "4") { ?>
                        HR Witel Semarang
                        <?php
                      } elseif ($user['role'] == "5") { ?>
                        HR Witel Solo
                        <?php
                      } elseif ($user['role'] == "6") { ?>
                        HR Witel Yogyakarta
                        <?php
                      } elseif ($user['role'] == "7") { ?>
                        HR Witel Magelang
                        <?php
                      } elseif ($user['role'] == "8") { ?>
                        HR Witel Pekalongan
                        <?php
                      } elseif ($user['role'] == "9") { ?>
                        HR Witel Purwokerto
                        <?php
                      } elseif ($user['role'] == "10") { ?>
                        HR Witel Kudus
                        <?php
                      } elseif ($user['role'] == "11") { ?>
                        CC Witel Non TREG IV
                        <?php
                      } elseif ($user['role'] == "12") { ?>
                        CC Witel Semarang
                        <?php
                      } elseif ($user['role'] == "13") { ?>
                        Witel Semarang
                        <?php
                      } elseif ($user['role'] == "4") { ?>
                        Witel Semarang
                        <?php
                      } elseif ($user['role'] == "4") { ?>
                        Witel Semarang
                        <?php
                      } elseif ($user['role'] == "4") { ?>
                        Witel Semarang
                        <?php
                      } elseif ($user['role'] == "4") { ?>
                        Witel Semarang
                        <?php
                      } elseif ($user['role'] == "4") { ?>
                        Witel Semarang
                        <?php
                      } ?>
                        </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-12">
                        <label>Nama</label>
                        <input type="text" name="unit" class="form-control" value="<?= $user['unit']; ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('unit'); ?></small>
                      </div>
                    </div>
                  </div>             
                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('username'); ?></small>
                      </div>
                      <div class="col-6">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" value="<?= $user['password']; ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('password'); ?></small>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
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
    <!-- /.control-sidebar -->




