<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Beranda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    if (@$_SESSION['username'] == '') {
        echo "<script>
                                    alert('Silahkan Login Dahulu...')
                                    window.location='index.php';
                                </script>";
    } else { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 d-flex justfy-content-center">
                        <h3> Selamat Datang <label style='color:red'><?= $_SESSION['username'] ?></label> Anda Berhasil Login </h3>
                    </div>
                    <div class="logout-button">
                        <p><br><a class="btn btn-primary btn-sm" href='logout.php'> Logout</a></p>
                    </div>

            </div>
        </div>
        </div>
    <?php   }
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</html>