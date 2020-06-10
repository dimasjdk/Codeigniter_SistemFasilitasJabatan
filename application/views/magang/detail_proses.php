<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">User Control</h1>
  <p class="mb-4">Detail profil peserta Magang PT. Telkom Indonesia Semarang.</a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Fix / Detail Peserta Magang</h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <form>
          <div class="card-body">
            <div class="table-responsive">
              <div style="text-align: right;" class="m-0 font-weight-bold text-primary">
                <div class="col-sm-12 col-form-label">
                  <label>Tanggal Submit</label>
                  <label >:</label>
                  <label><?= date('d F Y', $magang['date_created']); ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Nama Lengkap</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['nama']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['email']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">No. Handphone 1</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['nomor']; ?></label><br>
                  <small style="color: blue;">* Nomor yang dipakai sekarang</small>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">No. Handphone 2</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['nomor2']; ?></label><br>
                  <small style="color: red;">* Wajib nomor telkom group (jika belum punya kosongi dulu/menyusul).</small>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sekolah</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['sekolah']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jurusan</label>
                <label class="col-sm- 0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['jurusan']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tingkat</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['tingkat']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Waktu Pelaksanaan</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-3 col-form-label">
                  <label><?= date('d F Y', strtotime($magang['mulai'])); ?></label>
                </div>
                <label class="col-sm-2 col-form-label">s/d</label>
                <div class="col-sm-4">
                  <label><?= date('d F Y', strtotime($magang['akhir'])); ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kegiatan</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9">
                  <label><?=$magang['jenis']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Catatan</label>
                <label class="col-sm- 0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['tambahan']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Surat Pernyataan</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><img src="<?= base_url('assets/berkas/'.$magang['surat']);  ?>">
                    </label>
                </div>
              </div>
              <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['foto']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">BPJS</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['bpjs']; ?></label>
                </div>
              </div> 
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Unit</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['name_unit']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sub Unit</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['name_sub_unit']; ?></label>
                </div>
              </div> -->
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mentor</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['mentor']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <label><?=$magang['nik']; ?></label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <label class="col-sm-0 col-form-label">:</label>
                <div class="col-sm-9 col-form-label">
                  <?php if ($magang['keterangan'] == "Sedang Dikonfirmasi") { ?>
                    <label style="color: #ff8000;"><?=$magang['keterangan'] ?></label>
                    <?php 
                  } elseif ($magang['keterangan'] == "Diterima") { ?>
                    <label style="color: #00ff00;"><?=$magang['keterangan'] ?></label>
                    <?php
                  } elseif ($magang['keterangan'] == "Berjalan") { ?>
                    <label style="color: #0040ff;"><?=$magang['keterangan'] ?></label>
                    <?php
                  } elseif ($magang['keterangan'] == "Batal") { ?>
                    <label style="color: #ff0000;"><?=$magang['keterangan'] ?></label>
                    <?php
                  } elseif ($magang['keterangan'] == "Ditolak") { ?>
                    <label style="color: #ff0000;"><?=$magang['keterangan'] ?></label>
                    <?php
                  } ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-2 col-form-label"></div>
                <div class="col-sm-10">
                  <thead>
                    <tr>
                      <th>
                        <a href="<?= base_url(); ?>magang/proses" class="btn btn-primary">kembali</a>
                      </th>

                      <?php if($this->session->userdata('role')==='1') { ?>
                      <th>
                        <a href="<?= base_url(); ?>magang/hapusProses/<?= $magang['id']; ?>" class="btn btn-danger" onclick="return confirm('yakin?');" >Hapus</a>
                      </th>
                      <th>                                            
                        <a href="<?= base_url(); ?>magang/ubahProses/<?= $magang['id']; ?>" class="btn btn-success"> Edit Data </a>
                      </th>
                      <?php }?>
                      <!-- <th>
                        <a href="<?= base_url(); ?>magang/addMentor/<?= $magang['id']; ?>" class="btn btn-success" data-toggle="modal" data-target="#mentorModal">Tentukan Unit & Mentor</a>
                      </th> -->
                    </tr>
                  </thead>
                </div>
              </div>
            </div>
          </div>
        </form>   
            
                      
    </div>
  </div>
    <!-- End of Main Content