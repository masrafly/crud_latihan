<!DOCTYPE html>

<?php
    include 'koneksi.php';
    session_start();


    $id_siswa = '';
    $nisn = '';
    $nama_siswa = '';
    $jkel = '';
    $alamat = '';

    if(isset($_GET['ubah'])){
        $id_siswa = $_GET['ubah'];

        $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nisn = $result['nisn'];
        $nama_siswa = $result['nama_siswa'];
        $jkel = $result['jenis_kelamin'];
        $alamat = $result['alamat'];

        // var_dump($result);

        // die();
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--Font Awesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">
            CRUD - BS5
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_siswa ;?>" name="id_siswa">
            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">
                    NISN
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nisn" class="form-control" id="nisn" placeholder="ex: 11122098" value="<?php echo $nisn; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">
                    Nama Siswa
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_siswa" class="form-control" id="nama" placeholder="ex: Rafly A" value="<?php echo $nama_siswa; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jkel" class="col-sm-2 col-form-label">
                    Jenis Kelamin
                </label>
                <div class="col-sm-10">
                    <select required id="jkel" name="jkel" class="form-select">
                        <option value="Laki-laki" <?php if($jkel == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if($jkel == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">
                    Foto Siswa
                </label>
                <div class="col-sm-10">
                    <input <?php if(!isset($_GET['ubah'])){echo "required";} ?> class="form-control" name="foto" type="file" id="foto" accept="image/*">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">
                    Alamat Lengkap
                </label>
                <div class="col-sm-10">
                    <textarea required class="form-control" name="alamat" id="alamat" rows="3"><?php echo $alamat;?></textarea>
                </div>
            </div>
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php
                        if(isset($_GET['ubah'])){
                    ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true">
                                Simpan Perubahan
                            </i>
                        </button>
                    <?php
                        } else{
                    ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true">
                                Tambahkan
                            </i>
                        </button>
                    <?php
                        }
                    ?>
                    <a href="index.php" type="button"class="btn btn-danger">
                        <i class="fa fa-backward" aria-hidden="true">
                            Batal
                        </i>
                    </a>
                </div>
        </form>
        </div>
    </div>
</body>
</html>