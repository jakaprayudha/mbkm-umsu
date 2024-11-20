<?php
require 'controller/auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Web Splash Screen</title>

   <!-- <script src="assets/js/sweet-alert/sweetalert.min.js"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <style>
      /* Reset dasar */
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }

      body {
         font-family: Arial, sans-serif;
         height: 100vh;
         display: flex;
         justify-content: center;
         align-items: center;
         background-color: #f4f4f9;
         overflow: hidden;
      }


      /* Splash Screen */
      #splash {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: linear-gradient(135deg, #512da8, #673ab7);
         display: flex;
         justify-content: center;
         align-items: center;
         z-index: 1000;
         transition: opacity 0.5s ease-out;
      }

      #splash img {
         max-width: 100%;
         max-height: 100%;
         width: auto;
         height: auto;
         animation: fadeInOut 2s linear infinite;
      }


      @keyframes bounce {

         0%,
         100% {
            transform: translateY(0);
         }

         50% {
            transform: translateY(-20px);
         }
      }

      /* Login Form */
      #login-container {
         display: none;
         text-align: center;
         width: 100%;
         max-width: 400px;
         padding: 20px;
         background-color: #ffffff;
         box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
         border-radius: 12px;
      }

      #login-container img {
         width: 100px;
         height: 100px;
         margin-bottom: 20px;
      }

      #login-container h1 {
         font-size: 1.5rem;
         color: #333;
         margin-bottom: 20px;
      }

      #login-container input {
         width: 100%;
         padding: 10px;
         margin-bottom: 15px;
         border: 1px solid #ccc;
         border-radius: 8px;
      }

      #login-container button {
         width: 100%;
         padding: 10px;
         background-color: #512da8;
         color: white;
         font-size: 1rem;
         border: none;
         border-radius: 8px;
         cursor: pointer;
         transition: background-color 0.3s ease;
      }

      #login-container button:hover {
         background-color: #6a4fc7;
      }
   </style>
</head>

<body>
   <!-- Splash Screen -->
   <div id="splash">
      <img src="splash.png" alt="Logo">
   </div>

   <!-- Login Form -->
   <div id="login-container">
      <img src="mbkmumsu.svg" width="300" alt="Logo">
      <h1>Login</h1>
      <form action="" method="POST">
         <input type="text" name="username" placeholder="Username" required>
         <input type="password" name="password" placeholder="Password" required>
         <button type="submit" name="login">Login</button>
      </form>
   </div>
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
      echo "<script>
    Swal.fire('Perhatian!', '" . $_SESSION['error'] . "', 'error').then(function() {
      window.location = '" . $_SESSION['redirectlogin'] . "';
    });
  </script>";
      unset($_SESSION['error']);
   }
   ?>
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
</body>

</html>