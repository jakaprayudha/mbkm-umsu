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
         .header img {
            width: 40px;
            height: 40px;
         }

         .header .user-info h1 {
            font-size: 16px;
         }

         .header .user-info p {
            font-size: 12px;
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
   <style>
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
      <h2>Sertifikat</h2>
      <p>
         Sertifikat MBKM Mitra adalah sertifikat yang diberikan kepada mahasiswa yang telah mengikuti program MBKM
      </p>
      <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
         <span>Sertifikat Anda Belum Tersedia</span>
         <button data-bs-target="#add" data-bs-toggle="modal" class="btn btn-ungu text-white">+</button>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <img src="../Logo_UMSU (1).svg" class="card-img-top" alt="">
               <div class="card-body">
                  <p class="card-text">File ini diunggah pada <?= date('Y-m-d H:i:s') ?></p>
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
<!-- Modal -->
<div class="modal fade" id="add" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Sertifikat MBKM</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="mb-3">
                  <label for="dokumen" class="form-label">File</label>
                  <input type="file" class="form-control" id="dokumen" name="dokumen">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
               <button type="submit" name="laporan-bulanan" class="btn btn-ungu text-white">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

</html>