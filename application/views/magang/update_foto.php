<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Admin Control</h1>
  <!-- <p class="mb-4">Silahkan tentukan unit & mentor untuk <strong><?=$magang['nama']; ?></strong> </a></p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Perlu Proses / Tentukan Mentor</h6>
    </div>

    <form method="post" action="" enctype="multipart/forrm-data">
      <input type="hidden" name="id" value="<?= $magang['id']; ?>">
      <div class="card-body">
        <div class="table-responsive">
          
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Surat Pernyataan</label>
              <label  class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="photo">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div>
            <!-- <div class="form-group row">
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