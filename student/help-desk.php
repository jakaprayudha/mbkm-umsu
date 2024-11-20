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
   <title>MBKM</title>
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
      <h2>Help Desk</h2>
      <p>
         Laporkan apabila ada kendala yang anda alami atau informasi yang anda ingin dapatkan
      </p>
      <div class="card">
         <form action="" method="POST">
            <input type="hidden" name="user" value="<?= $_SESSION['username'] ?>">
            <div class="card-body">
               <div class="mb-3">
                  <label for="laporan" class="form-label">Laporan</label>
                  <textarea name="laporan" id="laporan" class="form-control" rows="10"></textarea>
               </div>
               <button type="submit" name="helpdesk" class="btn btn-ungu text-white">Simpan</button>
            </div>
         </form>
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
            window.location = 'help-desk'; // Redirect after toast hides
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
            window.location = 'help-desk'; // Redirect after toast hides
        });
    </script>";
      unset($_SESSION['error']);
   }
   ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>


</html>