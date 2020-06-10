<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">User Control</h1>
  <p class="mb-4">Data mahasiswa/siswa yang telah mendapat mentor.</a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Fix</h6>
        <a href="<?= base_url('Export/exportFix'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Excel</a>
      </div>
    </div>

    <?php if($this->session->flashdata('flash_data')) :?>
      <div class="card-body">    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Magang <strong>berhasil</strong> <?= $this->session->flashdata('flash_data'); ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    <?php endif; ?>

    <div class="card-body">
      <!-- <h6>Results : <?= $total_rows; ?></h6> -->
      <table id="example" class="table table-striped">
        <div class="table-responsive">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Unit</th>
              <th scope="col">Sub</th>
              <th scope="col">Mentor</th>
              <th scope="col">Mulai</th>
              <th scope="col">Selesai</th>
              <th scope="col">Status</th>
              <th width="50px">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no=1;
            foreach ($proses as $a) : ?>
              <tr>
                <th><?= $no++; ?></th>
                <th><?=$a['nama'] ?></th>
                <th><?=$a['name_unit'] ?></th>
                <th><?=$a['name_sub_unit'] ?></th>
                <th><?=$a['mentor'] ?></th>
                <th><?= date('d M Y', strtotime($a['mulai']))?></th>
                <th><?= date('d M Y', strtotime($a['akhir']))?></th>
                <th> 
                  <?php if ($a['keterangan'] == "Sedang Dikonfirmasi") { ?>
                    <label style="color: #ff8000;"><?=$a['keterangan'] ?></label>
                    <?php 
                  } elseif ($a['keterangan'] == "Diterima") { ?>
                    <label style="color: #00ff00;"><?=$a['keterangan'] ?></label>
                    <?php
                  } elseif ($a['keterangan'] == "Berjalan") { ?>
                    <label style="color: #0040ff;"><?=$a['keterangan'] ?></label>
                    <?php
                  } elseif ($a['keterangan'] == "Batal") { ?>
                    <label style="color: #ff0000;"><?=$a['keterangan'] ?></label>
                    <?php
                  } elseif ($a['keterangan'] == "Ditolak") { ?>
                    <label style="color: #ff0000;"><?=$a['keterangan'] ?></label>
                    <?php
                  } ?>


                </th>


                <?php 
                if ($a['keterangan'] == "Berjalan") { ?>
                  <th width="120px">
                  <?php }
                  else { ?>
                    <th width="50px">
                      <?php
                    } ?>

                    <a href="<?= base_url(); ?>magang/detailProses/<?= $a['id']; ?>" class="btn-primary btn-sm">Detail</a> 

                    <!-- <a href="<?= base_url(); ?>magang/getStatus/<?= $a['id']; ?>" class="btn-warning btn-sm" data-toggle="modal" data-target="#statusModal">Status</a> --> 

                    <?php if ($a['keterangan'] == "Berjalan") { ?>

                      <!-- Jika status berjalan button selesai akan muncul -->
                      <?php if($this->session->userdata('role')==='1') { ?>
                        <a href="<?= base_url('magang/getSelesai/'.$a['id']); ?>" class="btn-secondary btn-sm">Selesai</a>                     
                      <?php } ?>

                    <?php } elseif ($a['keterangan'] == "Batal") { ?>

                      <!-- Jika status Batal/Ditolak button Batal akan muncul -->
                      <?php if($this->session->userdata('role')==='1') { ?>
                        <a href="<?= base_url('magang/getBatal/'.$a['id']); ?>" class="btn-danger btn-sm">Batal</a><?php } ?>

                        <?php 

                      } ?>

                    </th>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </div>
          </table>
          <!-- <?= $this->pagination->create_links(); ?> -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>  

    <div class="modal" id="statusModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Pilih Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?base_url('magang/getStatus'); ?>">
            <div class="modal-body">

              <label class="col-sm-2 col-form-label">Status</label>
              <label  class="col-sm-0 col-form-label">:</label>
              <div class="col-sm-9">
                <select class="custom-select" name="keterangan">
                  <?php foreach ($keterangan as $j) : ?>
                    <?php if ($j == $magang['keterangan']) : ?>
                      <option value="<?= $j; ?>" selected><?= $j; ?></option>
                      <?php else : ?>
                        <option value="<?= $j; ?>"><?= $j; ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>

                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- <a href="<?= base_url(); ?>magang/updateMentor/<?= $a['id']; ?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Mentor</a> -->

                  <!-- <a href="<?= base_url(); ?>magang/detail/<?= $b['id']; ?>" class="btn btn-primary btn-sm">Detail</a>

                  <a href="<?= base_url(); ?>magang/updateMentor/<?= $mentor['id']; ?>" class="btn btn-warning btn-sm">Mentor</a>

                  <a href="<?= base_url(); ?>magang/hapus/<?= $b['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin?');" >Hapus</a> -->
