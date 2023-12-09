<?php
    include 'connect.php';

    $query = "select * from tb_mhs;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>UJIAN PWEB FELDA FAUZAN</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Ujian_Felda Fauzan Alfajr_50421504</a>
      </div>
    </nav>

    <figure class="text-center">
      <blockquote class="blockquote">
        <p>DATA KELAS 3IA17.</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        Made by <cite title="Source Title">Felda Fauzan Alfajr</cite>
      </figcaption>
    </figure>

    <div class="container">
      <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
          <thead>
            <tr>
              <th>NO</th>
              <th>NPM</th>
              <th>Nama Mahasiswa</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($result = mysqli_fetch_assoc($sql)) {
            ?>
            <tr>
              <td>
                <?php echo ++$no; ?>
              </td>
              <td><?php echo $result['NPM']; ?></td>
              <td><?php echo $result['nama_mahasiswa']; ?></td>
              <td><?php echo $result['jenis_kelamin']; ?></td>
              <td><?php echo $result['alamat']; ?></td>
              <td><a href="input.php?edit=<?php echo $result['id_mahasiswa']; ?>" class="btn btn-primary btn-info btn-sm mb-2" type="submit">Update</a>
                  <a href="proses.php?hapus=<?php echo $result['id_mahasiswa']; ?>" class="btn btn-primary btn-danger btn-sm mb-2" type="submit" onClick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>  
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <a href="input.php" class="btn btn-primary" type="submit">Add Data</a>
      </div>
    </div>
  </body>
</html>
