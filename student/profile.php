<?php
require '../controller/view.php';
require '../controller/profile.php';
$email = $_SESSION['username'];
$getdata = mysqli_query($koneksi, "SELECT * FROM ms_mahasiswa WHERE email='$email'");
$data = mysqli_fetch_array($getdata);
$npm = $data['id_mahasiswa'];
$getuser = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$email'");
$datauser = mysqli_fetch_array($getuser);
$getprogram = mysqli_query($koneksi, "SELECT * FROM student_mbkm INNER JOIN ms_program_mbkm ON ms_program_mbkm.id_program = student_mbkm.id_program LEFT OUTER JOIN ms_dosen_pembimbing ON ms_dosen_pembimbing.id_dosen = student_mbkm.id_dosen WHERE npm='$npm'");
$dataprogram = mysqli_fetch_array($getprogram);
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
      <h2 class="">Profile</h2>
      <p>
         Data profile ini terdiri dari data pribadi dan data kepesertaan Program MBKM anda
      </p>
      <nav>
         <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Biodata Diri</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Akun</button>
            <button class="nav-link" id="nav-mbkm-tab" data-bs-toggle="tab" data-bs-target="#nav-mbkm" type="button" role="tab" aria-controls="nav-mbkm" aria-selected="false">Program MBKM</button>
         </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="card">
               <form action="" method="POST">
                  <input type="hidden" name="id" value="<?= $email ?>">
                  <div class="card-body">
                     <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" value="<?= $data['nama_mahasiswa'] ?>" readonly class="form-control" name="nama" id="nama">
                     </div>
                     <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <?php
                        if ($data['gender'] == NULL) {
                           $valgender = "";
                           $ketgender = "PILIH";
                        } else {
                           $valgender = $data['gender'];
                           $ketgender = $valgender;
                        }
                        ?>
                        <select name="gender" id="gender" class="form-select">
                           <option value="<?= $valgender ?>"><?= $ketgender ?></option>
                           <option value="Laki Laki">Laki Laki</option>
                           <option value="Perempuan">Perempuan</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <?php
                        if ($data['agama'] == NULL) {
                           $valagama = "";
                           $ketagama = "PILIH";
                        } else {
                           $valagama = $data['agama'];
                           $ketagama = $valagama;
                        }
                        ?>
                        <select name="agama" id="agama" class="form-select">
                           <option value="<?= $valagama ?>"><?= $ketagama ?></option>
                           <option value="Islam">Islam</option>
                           <option value="Kristen">Kristen</option>
                           <option value="Katolik">Katolik</option>
                           <option value="Hindu">Hindu</option>
                           <option value="Buddha">Buddha</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label for="telepon" class="form-label">No.Handphone</label>
                        <input type="tel" class="form-control" name="telepon" id="telepon" value="<?= $data['no_telepon'] ?>">
                     </div>
                     <button class="btn btn-ungu text-white" type="submit" name="simpan-profile">Simpan</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="card">
               <form action="" method="POST">
                  <input type="hidden" name="id" value="<?= $email ?>">
                  <div class="card-body">
                     <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" readonly name="username" id="username" value="<?= $datauser['username'] ?>">
                     </div>
                     <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                     </div>
                     <button class="btn btn-ungu text-white" type="submit" name="simpan-user">Simpan</button>
                  </div>
               </form>
            </div>
         </div>

         <div class="tab-pane fade" id="nav-mbkm" role="tabpanel" aria-labelledby="nav-mbkm-tab" tabindex="0">
            <div class="card">
               <div class="card-body">
                  <div class="mb-3">
                     <label for="program" class="form-label">Program MBKM</label>
                     <input type="text" class="form-control" value="<?= $dataprogram['program_mbkm'] ?>" name="program" id="program" readonly>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="mb-3">
                           <label for="program" class="form-label">Mulai</label>
                           <input type="text" class="form-control" value="<?= $dataprogram['date_start'] ?>" name="program" id="program" readonly>
                        </div>
                     </div>
                     <div class="col">
                        <div class="mb-3">
                           <label for="program" class="form-label">Selesai</label>
                           <input type="text" class="form-control" value="<?= $dataprogram['date_end'] ?>" name="program" id="program" readonly>
                        </div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="dosen" class="form-label">Dosen Pembimbing</label>
                     <input type="dosen" class="form-control" name="dosen" value="<?= $dataprogram['nama_dosen'] ?>" id="dosen">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
   require 'menu.php';
   ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
            window.location = 'profile'; // Redirect after toast hides
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
            window.location = 'profile'; // Redirect after toast hides
        });
    </script>";
      unset($_SESSION['error']);
   }
   ?>
</body>


</html>