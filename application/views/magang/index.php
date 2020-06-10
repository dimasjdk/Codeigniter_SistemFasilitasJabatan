<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">User Control</h1>
  <p class="mb-4">Data Mahasiswa/Siswa yang mengajukan magang.</a></p>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">On Proccess</h6>
        <a href="<?= site_url('Export/exportProccess'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Excel</a>
      </div>
    </div>

    <?php if($this->session->flashdata('flash_data')) :?>
      <div class="card-body">    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Mentor <strong>berhasil</strong> <?= $this->session->flashdata('flash_data'); ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    <?php endif; ?>



    <div class="card-body">
      
      <!-- <h6>Results : <?= $total_rows; ?></h6> -->
      <div class="table-responsive">
        <table id="example" width="100%" class="table table-striped" style="text-align: center;">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Sekolah</th>
              <th scope="col">Tingkat</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Kegiatan</th>
              <th scope="col">Mulai</th>
              <th scope="col">Selesai</th>
              <th scope="col">Catatan</th>
              <th scope="col">Action</th>
              
            </tr>
          </thead>
          <tbody>
            
            <?php 
            $no = 1;
            foreach ($magang as $b) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $b['nama'] ?></td>
                <td><?= $b['sekolah'] ?></td>
                <td><?= $b['tingkat'] ?></td>
                <td><?= $b['jurusan'] ?></td>
                <td><?= $b['jenis'] ?></td>
                <td><?= date('d M Y', strtotime($b['mulai']))?></td>
                <td><?= date('d M Y', strtotime($b['akhir']))?></td>
                <td><?= $b['tambahan'] ?></td>

                <?php 
                if (!$b['mentor']) { ?>
                  <td width="120px">
                  <?php }
                  else { ?>
                    <td width="50px">
                      <?php
                    } ?>

                  <?php if($this->session->userdata('role')==='1') { ?>
                    <a href="<?= base_url(); ?>magang/ubah/<?= $b['id']; ?>" class="btn btn-primary btn-sm"> Edit</a> 
                  <?php }?>

                  <?php if($this->session->userdata('role')==='2') { ?>
                    <a href="<?= base_url(); ?>magang/updateMentor/<?= $b['id']; ?>" class="btn btn-primary btn-sm">Mentor</a>
                  <?php }?> 

                  <?php

                    if (!$b['mentor']) {
                      # code...
                      
                    } else {
                      // echo "Mentor";
                      ?>
                      <a href="<?= base_url('magang/getProses/'.$b['id']); ?>" class="btn btn-success btn-sm"> ACC
                    </a>
                    <?php
                    }
                  ?>

              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      
      <!-- <?= $this->pagination->create_links(); ?> -->
    </div>
    <!-- /.container-fluid -->
  </div>

  <!-- End of Main Content -->
</div>


