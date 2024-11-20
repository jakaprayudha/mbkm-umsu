<?php
require '../database/connect.php';
$email = $_GET['id'];
$check_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$email'");
$data_user = mysqli_fetch_array($check_user);
if ($data_user) {
   $user = $data_user['username'];
   // $stamp = date('Y-m-d H:i:s');
   // $update_session = mysqli_query($koneksi, "UPDATE user SET logout_at='$stamp' WHERE uid='$uid'");
   if ($user != NULL) {
      session_start();
      unset($_SESSION['uid']);
      unset($_SESSION['fullname']);
      unset($_SESSION['username']);
      unset($_SESSION['status']);
      unset($_SESSION['roles']);
      unset($_SESSION['path']);
      session_destroy();
      echo "
         <!DOCTYPE html>
         <html>
         <head>
            <title>Logout</title>
            <!-- SweetAlert CSS -->
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css'>
            <!-- Ganti Font menjadi Poppins -->
            <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap' rel='stylesheet'>
            <style>
               body {
                  font-family: 'Poppins', sans-serif;
               }
            </style>
         </head>
         <body>
            <!-- SweetAlert JS -->
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
               Swal.fire({
                  title: 'Session Ended',
                  text: 'Anda Telah Mengakhiri Session Aplikasi',
                  icon: 'info',
                  timer: 1500, // Adjust the timer value as needed
                  showConfirmButton: false
               }).then(() => {
                  window.location.href = '../index';
               });
            </script>
         </body>
         </html>
      ";
   }
}
