<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @yield('content-title')
  </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./public/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="./public/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./public/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="./public/css/style.css"> 
  
</head>
<body>
  <div class="container-scroller">    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index-2.html"><img src="./public/images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="./public/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="./public/images/faces/face5.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="fas fa-cog text-primary"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item">
                <i class="fas fa-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
         
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="./public/images/faces/face5.jpg" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                  Welcome Jane
                </p>
                <p class="designation">
                  Super Admin
                </p>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/home">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-matriculas" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Matriculas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-matriculas">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="/materias">Materias</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Alumnos</a></li>
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="#">Docentes</a></li>
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="#">Matriculas</a></li>
              </ul>
            </div>

          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-notas" aria-expanded="false" aria-controls="page-layouts">
              <i class="far fa-file-alt menu-icon"></i>
              <span class="menu-title">Notas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-notas">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="#">Record Acádemico</a></li>
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="#">Subir notas</a></li>
              </ul>
            </div>
          </li>

          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-usuarios" aria-expanded="false" aria-controls="page-layouts">
              <i class="fas fa-window-restore menu-icon"></i>
              <span class="menu-title">Usuarios</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-usuarios">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="#">Gestión Usuarios</a></li>
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="/grupos">Gestión de Grupos</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">

       <div class="content-wrapper">
        @yield('content')
       </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="./public/vendors/js/vendor.bundle.base.js"></script>
  <script src="./public/vendors/js/vendor.bundle.addons.js"></script>
  <script src="./public/js/off-canvas.js"></script>
  <script src="./public/js/hoverable-collapse.js"></script>
  <script src="./public/js/misc.js"></script>
  <script src="./public/js/settings.js"></script>
  <script src="./public/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="./public/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>


</html>
