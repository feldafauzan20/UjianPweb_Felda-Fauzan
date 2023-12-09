<!DOCTYPE html>

<?php
    include 'connect.php';

    $id_mahasiswa = '';
    $npm = '';
    $nama_mahasiswa = '';
    $jenis_kelamin = '';
    $alamat = '';

    if(isset($_GET['edit'])) {
      $id_mahasiswa = $_GET['edit'];

      $query = "select * from tb_mhs where id_mahasiswa = '$id_mahasiswa';";
      $sql = mysqli_query($conn, $query);

      $result = mysqli_fetch_assoc($sql);

      $npm = $result['NPM'];
      $nama_mahasiswa = $result['nama_mahasiswa'];
      $jenis_kelamin = $result['jenis_kelamin'];
      $alamat = $result['alamat'];
    }
?>

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
    <nav class="navbar bg-body-tertiary mb-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          Ujian_Felda Fauzan Alfajr_50421504
        </a>
      </div>
    </nav>

  <div class="container">
      <form method="POST" action="proses.php">
        <input type="hidden" value="<?php echo $id_mahasiswa; ?>" name="id_mahasiswa" id="">
        <div class="mb-3 row">
          <label for="npm" class="col-sm-2 col-form-label">NPM</label>
          <div class="col-sm-10">
            <input required type="text" name="npm" class="form-control" id="npm" placeholder="NPM ANDA" value="<?php echo $npm; ?>"/>
          </div>
        </div>
      
        <div class="mb-3 row">
          <label for="nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
          <div class="col-sm-10">
            <input required
              name="nama_mahasiswa"
              type="text"
              class="form-control"
              id="nama"
              placeholder="Nama Anda" value="<?php echo $nama_mahasiswa; ?>" />
          </div>
        </div>

        <div class="mb-3 row">
          <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-10">
            <select required id="jk" name="jenis_kelamin" class="form-select" aria-label="Default select example">
              <option <?php if($jenis_kelamin == 'Laki-laki') {echo "selected";} ?> value="Laki-laki">Laki-laki</option>
              <option <?php if($jenis_kelamin == 'Perempuan') {echo "selected";} ?> value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>

          <div class="mb-3 row">
              <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                  <textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
              </div>
          </div>

          <div class="mb-3 row">
              <div class="col">
                <?php
                    if(isset($_GET['edit'])) {
                ?>
                  <button type="submit" name="action" value="edit" class="btn btn-success">Save</button>
                <?php
                    } else {
                ?>
                <button type="submit" value="add" name="action" class="btn btn-success">Add</button>
                <?php
                    }
                ?>
              <a href="index.php" type="button" class="btn btn-danger">Cancel</a>
              </div>
          </div>
      </form>
  </div>
    
  </body>
</html>
