<?php
require '../controller/view.php';
require '../controller/logbook.php';
$user = $_SESSION['username'];
$checkuser = mysqli_query($koneksi, "SELECT * FROM ms_mahasiswa WHERE email = '$user' ");
$datauser = mysqli_fetch_array($checkuser);
$npm = $datauser['id_mahasiswa'];
$checkprogram = mysqli_query($koneksi, "SELECT * FROM student_mbkm WHERE npm='$npm'");
$data = mysqli_fetch_array($checkprogram);
$program = $data['id_peserta'];
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
      <h2>Log Book</h2>
      <p>
         Log book (buku catatan atau jurnal) adalah sebuah dokumen yang digunakan untuk mencatat kejadian, kegiatan.
      </p>
      <nav>
         <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Formulir</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Daftar Log Book</button>
         </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="card">
               <form action="" method="POST">
                  <input type="hidden" name="user" value="<?= $_SESSION['username'] ?>">
                  <div class="card-body">
                     <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="description" class="form-control" rows="4"></textarea>
                     </div>
                     <div class="mb-3">
                        <label for="luaran" class="form-label">Luaran Aktivitas</label>
                        <textarea name="luaran" id="luaran" class="form-control" rows="4"></textarea>
                     </div>
                     <button type="submit" name="logbook" class="btn btn-ungu text-white">Simpan</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="card">
               <?php
               $checklog = mysqli_query($koneksi, "SELECT * FROM report_log_book WHERE npm = '$npm' ");
               $datalog = mysqli_fetch_array($checklog);
               $getlog = tampildata("SELECT * FROM report_log_book WHERE npm = '$npm' ");
               ?>
               <div class="card-body">
                  <?php
                  if ($datalog == NULL) { ?>
                     <div class="alert mt-3 alert-warning d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>
                           Belum ada mengirimkan log book
                        </div>
                     </div>
                  <?php   } else { ?>
                     <ol class="list-group list-group-numbered" style="font-size: 12px;">
                        <?php foreach ($getlog as $datalog): ?>
                           <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                 <div class="fw-bold" style="font-size: 12px;"><?= $datalog['create_at'] ?></div>
                                 <p style="font-size: 12px;">Deskripsi : <?= $datalog['description'] ?> </p>
                                 <p class="small-font">Luaran Aktivitas : <?= $datalog['outcome'] ?></p>
                              </div>
                           </li>
                        <?php endforeach ?>
                     </ol>
                  <?php  }
                  ?>

               </div>
            </div>
         </div>
      </div>
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


</html>