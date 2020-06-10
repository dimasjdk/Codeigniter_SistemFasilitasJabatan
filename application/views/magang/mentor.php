<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">User Control</h1>
  <p class="mb-4">Silahkan tentukan unit & mentor yang anda inginkan.</a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">On Proccess / Tentukan Mentor</h6>
    </div>

    <form method="post" action="">
      <input type="hidden" name="id" value="<?= $magang['id']; ?>">
      <div class="card-body">
        <div class="table-responsive">
         
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Pilih Unit</label>
              <label class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <select class="custom-select" name="unit">
                  <?php foreach ($unit as $k) : ?>
                  <?php if ($k == $magang['unit']) : ?>
                    <option value="<?= $k; ?>" selected><?= $k; ?></option>
                    <?php else : ?>
                      <option value="<?= $k; ?>"><?= $k; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('unit'); ?></small>
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
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
                </div>
              </div>
            </div>
            <!-- <div class="form-group row">
              <label class="col-sm-2 col-form-label">Pilih Unit</label>
              <label class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <select class="custom-select" name="unit">
                  <?php foreach ($unit as $k) : ?>
                  <?php if ($k == $magang['unit']) : ?>
                    <option value="<?= $k; ?>" selected><?= $k; ?></option>
                    <?php else : ?>
                      <option value="<?= $k; ?>"><?= $k; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('unit'); ?></small>
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
              </div> -->
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
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
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