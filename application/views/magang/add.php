<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Admin Control</h1>
  <p class="mb-4">Silahkan isi form dibawah untuk menambahkan data siswa/mahasiswa yang akan magang.</a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data User/Input Berkas Magang</h6>
    </div>

    <?php echo form_open_multipart('magang/add'); ?>
      <div class="card-body">
        <div class="table-responsive">
          <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Nama Lengkap</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
              <small class="form-text text-danger"><?= form_error('nama'); ?></small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="email" placeholder="Masukkan Email">
              <small class="form-text text-danger"><?= form_error('email'); ?></small>
              <small>* Pastikan email yang digunakan aktif</small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No. Handphone 1</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nomor" placeholder="Masukkan No. Handphone">
              <small class="form-text text-danger"><?= form_error('nomor'); ?></small>
              <small>* Nomor yang dipakai sekarang</small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No. Handphone 2</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nomor2" placeholder="Masukkan No. Handphone">
              <small class="form-text text-danger"><?= form_error('nomor'); ?></small>
              <small>* Wajib nomor telkom group (jika belum punya kosongi saja).</small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sekolah</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" name="sekolah" class="form-control"  placeholder="Masukkan Asal Sekolah/Universitas">
              <small class="form-text text-danger"><?= form_error('sekolah'); ?></small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jurusan</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="jurusan" placeholder="Masukkan Jurusan">
              <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>
              <small>* Tambahkan keterangan jika ada penjurusan lagi. contoh: manajemen (kuangan)</small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tingkat</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="tingkat" placeholder="Masukkan Kelas/Semester">
              <small class="form-text text-danger"><?= form_error('tingkat'); ?></small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Waktu Pelaksanaan</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-3">
              <input type="date" data-format="dd-MM-yyyy" name="mulai" id="tgl" class="form-control">
              <small class="form-text text-danger"><?= form_error('mulai'); ?></small>
            </div>
            <label style="text-align: center;" class="col-sm-2 col-form-label">s/d</label>
            <div class="col-sm-3">
              <input type="date" data-format="dd-MM-yyyy" name="akhir" id="tgl" class="form-control">
              <small class="form-text text-danger"><?= form_error('akhir'); ?></small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Kegiatan</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <select class="custom-select" name="jenis">
                <?php foreach ($jenis as $j) : ?>
                  <?php if ($j == $magang['jenis']) : ?>
                    <option value="<?= $j; ?>" selected><?= $j; ?></option>
                    <?php else : ?>
                      <option value="<?= $j; ?>"><?= $j; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
              </select>
              <small class="form-text text-danger"><?= form_error('jenis'); ?></small>
            </div>
          </div>
          <input type="hidden" name="keterangan" value="Sedang Dikonfirmasi">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Informasi Tambahan</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <textarea type="text" class="form-control" name="tambahan" placeholder="Masukkan Informasi Tambahan"></textarea>
              <small>* Diisi jika ada informasi tambahan</small>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                  Pastikan data yang anda isi sudah benar!
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
              <button type="submit" name="add" class="btn btn-primary">Kirim</button>
            </div>
          </div>
        </div>
      </div>
    <?php echo form_close(); ?>

    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
</div>

