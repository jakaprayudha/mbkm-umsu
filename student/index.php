<?php
require '../controller/view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MBKM</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <style>
      /* Reset dasar */
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }

      body {
         font-family: Arial, sans-serif;
         background-color: #f4f4f9;
         display: flex;
         flex-direction: column;
         min-height: 100vh;
         margin: 0;
      }

      /* Header */
      .header {
         background: linear-gradient(135deg, #512da8, #673ab7);
         padding: 20px;
         display: flex;
         align-items: center;
         color: #fff;
      }

      .header img {
         width: 50px;
         height: 50px;
         border-radius: 50%;
         margin-right: 15px;
      }

      .header .user-info {
         flex-grow: 1;
      }

      .header .user-info h1 {
         font-size: 18px;
         margin: 0;
      }

      .header .user-info p {
         margin: 5px 0 0;
         font-size: 14px;
         color: #e0e0e0;
      }

      /* Main Content */
      .main {
         flex: 1;
         padding: 20px;
      }

      /* Bottom Navigation */
      .bottom-nav {
         position: fixed;
         bottom: 0;
         left: 0;
         width: 100%;
         background: #fff;
         box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
         display: flex;
         justify-content: space-between;
         padding: 10px 0;
      }

      .bottom-nav a {
         flex-grow: 1;
         text-align: center;
         text-decoration: none;
         color: #757575;
         font-size: 12px;
         display: flex;
         flex-direction: column;
         align-items: center;
      }

      .bottom-nav a i {
         font-size: 20px;
         margin-bottom: 5px;
      }

      .bottom-nav a.active {
         color: #673ab7;
      }


      /* Responsif */
      @media (max-width: 768px) {

         /* Header */
         .header {
            background: linear-gradient(135deg, #512da8, #672ab7);
            padding: 10px;
            display: flex;
            align-items: center;
            color: #fff;
            position: fixed;
            /* Navbar tetap di posisi atas */
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
         }

         .header img {
            width: 50px;
            height: 50px;
            border-radius: 100%;
            margin-right: 15px;
         }

         .header .user-info {
            flex-grow: 1;
         }

         .header .user-info h1 {
            font-size: 20px;
            margin: 0;
         }

         .header .user-info p {
            margin: 1px 0 0;
            font-size: 12px;
            color: #e0e0e0;
         }
      }
   </style>
   <!-- Ikon FontAwesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   <style>
      .counter-card {
         display: flex;
         align-items: center;
         justify-content: center;
         text-align: center;
         color: white;
         height: 150px;
         border-radius: 8px;
      }

      .counter-icon {
         font-size: 2rem;
         margin-bottom: 10px;
      }
   </style>
</head>

<body>
   <!-- Header -->
   <?php
   require 'header.php';
   ?>


   <!-- Main Content -->
   <div class="main">
      <br><br><br>
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