<?php
require '../controller/view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MBKM</title>
   <!-- Other head content -->
   <link rel="icon" href="../mbkmumsu.svg" type="image/x-icon">
   <!-- or if using a PNG favicon -->
   <link rel="icon" href="../mbkmumsu.svg" type="image/png">
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
      <h2>Dashboard</h2>
      <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="row justify-content-center">
                  <div class="col-12 col-md-4">
                     <div class="card">
                        <img src="../mbkmumsu.svg" class="card-img-top" alt="..." />
                        <div class="card-body">
                           <p class="card-text">
                              Kampus Merdeka (MBKM) adalah program pendidikan yang diluncurkan oleh Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemendikbudristek)
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row justify-content-center">
                  <div class="col-12 col-md-4">
                     <div class="card">
                        <img src="../mbkmumsu.svg" class="card-img-top" alt="..." />
                        <div class="card-body">
                           <p class="card-text">
                              Another card description here...
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
         </button>
      </div>
      <?php
      $user = $_SESSION['username'];
      $check = mysqli_query($koneksi, "SELECT * FROM ms_mahasiswa WHERE email ='$user' ");
      $data = mysqli_fetch_array($check);
      if ($data['tempat_lahir'] == NULL) { ?>
         <div class="alert mt-3 alert-warning d-flex align-items-center" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <div>
               Lengkapi data diri anda pada halaman profile untuk menjelajah fitur mbkm apps
            </div>
         </div>
      <?php }
      ?>
      <div class="row mt-3">
         <?php
         $getprogram = tampildata("SELECT * FROM ms_program_mbkm ");
         ?>
         <?php foreach ($getprogram as $data): ?>
            <div class="col-6">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title"><?= $data['program_mbkm'] ?></h5>
                     <span class="badge bg-danger">Kuota : <?= $data['kuota'] ?></span>
                  </div>
               </div>
            </div>
         <?php endforeach ?>
      </div>
      <!-- Custom CSS -->
      <style>
         .card {
            height: 100%;
            display: flex;
            flex-direction: column;
         }

         .card-body {
            flex-grow: 1;
         }

         .card-img-top {
            height: 200px;
            object-fit: cover;
         }
      </style>
   </div>
   <?php
   require 'menu.php';
   ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>