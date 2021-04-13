<?php 
include 'model.php'; 
$model = new Model();
$index=1;

?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Data Mahasiswa</title>
  </head>
  <body>
   
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="Index.php">DATABASE MAHASISWA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
           aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" aria-current="page" href="index.php">Data Nilai</a>
              <a class="nav-link" aria-current="page" href="mahasiswa.php">Mahasiswa</a>
              <a class="nav-link" aria-current="page" href="absen.php">Absen</a>
              <a class="nav-link" aria-current="page" href="kontrak.php">Kontrak</a>
              <a class="nav-link" aria-current="page" href="matakuliah.php">Matakuliah</a>
            </div>
          </div>
        </div>
      </nav>

      <div class="container">
   
      <h1><center>Data Absen Mahasiswa</center></h1> 
       <a href="create_absen.php">Tambah Data</a> 
       <br> 
      <a href="print_absen.php" target="_blank">Cetak Data</a> 
    
      <br><br> 
    
      
        <table class="table table-bordered table-striped"> 
          <thead class="text-center"> 
            <tr> 
                <th>No</th> 
                <th>Id</th> 
                <th>Id_Mahasiswa</th> 
                <th>Id_Matakuliah</th> 
                <th>Waktu Absen</th> 
                <th>Status</th> 
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $model->tampil_data_absen();
                if (!empty($result)) {
                    foreach ($result as $data) : ?>
                        <tr>
                            <td><?= $index++ ?></td>
                            <td><?= $data->id ?></td>
                            <td><?= $data->mhs_id ?></td>
                            <td><?= $data->matakuliah_id ?></td>
                            <td><?= $data->waktu_absen ?></td>
                            <td><?= $data->status ?></td>
                            <td>
                                <a name="edit" id="edit" href="edit_absen.php?id=<?= $data->id ?>">Edit</a>
                                <a name="hapus" id="hapus" href="proces.php?id=<?= $data->id ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;
                } else { ?>
                <tr>
                    <td colspan="9">Belum ada data pada tabel absen mahasiswa.</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>