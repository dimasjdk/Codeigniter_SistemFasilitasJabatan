<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data On Procces.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php
date_default_timezone_set('Asia/Jakarta');
echo "Tanggal Backup :".date("Y-m-d H:i:sa");
?>
<br>
<table border='1' width="100%">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Sekolah</th>
    <th>Tingkat</th>
    <th>Jurusan</th>
    <th>Kegiatan</th>
    <th>Mulai</th>
    <th>Selesai</th>
    <th>Catatan</th>
    <th>Created At</th>
  </tr>
  <tr>
    <?php
    $no=1;
    foreach ($data_proccess as $row) {
      ?>
      <td><?= $no++?></td>
      <td><?= $row->nama;?></td>
      <td><?= $row->sekolah;?></td>
      <td><?= $row->tingkat;?></td>
      <td><?= $row->jurusan;?></td>
      <td><?= $row->jenis;?></td>
      <td><?= date('d M Y', strtotime($row['mulai']))?></td>
      <td><?= date('d M Y', strtotime($row['akhir']))?></td>
      <td><?= $row->tambahan;?></td>
      <td><?= date('d M Y', strtotime($row['date_created']))?></td>
    </tr>
  <?php } ?>
</table>
