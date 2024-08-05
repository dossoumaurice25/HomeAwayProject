
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin| Tableau de bord @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendord/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
  <style>
    .img-bg{
        background-size: cover;
        background-repeat: no-repeat;
        width:50%;
        height:200px;
        border-radius: 50%;
        background-position: center;
    }
</style>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 7 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">HomeAway</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/profil_null.jpg') }}" alt="Profile" class="rounded-circle">
            {{-- <div style="background-image: url('{{ asset('storage/' .$chambre->image_path) }}') ;" class="img-bg"></div> --}}
            <span class="d-none d-md-block dropdown-toggle ps-2"> Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Mon Profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Paramètre du Compte</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Se déconnecter</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->



  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Tableau de bord</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('proprietaires.index') }}">
          <i class="bi bi-menu-button-wide"></i><span>Liste des Propriétaires</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('locataires.index') }}">
          <i class="bi bi-menu-button-wide"></i><span>Liste des Locataires</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed "  href="{{ route('admin.chambres.index') }}">
          <i class="bi bi-layout-text-window-reverse"></i><span>Approbation</span>
        </a>
      </li><!-- Gestion des réservations -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('admin.chambres.approved') }}">
          <i class="bi bi-layout-text-window-reverse"></i><span>Chambres Approuvées</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Paiements </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.paiement') }}">
              <i class="bi bi-circle"></i><span>Mes paiements</span>
            </a>
          </li>
        </ul>
      </li><!-- Réponse à un avis -->


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-person"></i>
          <span>Profil</span>
        </a>
      </li><!-- Profil-->
      <li class="nav-item">
        <a class="nav-link collapsed " href="#">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed " href="#">
            <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

    </ul>
  </aside><!-- End Sidebar-->



  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>HomeAway</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendord/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendord/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendord/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendord/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendord/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendord/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendord/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendord/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/maind.js') }}"></script>

</body>

</html>
