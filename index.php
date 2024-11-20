<?php
require 'controller/auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MBKM</title>
   <!-- Other head content -->
   <link rel="icon" href="mbkmumsu.svg" type="image/x-icon">
   <!-- or if using a PNG favicon -->
   <link rel="icon" href="mbkmumsu.svg" type="image/png">

   <!-- <script src="assets/js/sweet-alert/sweetalert.min.js"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link rel="stylesheet" href="assets/style.css" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <style>
      .text-start h1 {
         margin-bottom: 0.25rem;
         /* Adjust the spacing between the h1 and p */
      }

      .text-start p {
         margin-top: 0;
         /* Remove top margin from p */
      }
   </style>
</head>

<body>
   <!-- Splash Screen -->
   <div id="splash">
      <img src="mbkmumsu.svg" alt="Logo">
   </div>
   <!-- Login Form -->
   <div id="login-container" class="card">
      <!-- <img src="mbkmumsu.svg" width="300" alt="Logo"> -->
      <div class="card-body text-center">
         <div class="text-start">
            <h1>Haloo MBKM !!</h1>
            <p class="small-font">Semua aktivitas kegiatan MBKM anda laporkan melalui MBKM APP </p>
         </div>
         <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required class="form-control mb-3">
            <div class="input-group mb-3">
               <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
         </form>
      </div>
   </div>

   <!-- Add Bootstrap Icons for the Show/Hide icon -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

   <script>
      // Toggle password visibility
      document.getElementById('togglePassword').addEventListener('click', function() {
         const passwordField = document.getElementById('password');
         const type = passwordField.type === 'password' ? 'text' : 'password';
         passwordField.type = type;

         // Toggle the icon based on password visibility
         const icon = this.querySelector('i');
         icon.classList.toggle('bi-eye-slash'); // Show the "hide" icon
         icon.classList.toggle('bi-eye'); // Show the "show" icon
      });
   </script>
   <?php
   // Cek jika ada pesan sukses
   if (isset($_SESSION['sukses'])) {
      echo "<script>
    Swal.fire('Good job!', '" . $_SESSION['sukses'] . "', 'success').then(function() {
      window.location = '" . $_SESSION['redirectlogin'] . "';
    });
  </script>";
      unset($_SESSION['sukses']);
   }
   // Cek jika ada pesan error
   if (isset($_SESSION['error'])) {
      echo "<div class='toast-container position-fixed bottom-0 end-0 p-3'>
           <div class='toast show' role='alert' aria-live='assertive' aria-atomic='true'>
               <div class='toast-header'>
                   <strong class='me-auto'>Error</strong>
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
               window.location = 'student/index'; // Redirect after toast hides
           });
       </script>";
      unset($_SESSION['error']);
   }
   ?>
   <!-- Add Bootstrap Icons for the Show/Hide icon -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

   <script>
      // Splash screen logic
      document.addEventListener("DOMContentLoaded", function() {
         const splash = document.getElementById("splash");
         const loginContainer = document.getElementById("login-container");

         // Set timer for splash screen
         setTimeout(() => {
            splash.style.opacity = 0;

            // Hide splash screen and show login form after fade-out
            setTimeout(() => {
               splash.style.display = "none";
               loginContainer.style.display = "block";
            }, 500);
         }, 3000); // Splash duration 3 seconds
      });
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>