<?php
require '../controller/view.php';
require '../controller/laporan.php';
$user = $_SESSION['username'];
$checkuser = mysqli_query($koneksi, "SELECT * FROM ms_mahasiswa WHERE email = '$user' ");
$datauser = mysqli_fetch_array($checkuser);
$npm = $datauser['id_mahasiswa'];
$check = mysqli_query($koneksi, "SELECT * FROM certified WHERE npm = '$npm'");
$datacheck = mysqli_fetch_array($check);
var_dump($npm);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mobile App Template</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <!-- Ikon FontAwesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <!-- Header -->
   <?php
   require 'header.php';
   ?>

   <!-- Main Content -->
   <div class="main">
      <h2>Sertifikat</h2>
      <p>
         Sertifikat MBKM Mitra adalah sertifikat yang diberikan kepada mahasiswa yang telah mengikuti program MBKM
      </p>
      <?php
      if ($datacheck == NULL) { ?>
         <div class="alert mt-3 alert-warning d-flex align-items-center justify-content-between" role="alert">
            <div class="d-flex align-items-center">
               <i class="fas fa-exclamation-triangle me-2"></i>
               <div>Sertifikat Belum Upload</div>
            </div>
            <button class="btn btn-sm btn-ungu" data-bs-toggle="modal" data-bs-target="#add">
               <i class="fas fa-plus"></i> <!-- Ikon "+" -->
            </button>
         </div>
      <?php  } else { ?>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <img src="../file/sertifikat/<?= $datacheck['document_attch'] ?>" class="card-img-top" alt="">
                  <div class="card-body">
                     <p class="card-text">File ini diunggah pada <?= date('Y-m-d H:i:s') ?></p>
                  </div>
               </div>
            </div>
         </div>
      <?php   }
      ?>

   </div>
   <?php
   require 'menu.php';
   ?>
   <?php
   if (isset($_SESSION['sukses'])) {
      echo "<div class='toast-container position-fixed bottom-0 end-0 p-3'>
        <div class='toast show' role='alert' aria-live='assertive' aria-atomic='true'>
            <div class='toast-header'>
                <strong class='me-auto'>Berhasil</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body'>
                " . $_SESSION['sukses'] . "
            </div>
        </div>
    </div>
    <script>
        var toast = new bootstrap.Toast(document.querySelector('.toast'));
        toast.show();
        toast._element.addEventListener('hidden.bs.toast', function () {
            window.location = 'laporan'; // Redirect after toast hides
        });
    </script>";
      unset($_SESSION['sukses']);
   }

   if (isset($_SESSION['error'])) {
      echo "<div class='toast-container position-fixed bottom-0 end-0 p-3'>
        <div class='toast show' role='alert' aria-live='assertive' aria-atomic='true'>
            <div class='toast-header'>
                <strong class='me-auto'>Berhasil</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body'>
                " . $_SESSION['error'] . "
            </div>
        </div>
    </div>
    <script>
        var toast = new bootstrap.Toast(document.querySelector('.toast'));
        toast.show();
        toast._element.addEventListener('hidden.bs.toast', function () {
            window.location = 'laporan'; // Redirect after toast hides
        });
    </script>";
      unset($_SESSION['error']);
   }
   ?>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<!-- Modal -->
<div class="modal fade" id="add" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Sertifikat MBKM</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user" value="<?= $_SESSION['username'] ?>">
            <div class="modal-body">
               <div class="mb-3">
                  <label for="nomor" class="form-label">Nomor Sertifikat</label>
                  <input type="text" class="form-control" required id="nomor" name="nomor">
               </div>
               <div class="mb-3">
                  <label for="dokumen" class="form-label">File</label>
                  <input type="file" class="form-control" required id="dokumen" name="dokumen">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
               <button type="submit" name="sertifikat" class="btn btn-ungu text-white">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

</html>