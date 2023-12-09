<?php
    include 'connect.php';

    if(isset($_POST['action'])) {
            if($_POST['action'] == "add") {

                $npm = $_POST['NPM'];
                $nama_mahasiswa = $_POST['nama_mahasiswa'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $alamat = $_POST['alamat'];

                $query = "insert into tb_mhs values(null, '$npm', '$nama_mahasiswa', '$jenis_kelamin', '$alamat' )";
                $sql = mysqli_query($conn, $query);

                if($sql) {
                    header("location: index.php");
                } else {
                    echo $query;
                }

                } else if ($_POST['action'] == "edit"){
                    $id_mahasiswa = $_POST['id_mahasiswa'];
                    $npm = $_POST['npm'];
                    $nama_mahasiswa = $_POST['nama_mahasiswa'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $alamat = $_POST['alamat'];

                    $query = "update tb_mhs set npm = '$npm', nama_mahasiswa = '$nama_mahasiswa', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat' where id_mahasiswa = '$id_mahasiswa'; ";
                    $sql = mysqli_query($conn, $query);
                    header("location: index.php");
                }
        }
        if (isset($_GET['hapus'])) {
            $id_mahasiswa = $_GET['hapus'];
            $query = "delete from tb_mhs where id_mahasiswa = '$id_mahasiswa'";
            $sql = mysqli_query($conn, $query);

            if($sql) {
                header("location: index.php");
            } else {
                echo $query;
            }
    }
?>