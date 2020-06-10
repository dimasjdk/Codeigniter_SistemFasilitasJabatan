<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Fix.xls");
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
    <th>Unit</th>
    <th>Mentor</th>
    <th>Mulai</th>
    <th>Selesai</th>
    <th>Created At</th>
  </tr>
  <tr>
    <?php
    $no=1;
    foreach ($data_fix as $row) {
      ?>
      <td><?= $no++?></td>
      <td><?= $row->nama;?></td>
      <td><?= $row->unit;?></td>
      <td><?= $row->mentor;?></td>
      <td><?= date('d F Y', strtotime($row['mulai']))?></td>
      <td><?= date('d F Y', strtotime($row['akhir']))?></td>
      <td><?= date('d F Y', strtotime($row['date_created']))?></td>
    </tr>
  <?php } ?>
</table>
