<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Admin Control</h1>
  <p class="mb-4">Silahkan tentukan unit & mentor untuk <strong><?=$magang['nama']; ?></strong> </a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Perlu Proses / Tentukan Mentor</h6>
    </div>

    <form method="post" action="">
      <input type="hidden" name="id" value="<?= $magang['id']; ?>">
      <div class="card-body">
        <div class="table-responsive">
          <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Nama Lengkap</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?= $magang['nama']; ?>">
              <small class="form-text text-danger"><?= form_error('nama'); ?></small>
            </div>
          </div>
          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Email</label>
              <label  class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="email" placeholder="Masukkan Email" value="<?= $magang['email']; ?>">
                <small class="form-text text-danger"><?= form_error('email'); ?></small>
                <small>* Pastikan email yang digunakan aktif</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">No. Handphone 1</label>
              <label  class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor" placeholder="Masukkan No. Handphone" value="<?= $magang['nomor']; ?>">
                <small class="form-text text-danger"><?= form_error('nomor'); ?></small>
                <small>* Nomor yang dipakai sekarang</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">No. Handphone 2</label>
              <label  class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor2" placeholder="Masukkan No. Handphone" value="<?= $magang['nomor2']; ?>">
                <small>* Wajib nomor telkom group (jika belum punya kosongi saja).</small>
              </div>
            </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sekolah</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" name="sekolah" class="form-control"  placeholder="Masukkan Asal Sekolah/Universitas" value="<?= $magang['sekolah']; ?>">
              <small class="form-text text-danger"><?= form_error('sekolah'); ?></small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jurusan</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="jurusan" placeholder="Masukkan Jurusan" value="<?= $magang['jurusan']; ?>">
              <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>
              <small>* Tambahkan keterangan jika ada penjurusan lagi. contoh: manajemen (kuangan)</small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tingkat</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="tingkat" placeholder="Masukkan Kelas/Semester" value="<?= $magang['tingkat']; ?>">
              <small class="form-text text-danger"><?= form_error('tingkat'); ?></small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Waktu Pelaksanaan</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-3">
              <input type="date" name="mulai" class="form-control" value="<?= $magang['mulai']; ?>">
              <small class="form-text text-danger"><?= form_error('mulai'); ?></small>
            </div>
            <label style="text-align: center;" class="col-sm-2 col-form-label">s/d</label>
            <div class="col-sm-3">
              <input type="date" name="akhir" class="form-control" value="<?= $magang['akhir']; ?>">
              <small class="form-text text-danger"><?= form_error('akhir'); ?></small>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Kegiatan</label>
            <label  class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <select class="custom-select" name="jenis" id="jenis">
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
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Surat Pernyataan</label>
              <label  class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="surat">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <small class="form-text text-danger"><?= form_error('surat'); ?></small>
              </div>
            </div>
            <!--<div class="form-group row">
              <label class="col-sm-2 col-form-label">Foto</label>
              <label  class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="foto">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Fc Kartu BPJS</label>
              <label  class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="bpjs">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div> -->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Informasi Tambahan</label>
              <label  class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control" name="tambahan"><?= $magang['tambahan']; ?></textarea>
                <small>* Diisi jika ada informasi tambahan</small>
              </div>
            </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Asal Unit</label>
            <label class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <select class="custom-select" name="unit" id="unit" required>
                <option>-PILIH-</option>
                <?php foreach($unit as $row):?>
                  <?php if ($row == $row->id_unit) : ?>
                  <option value="<?= $row->id_unit;?>" selected><?= $row->name_unit;?></option>
                  <?php else : ?>
                    <option value="<?= $row->id_unit;?>"><?= $row->name_unit;?></option>
                  <?php endif; ?>
                <?php endforeach;?>
              </select>
              <small class="form-text text-danger"><?= form_error('unit'); ?></small>
              </div>
            </div>
            
            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sub Unit</label>
            <label class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <select class="custom-select" name="sub" id="sub_unit">
                <option>-PILIH-</option>
              </select>
              <small class="form-text text-danger"><?= form_error('sub'); ?></small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama Lengkap Mentor</label>
              <label class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <input type="text" name="mentor" class="form-control" value="<?= $magang['mentor']; ?>" placeholder="Masukkan Nama Mentor">
                <small class="form-text text-danger"><?= form_error('mentor'); ?></small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">NIK</label>
              <label class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <input type="text" name="nik" class="form-control" value="<?= $magang['nik']; ?>" placeholder="Masukkan NIK">
                <small class="form-text text-danger"><?= form_error('nik'); ?></small>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 col-form-label">Pilih Status</div>
              <label class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-3">
                <select name="keterangan" class="form-control">
                  <?php foreach ($keterangan as $a) : ?>
                    <?php if ($a == $magang['keterangan']) : ?>
                      <option value="<?= $a; ?>" selected><?= $a; ?></option>
                      <?php else : ?>
                        <option value="<?= $a; ?>"><?= $a; ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                </div>
              </div>
                <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1" required>
                    <label class="form-check-label" for="gridCheck1">
                      Pastikan data yang anda isi sudah benar!
                    </label>
                  </div>
                </div>
              </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <label class="col-sm-0 col-form-label"></label>
                  <div class="col-sm-9">
                     <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>

    <!-- <option selected disabled>Pilih Unit/Devisi</option>
                  <option value="Bussines Planning & Performance (BPP)">Bussines Planning & Performance (BPP)</option>
                  <option value="Consumer Marketing (CM)">Consumer Marketing (CM)</option>
                  <option value="Customer Care (CC)">Customer Care (CC)</option>
                  <option value="General Affair (GA)">General Affair (GA)</option>
                  <option value="Human Capital (HC)">Human Capital (HC)</option>
                  <option value="Managed Service Operation (MSO)">Managed Service Operation (MSO)</option>
                  <option value="Payment Collection & Finance (PCF)">Payment Collection & Finance (PCF)</option>
                  <option value="Planning, Engineering & Deployment (PED)">Planning, Engineering & Deployment (PED)</option>
                  <option value="Regional Access Management (RAM)">Regional Access Management (RAM)</option>
                  <option value="Regional Enterprise, Government & Business Service (EGBIS)">Regional Enterprise, Government & Business Service (EGBIS)</option>
                  <option value="Regional Network Operation (RNO)">Regional Network Operation (RNO)</option>
                  <option value="Regional Operation Center (ROC)">Regional Operation Center (ROC)</option>
                  <option value="Regional Wholesale Service (RWS)">Regional Wholesale Service (RWS)</option>
                  <option value="Graha Sarana Duta (GSD)">Graha Sarana Duta (GSD)</option>
                  <option value="Telkom Akses (TA)">Telkom Akses (TA)</option>
                  <option value=">WITEL SEMARANG">WITEL SEMARANG</option> -->