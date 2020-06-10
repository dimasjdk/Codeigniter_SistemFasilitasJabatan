<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Karyawan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Data Karyawan</li>
            <li class="breadcrumb-item active">Form Edit</li>
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
            <h6 class="card-title">Edit Data Karyawan Witel Yogyakarta</div>
            </div>

            <!-- form start -->
            <form role="form" method="post" action="">
              <input type="hidden" name="id" value="<?= $karyawan['id']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-4">
                      <label>NIK</label>
                      <input type="text" name="nik" class="form-control" value="<?= $karyawan['nik']; ?>" disabled>
                      
                    </div>
                    <div class="col-8">
                      <label>Nama Karyawan</label>
                      <input type="text" name="nama" class="form-control" value="<?= $karyawan['nama']; ?>">
                      <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label>Band Posisi</label>
                      <select class="custom-select" name="posisi">
                        <option disabled>-- Pilih Posisi --</option>
                        <?php foreach ($bandposisi as $a) : ?>
                          <?php if ($a == $karyawan['posisi']) : ?>
                            <option value="<?= $a; ?>" selected><?= $a; ?></option>
                            <?php else : ?>
                              <option value="<?= $a; ?>"><?= $a; ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('posisi'); ?></small>
                      </div>
                      <div class="col-6">
                        <label>Jabatan</label>
                        <select class="custom-select" name="jabatan">
                          <option disabled>-- Pilih Jabatan --</option>
                          <?php foreach ($jabatan as $b) : ?>
                            <?php if ($b == $karyawan['jabatan']) : ?>
                              <option value="<?= $b; ?>" selected><?= $b; ?></option>
                              <?php else : ?>
                                <option value="<?= $b; ?>"><?= $b; ?></option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                          <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label>Lokasi Kerja</label>
                          <select class="custom-select" name="lok_kerja">
                            <option disabled>-- Pilih Lokasi Fasteljab --</option>
                            <?php foreach ($lok_kerja as $h) : ?>
                              <?php if ($h == $karyawan['lok_kerja']) : ?>
                                <option value="<?= $h; ?>" selected><?= $h; ?></option>
                                <?php else : ?>
                                  <option value="<?= $h; ?>"><?= $h; ?></option>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('lok_kerja'); ?></small>
                          </div>                          
                          <div class="col-6">
                            <label>Lokasi Fasteljab</label>
                            <select class="custom-select" name="lok_fasteljab">
                              <option disabled>-- Pilih Lokasi Fasteljab --</option>
                              <?php foreach ($lok_fasteljab as $h) : ?>
                                <?php if ($h == $karyawan['lok_fasteljab']) : ?>
                                  <option value="<?= $h; ?>" selected><?= $h; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $h; ?>"><?= $h; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                              <small class="form-text text-danger"><?= form_error('lok_fasteljab'); ?></small>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-3">
                              <label>Pagu Telp Rumah</label>
                              <select class="custom-select" name="pagu_telp">
                                <option disabled>-- Pilih Paket --</option>
                                <?php foreach ($pagu_telp as $c) : ?>
                                  <?php if ($c == $karyawan['pagu_telp']) : ?>
                                    <option value="<?= $c; ?>" selected><?= $c; ?></option>
                                    <?php else : ?>
                                      <option value="<?= $c; ?>"><?= $c; ?></option>
                                    <?php endif; ?>
                                  <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('pagu_telp'); ?></small>
                              </div>
                              <div class="col-3">
                                <label>Pagu Internet Non Fo</label>
                                <select class="custom-select" name="non_fo">
                                  <option disabled>-- Pilih Paket --</option>
                                  <?php foreach ($non_fo as $d) : ?>
                                    <?php if ($d == $karyawan['non_fo']) : ?>
                                      <option value="<?= $d; ?>" selected><?= $d; ?></option>
                                      <?php else : ?>
                                        <option value="<?= $d; ?>"><?= $d; ?></option>
                                      <?php endif; ?>
                                    <?php endforeach; ?>
                                  </select>
                                  <small class="form-text text-danger"><?= form_error('non_fo'); ?></small>
                                </div>
                                <div class="col-3">
                                  <label>Pagu Internet Fo (Speed)</label>
                                  <select class="custom-select" name="fo">
                                    <option disabled>-- Pilih Paket --</option>
                                    <?php foreach ($fo as $e) : ?>
                                      <?php if ($e == $karyawan['fo']) : ?>
                                        <option value="<?= $e; ?>" selected><?= $e; ?></option>
                                        <?php else : ?>
                                          <option value="<?= $e; ?>"><?= $e; ?></option>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('fo'); ?></small>
                                  </div>
                                  <div class="col-3">
                                    <label>Pagu Internet FO (Kuota)</label>
                                    <select class="custom-select" name="kuota">
                                      <option disabled>-- Pilih Kuota --</option>
                                      <?php foreach ($kuota as $f) : ?>
                                        <?php if ($f == $karyawan['kuota']) : ?>
                                          <option value="<?= $f; ?>" selected><?= $f; ?></option>
                                          <?php else : ?>
                                            <option value="<?= $f; ?>"><?= $f; ?></option>
                                          <?php endif; ?>
                                        <?php endforeach; ?>
                                      </select>
                                      <small class="form-text text-danger"><?= form_error('kuota'); ?></small>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-4">
                                      <label>Pagu Usee Tv</label>
                                      <select class="custom-select" name="usee_tv">
                                        <option disabled>-- Pilih Jumlah Channel --</option>
                                        <?php foreach ($usee_tv as $g) : ?>
                                          <?php if ($g == $karyawan['usee_tv']) : ?>
                                            <option value="<?= $g; ?>" selected><?= $g; ?></option>
                                            <?php else : ?>
                                              <option value="<?= $g; ?>"><?= $g; ?></option>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('usee_tv'); ?></small>
                                      </div>
                                      <div class="col-4">
                                        <label>No. Internet/Indihome</label>
                                        <input type="text" name="no_internet" class="form-control" value="<?= $karyawan['no_internet']; ?>">
                                        <small class="form-text text-danger"><?= form_error('no_internet'); ?></small>
                                      </div>
                                      <div class="col-4">
                                        <label>No. Telp Rumah</label>
                                        <input type="text" name="no_telp" class="form-control" value="<?= $karyawan['no_telp']; ?>">
                                        <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" required>
                                    <label class="form-check-label" for="exampleCheck1">Pastikan semua data diisi dengan benar!</label>
                                  </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                  <button type="submit" class="btn btn-danger">Simpan</button>
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




