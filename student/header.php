<div class="header d-flex align-items-center justify-content-between">
   <div class="d-flex align-items-center">
      <img src="../avatar.jpg" alt="User Avatar" class="avatar-img">
      <div class="user-info ms-3">
         <h1><?= $_SESSION['fullname'] ?></h1>
         <p>Welcome back! MBKM APPS</p>
      </div>
   </div>

   <!-- Dropdown for logout -->
   <div class="dropdown">
      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
         <i class="fas fa-cog"></i>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
         <li><a class="dropdown-item" href="javascript:;">Help Desk</a></li>
         <li><a class="dropdown-item" href="javascript:;">Call Center WA</a></li>
         <li>
            <hr class="dropdown-divider">
         </li>
         <li><a class="dropdown-item" href="logout.php">Logout</a></li>
      </ul>
   </div>
</div>
<br><br><br>