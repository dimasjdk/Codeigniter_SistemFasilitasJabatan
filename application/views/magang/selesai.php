<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">User Control</h1>
  <p class="mb-4">Data mahasiswa/siswa yang telah selesai magang.</a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Draft</h6>
        <a href="<?= base_url('Export/exportSelesai'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Excel</a>
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

      <!-- <div class="row">
        <div class="col-md-5">
          <form action="<?= base_url('magang/selesai'); ?>" method="post">
            <div class="input-group mb-3">
              <input type="text" name="keyword" class="form-control" placeholder="Masukkan Nama / Unit / NIK" autocomplete="off" autofocus>
              <div class="input-group-append">
                <input class="btn btn-primary" type="submit" value="Search" name="cari">
              </div>
            </div>
          </form>
        </div>
      </div>
      <h6>Results : <?= $total_rows; ?></h6> -->

      <table id="example" class="table table-striped" style="text-align: center;">
        <div class="table-responsive">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Sekolah</th>
              <th scope="col">Unit</th>
              <th scope="col">Sub</th>
              <th scope="col">Mentor</th>
              <th scope="col">Selesai</th>
              <th scope="col">Action</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($selesai as $a) : ?>
              <tr>
                <th><?=$no++; ?></th>
                <th><?=$a['nama'] ?></th>
                <th><?=$a['sekolah'] ?></th>
                <th><?=$a['name_unit'] ?></th>
                <th><?=$a['name_sub_unit'] ?></th>
                <th><?=$a['mentor'] ?></th>
                <th><?= date('d M Y', strtotime($a['akhir']))?></th>
                <th>               

                   <a href="<?= base_url(); ?>magang/detailSelesai/<?= $a['id']; ?>" class="btn btn-primary btn-sm">Detail</a>

                  <!--<a href="<?= base_url(); ?>magang/detailMentor/<?= $b['id']; ?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Mentor</a> -->

                  <!-- <a href="<?= base_url(); ?>magang/hapus/<?= $b['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin?');" >Hapus</a> -->

                </th>
              </tr>
            <?php endforeach; ?>
         </tbody>
       </div>
     </table>
     <?= $this->pagination->create_links(); ?>
   </div>
   <!-- /.container-fluid -->
  </div>
 <!-- End of Main Content -->
</div>

<!-- Modal Pilih Mentor Dan Unit -->
<!--  -->
