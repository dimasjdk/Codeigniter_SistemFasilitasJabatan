	<header>
		<nav class="navbar navbar-expand-lg">
			<div class="navbar-brand">
				<a class="logo js-scroll-trigger" href="home.html"><img src="<?= base_url('assets/images/logo.png'); ?>" type="image/png" ></a>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('login'); ?>">LOGIN</a>
					</li>

				</ul>
			</div>
		</nav>
	</header>

	<div class="content-pt">
		<section class="page-header-pt">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-12 col-sm-12"></div>
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="page-title-pt">
							<img src="assets/img/about2.jpg" alt="">
							<h2>FASTELJAB V.1</h2>
							<p>Fasilitas Telkom Jabatan Telkom Regional IV</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12"></div>
				</div>
			</div>
		</section>

		<section class="about-information">


					<div class="card-body">
         				<div class="table-responsive">
						<h2 style="text-align: center; margin-bottom: 50px;">Data Fasteljab Karyawan PT. TELKOM REGIONAL IV</h2>
						<table class="table table-striped table-bordered dt-responsive nowrap display">
							<thead>
								<tr>
									<th>Nik</th>
									<th>Nama</th>
									<th>Band Posisi</th>
									<th>Jabatan</th>
									<th>Nomor Fasteljab</th>
									<th>Alat_Produksi</th>
									<th>NIK di Data Pelanggan</th>
									<th>Segmen/Paket</th>
									<th>Hak Pagu</th>
									<th>Realisasi Pagu</th>
									<th>Lokasi Kerja</th>
									<th>Lokasi Fasteljab</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach ($karyawan as $b) : ?>
									<tr>
										<td><?= $b['nik'] ?></td>
										<td><?= $b['nama'] ?></td>
										<td><?= $b['posisi'] ?></td>
										<td><?= $b['jabatan'] ?></td>
										<td><?= $b['no_telp'] ?><br><?= $b['no_internet'] ?></td>

										<td>
					                      <?php if (!$b['alpro']) { ?>
					                        <label class="btn-warning btn-xs">On Check</label>
					                        <?php 
					                      } elseif ($b['alpro'] == "On Check") { ?>
					                        <label class="btn-warning btn-xs"><?=$b['alpro'] ?></label>
					                        <?php
					                      } elseif ($b['alpro'] == "FO") { ?>
					                        <label><?=$b['alpro'] ?></label>
					                        <?php
					                      } elseif ($b['alpro'] == "Non FO") { ?>
					                        <label><?=$b['alpro'] ?></label>
					                        <?php
					                      } ?>
					                    </td>
					                    <td>
					                      <?php if (!$b['isiska']) { ?>
					                        <label class="btn-warning btn-xs">On Check</label>
					                        <?php 
					                      } elseif ($b['isiska'] == "On Check") { ?>
					                        <label class="btn-warning btn-xs"><?=$b['isiska'] ?></label>
					                        <?php
					                      } elseif ($b['isiska'] == "Sudah Ada") { ?>
					                        <label class="btn-success btn-xs"><?=$b['isiska'] ?></label>
					                        <?php
					                      } elseif ($b['isiska'] == "Tidak Perlu Ada") { ?>
					                        <label><?=$b['isiska'] ?></label>
					                        <?php
					                      } elseif ($b['isiska'] == "Belum Ada") { ?>
					                        <label class="btn-danger btn-xs"><?=$b['isiska'] ?></label>
					                        <?php
					                      } ?>
					                    </td>
					                    <td>
					                      <?php if (!$b['segmen']) { ?>
					                        <label class="btn-warning btn-xs">On Check</label>
					                        <?php 
					                      } elseif ($b['segmen'] == "On Check") { ?>
					                        <label class="btn-warning btn-xs"><?=$b['segmen'] ?></label>
					                        <?php
					                      } elseif ($b['segmen'] == "Dinastel Rumah") { ?>
					                        <label><?=$b['segmen'] ?></label>
					                        <?php
					                      } elseif ($b['segmen'] == "Reguler(Berbayar)") { ?>
					                        <label><?=$b['segmen'] ?></label>
					                        <?php
					                      } ?>
					                    </td>
										<td>
											<div class="dropdown">
												<button 
												<?php if ($b['pagu_telp'] == "0" || $b['non_fo'] == "0" || $b['fo'] == "0" || $b['kuota'] == "0" || $b['usee_tv'] == "0") { ?>
													class="btn btn-danger dropdown-toggle"
													<?php 
												} elseif ($b['non_fo'] !== "0") { ?>
													class="btn btn-default dropdown-toggle"
													<?php
												} ?>
												id="menu1" type="button" data-toggle="dropdown">
												Lihat Hak Pagu
												<span class="caret"></span></button>
													<ul style="text-align: center;" class="dropdown-menu" role="menu">
														<li role="presentation"><b>Telp Rumah</b></li>
														<li role="presentation"><?= $b['pagu_telp'] ?></li>
														<hr>
														<li role="presentation"><b>Non FO</b> | <b>FO (Kuota)</b></li>
														<li role="presentation"><?= $b['non_fo'] ?> | <?= $b['fo'] ?>  (<?= $b['kuota'] ?>)</li>
														<hr>
														<li role="presentation"><b>Usee TV</b></li>
														<li role="presentation"><?= $b['usee_tv'] ?></li>
													</ul>
												</div>
											</td>
											<td>
												<?php if ($b['status'] == "On Check") { ?>
													<label class="btn-warning btn-xs"><?= $b['status'] ?></label>
													<?php 
												} elseif ($b['status'] == "Sudah Sesuai") { ?>
													<label style="color: #28a745;"><b><?=$b['status'] ?></b></label>
													<?php
												} elseif ($b['status'] == "Perlu Disesuaikan") { ?>
													<label style="color: #A52A2A;"><b><?=$b['status'] ?></b></label>
													<?php
												} ?>
											</td>
											<td>
												<?= $b['lok_kerja'] ?>
											</td>
											<td>
												<?= $b['lok_fasteljab'] ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
					</div>
				</div>
			</section>

			<footer id="footer">
				<div class="copyright-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="copyright-text">
									<p>Copyright © HcTreg04 2019</a></p>
								</div>
							</div>

						</div>
					</div>
				</div>
			</footer>

		</div>
