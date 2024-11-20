<?php
require '../controller/view.php';
require '../controller/laporan.php';
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
      <h2>Laporan</h2>
      <p>
         Laporan Aktivitas ini dapat anda laporkan berdasarkan laporan bulanan dan laporan akhir
      </p>
      <nav>
         <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Laporan Bulanan</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Laporan AKhir</button>
         </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <button class="btn btn-ungu btn-sm text-white" data-bs-toggle="modal" data-bs-target="#add">
                     <i class="fas fa-plus"></i> <!-- Ikon plus -->
                  </button>
               </div>
               <div class="card-body">
                  <?php
                  $checklaporanmon = mysqli_query($koneksi, "SELECT * FROM report_monthly WHERE npm='$npm'");
                  $datalaporanmon = mysqli_fetch_array($checklaporanmon);
                  if ($datalaporanmon == NULL) { ?>
                     <div class="alert mt-3 alert-warning d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>
                           Belum ada laporan bulanan yang anda kirimkan
                        </div>
                     </div>
                  <?php } else { ?>
                     <?php
                     $getlaporanbln = tampildata("SELECT * FROM report_monthly WHERE npm='$npm' ");
                     ?>
                     <ol class="list-group list-group-numbered">
                        <?php foreach ($getlaporanbln as $laporanbln): ?>
                           <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                 <div class="fw-bold"><?= $laporanbln['title'] ?></div>
                                 <p style="font-size: 12px;" class="text-wrap"><?= $laporanbln['description'] ?></p>
                                 <hr>
                                 <p style="font-size: 12px;"><?= $laporanbln['create_at'] ?></p>
                              </div>
                              <?php
                              if ($laporanbln['dokumen'] == NULL) { ?>
                                 <span class="badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#upload<?= $laporanbln['id_rpt_mnth'] ?>">Upload File</span>
                              <?php  } else { ?>
                                 <a href="../file/report/<?= $laporanbln['dokumen'] ?>" target="_blank" download="">
                                    <span class="badge text-bg-primary">Download File</span>
                                 </a>
                              <?php  }
                              ?>


                              <!-- Modal -->
                              <div class="modal fade" id="upload<?= $laporanbln['id_rpt_mnth'] ?>" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">File Upload</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <form action="" method="POST" enctype="multipart/form-data">
                                          <input type="hidden" name="id" value="<?= $laporanbln['id_rpt_mnth'] ?>">
                                          <div class="modal-body">
                                             <div class="alert mt-3 alert-danger d-flex align-items-center" role="alert">
                                                <i class="fas fa-exclamation-triangle me-2"></i>
                                                <div>
                                                   Format File PDF atau JPG dengan maksimal File 2 MB
                                                </div>
                                             </div>
                                             <div class="mb-3">
                                                <label for="dokumen" class="form-label">File</label>
                                                <input type="file" class="form-control" id="dokumen" name="dokumen" required>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" name="upload-month" class="btn btn-ungu text-white">Upload Proses</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        <?php endforeach ?>
                     </ol>
                  <?php    }
                  ?>

               </div>
            </div>
         </div>
         <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="card">
               <?php
               $checklaporanend = mysqli_query($koneksi, "SELECT * FROM report_end WHERE npm='$npm'");
               $datalaporanend = mysqli_fetch_array($checklaporanend);
               ?>
               <div class="card-header d-flex justify-content-between align-items-center">
                  <?php
                  if ($datalaporanend == NULL) { ?>
                     <button class="btn btn-ungu btn-sm text-white" data-bs-toggle="modal" data-bs-target="#add-end">
                        <i class="fas fa-plus"></i> <!-- Ikon plus -->
                     </button>
                  <?php } else { ?>
                     <button class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#edit-end">
                        <i class="fas fa-edit"></i> <!-- Ikon plus -->
                     </button>
                  <?php }
                  ?>
               </div>
               <div class="card-body">
                  <?php
                  if ($datalaporanend == NULL) { ?>
                     <div class="alert mt-3 alert-warning d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>
                           Belum ada laporan akhir yang anda kirimkan
                        </div>
                     </div>
                  <?php } else { ?>
                     <?php
                     $getlaporanend = tampildata("SELECT * FROM report_end WHERE npm='$npm' ");
                     ?>
                     <ol class="list-group">
                        <?php foreach ($getlaporanend as $laporanend): ?>
                           <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                 <div class="fw-bold"><?= $laporanend['title'] ?></div>
                                 <p style="font-size: 12px;" class="text-wrap"><?= $laporanend['description'] ?></p>
                                 <hr>
                                 <p style="font-size: 12px;"><?= $laporanend['create_at'] ?></p>
                              </div>
                              <?php
                              if ($laporanend['dokumen'] == NULL) { ?>
                                 <span class="badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#upload<?= $laporanend['id_rpt_mnth'] ?>">Upload File</span>
                              <?php  } else { ?>
                                 <a href="../file/report/<?= $laporanend['dokumen'] ?>" target="_blank" download="">
                                    <span class="badge text-bg-primary">Download File</span>
                                 </a>
                              <?php  }
                              ?>
                              <!-- Modal -->
                              <div class="modal fade" id="upload<?= $laporanend['id_rpt_mnth'] ?>" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">File Upload</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <form action="" method="POST" enctype="multipart/form-data">
                                          <input type="hidden" name="id" value="<?= $laporanend['id_rpt_mnth'] ?>">
                                          <div class="modal-body">
                                             <div class="alert mt-3 alert-danger d-flex align-items-center" role="alert">
                                                <i class="fas fa-exclamation-triangle me-2"></i>
                                                <div>
                                                   Format File PDF atau JPG dengan maksimal File 2 MB
                                                </div>
                                             </div>
                                             <div class="mb-3">
                                                <label for="dokumen" class="form-label">File</label>
                                                <input type="file" class="form-control" id="dokumen" name="dokumen" required>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" name="upload-month" class="btn btn-ungu text-white">Upload Proses</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        <?php endforeach ?>
                     </ol>
                  <?php    }
                  ?>

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
</body>


<!-- Modal -->
<div class="modal fade" id="add" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Laporan Bulanan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $_SESSION['username'] ?>">
            <div class="modal-body">
               <div class="mb-3">
                  <label for="judul" class="form-label">Judul Laporan</label>
                  <input type="text" class="form-control" id="judul" name="judul" required>
               </div>
               <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
               <button type="submit" name="report-month" class="btn btn-ungu text-white">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add-end" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Laporan Akhir</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $_SESSION['username'] ?>">
            <div class="modal-body">
               <div class="alert mt-3 alert-danger d-flex align-items-center" role="alert">
                  <i class="fas fa-exclamation-triangle me-2"></i>
                  <div>
                     Format File PDF atau JPG dengan maksimal File 2 MB
                  </div>
               </div>
               <div class="mb-3">
                  <label for="dokumen" class="form-label">File</label>
                  <input type="file" class="form-control" id="dokumen" name="dokumen" required>
               </div>
               <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
               <button type="submit" name="upload-end" class="btn btn-ungu text-white">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit-end" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Laporan Akhir</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $datalaporanend['id_rpt_end'] ?>">
            <div class="modal-body">
               <div class="alert mt-3 alert-danger d-flex align-items-center" role="alert">
                  <i class="fas fa-exclamation-triangle me-2"></i>
                  <div>
                     Format File PDF atau JPG dengan maksimal File 2 MB
                  </div>
               </div>
               <div class="mb-3">
                  <label for="dokumen" class="form-label">File</label>
                  <input type="file" class="form-control" id="dokumen" name="dokumen" required>
               </div>
               <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required><?= $datalaporanend['description'] ?></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
               <button type="submit" name="upload-end-update" class="btn btn-ungu text-white">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

</html>