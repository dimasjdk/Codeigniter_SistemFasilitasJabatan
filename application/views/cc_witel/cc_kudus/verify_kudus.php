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
            <li class="breadcrumb-item active">Data Fasteljab</li>
            <li class="breadcrumb-item active">Form Checking</li>
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
            <h6 class="card-title">Form Persetujuan Fasteljab CC Witel Kudus</div>
            </div>

            <!-- form start -->
            <form role="form" method="post" action="">
              <input type="hidden" name="id" value="<?= $witel['id']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-4">
                      <label>NIK</label>
                      <input type="text" name="nik" class="form-control" value="<?= $witel['nik']; ?>" disabled>
                      
                    </div>
                    <div class="col-8">
                      <label>Nama Karyawan</label>
                      <input type="text" name="nama" class="form-control" value="<?= $witel['nama']; ?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label>Band Posisi</label>
                      <select class="custom-select" name="posisi" disabled>
                        <option disabled>-- Pilih Posisi --</option>
                        <?php foreach ($bandposisi as $a) : ?>
                          <?php if ($a == $witel['posisi']) : ?>
                            <option value="<?= $a; ?>" selected><?= $a; ?></option>
                            <?php else : ?>
                              <option value="<?= $a; ?>"><?= $a; ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-6">
                        <label>Jabatan</label>
                        <select class="custom-select" name="jabatan" disabled>
                          <option disabled>-- Pilih Jabatan --</option>
                          <?php foreach ($jabatan as $b) : ?>
                            <?php if ($b == $witel['jabatan']) : ?>
                              <option value="<?= $b; ?>" selected><?= $b; ?></option>
                              <?php else : ?>
                                <option value="<?= $b; ?>"><?= $b; ?></option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                          <label>Lokasi Kerja</label>
                          <select class="custom-select" name="lok_kerja" disabled>
                              <option disabled>-- Pilih Lokasi Fasteljab --</option>
                              <?php foreach ($lok_kerja as $h) : ?>
                                <?php if ($h == $witel['lok_kerja']) : ?>
                                  <option value="<?= $h; ?>" selected><?= $h; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $h; ?>"><?= $h; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                        </div>                          
                        <div class="col-6">
                          <label>Lokasi Fasteljab</label>
                          <select class="custom-select" name="lok_fasteljab" disabled>
                              <option disabled>-- Pilih Lokasi Fasteljab --</option>
                              <?php foreach ($lok_fasteljab as $h) : ?>
                                <?php if ($h == $witel['lok_fasteljab']) : ?>
                                  <option value="<?= $h; ?>" selected><?= $h; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $h; ?>"><?= $h; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                          <label>Pagu Telp Rumah</label>
                          <select class="custom-select" name="pagu_telp" disabled>
                            <option disabled>-- Pilih Paket --</option>
                            <?php foreach ($pagu_telp as $c) : ?>
                              <?php if ($c == $witel['pagu_telp']) : ?>
                                <option value="<?= $c; ?>" selected><?= $c; ?></option>
                                <?php else : ?>
                                  <option value="<?= $c; ?>"><?= $c; ?></option>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-3">
                            <label>Pagu Internet Non Fo</label>
                            <select class="custom-select" name="non_fo" disabled>
                              <option disabled>-- Pilih Paket --</option>
                              <?php foreach ($non_fo as $d) : ?>
                                <?php if ($d == $witel['non_fo']) : ?>
                                  <option value="<?= $d; ?>" selected><?= $d; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $d; ?>"><?= $d; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="col-3">
                            <label>Pagu Internet Fo (Speed)</label>
                            <select class="custom-select" name="fo" disabled>
                              <option disabled>-- Pilih Paket --</option>
                              <?php foreach ($fo as $e) : ?>
                                <?php if ($e == $witel['fo']) : ?>
                                  <option value="<?= $e; ?>" selected><?= $e; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $e; ?>"><?= $e; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="col-3">
                            <label>Pagu Internet FO (Kuota)</label>
                            <select class="custom-select" name="kuota" disabled>
                              <option disabled>-- Pilih Kuota --</option>
                              <?php foreach ($kuota as $f) : ?>
                                <?php if ($f == $witel['kuota']) : ?>
                                  <option value="<?= $f; ?>" selected><?= $f; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $f; ?>"><?= $f; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-4">
                            <label>Pagu Usee Tv</label>
                            <select class="custom-select" name="usee_tv" disabled>
                              <option disabled>-- Pilih Jumlah Channel --</option>
                              <?php foreach ($usee_tv as $g) : ?>
                                <?php if ($g == $witel['usee_tv']) : ?>
                                  <option value="<?= $g; ?>" selected><?= $g; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $g; ?>"><?= $g; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="col-4">
                              <label>No. Internet/Indihome</label>
                              <input type="text" name="no_internet" class="form-control" value="<?= $witel['no_internet']; ?>" disabled>
                            </div>
                            <div class="col-4">
                              <label>No. Telp Rumah</label>
                              <input type="text" name="no_telp" class="form-control" value="<?= $witel['no_telp']; ?>" disabled>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-4">
                              <label>Alpro</label>
                              <select class="custom-select" name="alpro">
                              <option disabled>-- Pilih --</option>
                              <?php foreach ($alpro as $g) : ?>
                                <?php if ($g == $witel['alpro']) : ?>
                                  <option value="<?= $g; ?>" selected><?= $g; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $g; ?>"><?= $g; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                              <small class="form-text text-danger"><?= form_error('alpro'); ?></small>
                            </div>
                            <div class="col-4">
                              <label>Segmen/Paket</label>
                              <select class="custom-select" name="segmen">
                              <option disabled>-- Pilih --</option>
                              <?php foreach ($segmen as $g) : ?>
                                <?php if ($g == $witel['segmen']) : ?>
                                  <option value="<?= $g; ?>" selected><?= $g; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $g; ?>"><?= $g; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                              <small class="form-text text-danger"><?= form_error('segmen'); ?></small>
                            </div>
                            <div class="col-4">
                              <label>Nik di Data Pelanggan</label>
                              <select class="custom-select" name="isiska">
                              <option disabled>-- Pilih --</option>
                              <?php foreach ($isiska as $g) : ?>
                                <?php if ($g == $witel['isiska']) : ?>
                                  <option value="<?= $g; ?>" selected><?= $g; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $g; ?>"><?= $g; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                              <small class="form-text text-danger"><?= form_error('status'); ?></small>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-4">
                              <label>Realisasi Pagu</label>
                              <select class="custom-select" name="status">
                              <option disabled>-- Pilih Status --</option>
                              <?php foreach ($status as $g) : ?>
                                <?php if ($g == $witel['status']) : ?>
                                  <option value="<?= $g; ?>" selected><?= $g; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $g; ?>"><?= $g; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                              <small class="form-text text-danger"><?= form_error('status'); ?></small>
                            </div>
                            <div class="col-4">
                              <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="3" placeholder="Enter ..." ><?= $witel['keterangan']; ?></textarea>
                              </div>
                                
                              
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




