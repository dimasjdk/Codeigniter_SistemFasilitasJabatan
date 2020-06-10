
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
            <form role="form" method="post" action="<?= base_url('user/add '); ?>">
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label>Unit</label>
                      <select id="role" class="custom-select" name="role" required>
                        <option value="" required>-- Pilih Unit --</option>
                        <option value="2">Kantor DIV IV</option>
                        <option value="3">Non TREG IV</option>
                        <option value="4">Witel Semarang</option>
                        <option value="5">Witel Solo</option>
                        <option value="6">Witel Yogyakarta</option>
                        <option value="7">Witel Magelang</option>
                        <option value="8">Witel Pekalongan</option>
                        <option value="9">Witel Purwokerto</option>
                        <option value="10">Witel Kudus</option>
                      </select>
                      <small class="form-text text-danger"><?= form_error('role'); ?></small>
                    </div>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                      <label>Nama</label>
                      <input type="text" name="unit" class="form-control" placeholder="Masukkan Username" autocomplete="off">
                      <small class="form-text text-danger"><?= form_error('unit'); ?></small>
                    </div>
                  </div>
                </div>               
                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Masukkan Username" autocomplete="off">
                      <small class="form-text text-danger"><?= form_error('username'); ?></small>
                    </div>
                    <div class="col-6">
                      <label>Password</label>
                      <input type="text" name="password" class="form-control" placeholder="Masukkan Password" autocomplete="off">
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<script type="text/javascript">
 $(document).ready(function() {
     $('#role').select2({
      placeholder: 'Pilih Provinsi',
      allowClear: true
     });
 });
</script>




