<?php
require '../controller/view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mobile App Template</title>
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
            background: linear-gradient(135deg, #512da8, #673ab7);
            padding: 20px;
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
      }

      .btn-ungu {
         background-color: #6f42c1;
         /* Warna ungu */
         border-color: #6f42c1;
         /* Border ungu */
      }

      .btn-ungu:hover {
         background-color: #5a32a3;
         /* Warna ungu lebih gelap saat hover */
         border-color: #5a32a3;
      }

      .small-font {
         font-size: 0.8rem;
         /* Ukuran font yang lebih kecil */
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
   <div class="header">
      <img src="../avatar.jpg" alt="User Avatar">
      <div class="user-info">
         <h1><?= $_SESSION['fullname'] ?></h1>
         <p>Welcome back ! MBKM APPS</p>
      </div>
   </div>

   <!-- Main Content -->
   <div class="main">
      <br><br><br><br>
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
               <div class="card-body">
                  <div class="mb-3">
                     <label for="description" class="form-label">NPM</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
                  <div class="mb-3">
                     <label for="description" class="form-label">Nama Lengkap</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
                  <div class="mb-3">
                     <label for="description" class="form-label">Jenis Kelamin</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
                  <div class="mb-3">
                     <label for="description" class="form-label">Agama</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
                  <div class="mb-3">
                     <label for="description" class="form-label">Email</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
                  <div class="mb-3">
                     <label for="description" class="form-label">No.Handphone</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
                  <button class="btn btn-ungu text-white">Simpan</button>
               </div>
            </div>
         </div>
         <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="card">
               <div class="card-body">
                  <div class="mb-3">
                     <label for="description" class="form-label">Username</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
                  <div class="mb-3">
                     <label for="description" class="form-label">Password</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
                  <button class="btn btn-ungu text-white">Simpan</button>
               </div>
            </div>
         </div>

         <div class="tab-pane fade" id="nav-mbkm" role="tabpanel" aria-labelledby="nav-mbkm-tab" tabindex="0">
            <div class="card">
               <div class="card-body">
                  <div class="mb-3">
                     <label for="description" class="form-label">Program MBKM</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
                  <div class="mb-3">
                     <label for="description" class="form-label">Dosen Pembimbing</label>
                     <input type="text" class="form-control" name="" id="">
                  </div>
                  <button class="btn btn-ungu text-white">Simpan</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
   require 'menu.php';
   ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>


</html>