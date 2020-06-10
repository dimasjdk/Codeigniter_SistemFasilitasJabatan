<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">User Control</h1>
  <p class="mb-4">Silahkan isi data diri anda untuk menjadi mentor <strong><?=$magang['nama']; ?></strong> </a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">On Proccess / Identitas Anda</h6>
    </div>

    <form method="post" action="">
      <input type="hidden" name="id" value="<?= $magang['id']; ?>">
      <div class="card-body">
        <div class="table-responsive">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Asal Unit</label>
            <label class="col-sm-0 col-form-label">:</label>
            <div class="col-sm-9">
              <select class="custom-select" name="unit" id="unit">
                <option>-PILIH-</option>
                <?php foreach($unit as $row):?>
                  <?php if ($row == $row->id_unit) : ?>
                  <option value="<?php echo $row->id_unit;?>" selected><?php echo $row->name_unit;?></option>
                  <?php else : ?>
                    <option value="<?php echo $row->id_unit;?>"><?php echo $row->name_unit;?></option>
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
              <label class="col-sm-2 col-form-label">Nama Lengkap</label>
              <label class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <input type="text" name="mentor" class="form-control" value="<?= $magang['mentor']; ?>" placeholder="Masukkan Nama Lengkap Anda">
                <small class="form-text text-danger"><?= form_error('mentor'); ?></small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">NIK</label>
              <label class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <input type="text" name="nik" class="form-control" value="<?= $magang['nik']; ?>" placeholder="Masukkan NIK Anda">
                <small class="form-text text-danger"><?= form_error('mentor'); ?></small>
              </div>
            </div>
            <input type="hidden" name="keterangan" class="form-control" value="Sedang Dikonfirmasi">
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
                  <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                  </div>
                </div>



                
                
              </div>
            </div>
          </div>
        </form>


        <!-- <a href="<?= base_url('magang/getProses/'.$b['id']); ?>" class="btn btn-success btn-sm">Terima</a> -->

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>