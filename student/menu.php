<?php
$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', $url);
$module = $segments[1] ?? ''; // Ambil 'student'
$page = $segments[3] ?? ''; // Ambil 'dashboard-mbkm'
?>
<!-- Bottom Navigation -->
<div class="bottom-nav">
   <a href="index" <?php if ($page == 'index' or $page == '') echo 'class="active"'; ?>>
      <i class="fas fa-home"></i>
      <span>Beranda</span>
   </a>
   <a href="laporan" <?php if ($page == 'laporan') echo 'class="active"'; ?>>
      <i class="fas fa-file"></i>
      <span>Laporan</span>
   </a>
   <a href="sertifikat" <?php if ($page == 'sertifikat') echo 'class="active"'; ?>>
      <i class="fas fa-certificate"></i>
      <span>Sertifikat</span>
   </a>
   <a href="log-book" <?php if ($page == 'log-book') echo 'class="active"'; ?>>
      <i class="fas fa-edit"></i>
      <span>Log Book</span>
   </a>
   <a href="profile" <?php if ($page == 'profile') echo 'class="active"'; ?>>
      <i class="fas fa-user"></i>
      <span>Profile</span>
   </a>
</div>