    <?php
    include 'koneksi.php';
    session_start();


    $query = "SELECT * FROM tb_siswa;";
    // $mehog = "SELECT * FROM tb_siswa WHERE id_siswa = 3;";
    $sql = mysqli_query($conn, $query);
    $no = 0;

    $result = ['jenis_kelamin'];

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Bootstrap-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
        <!--Font Awesome-->
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
        <!--Data Tables-->
        <link href="DataTables/datatables.css" rel="stylesheet">
        <script src="DataTables/datatables.js"></script>


        <title>Document</title>
    </head>

    <body>
        <nav class="navbar bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">
                    CRUD Data Siswa
                </a>
            </div>
        </nav>
        <!--Judul -->
        <div class="container-fluid">
            <figure>
                <h1 class="mt-3">Data Siswa</h1>
                <blockquote class="blockquote">
                    <p>Berisi data yang telah disimpan.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD <cite title="Source Title">Create Read Update Delete</cite>
                </figcaption>
            </figure>
            <a href="kelola.php" type="button" class="btn btn-primary mb-3">
                <i class="fa fa-plus">
                    Tambah Data
                </i>
            </a>

            <?php
            if (isset($_SESSION['eksekusi'])):
            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                        <?php
                        echo $_SESSION['eksekusi']
                        ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
                session_destroy();
            endif;
            ?>
            <div class="table-responsive">
                <table id="hello" class="table align-middle cell-border hover compact">
                    <thead>
                        <tr>
                            <th>
                                <center>No.</center>
                            </th>
                            <th>
                                <center>NISN</center>
                            </th>
                            <th>
                                <center>Nama Siswa</center>
                            </th>
                            <th>
                                <center>Jenis Kelamin</center>
                            </th>
                            <th>
                                <center>Foto Siswa</center>
                            </th>
                            <th>
                                <center>Alamat</center>
                            </th>
                            <th>
                                <center>Aksi</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($result = mysqli_fetch_assoc($sql)) {
                        ?>
                            <tr>
                                <td>
                                    <center>
                                        <?php echo ++$no; ?>.
                                    </center>
                                </td>
                                <td>
                                    <center><?php echo $result['nisn']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo $result['nama_siswa']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo $result['jenis_kelamin']; ?></center>
                                </td>
                                <td>
                                    <center>
                                        <img src="img/<?php echo $result['foto_siswa']; ?>" style="width: 150px;">
                                    </center>
                                </td>
                                <td>
                                    <center><?php echo $result['alamat']; ?></center>
                                </td>
                                <td>
                                    <center>
                                        <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <script></script>
                                        <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Inisialisasi DataTables -->
        <script type="text/javascript">
            new DataTable('#hello');
        </script>

        <div class="mb-5"></div>
    </body>

    </html>