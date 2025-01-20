<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TVRI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('assets/img/2.png') }}" rel="icon">
<link href="{{ url('assets/img/2.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ url('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ url('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ url('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/2.png" alt="">
        <span class="d-none d-lg-block"></span>
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

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <!-- Profile Dropdown -->
<li class="nav-item dropdown profile-dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
  <img src="assets/img/2.png" alt="Profile" class="rounded-circle">
  <span class="d-none d-md-block ps-2">username</span>
</a><!-- End Profile Image Icon -->
</ul><!-- End Profile Dropdown Items -->

</li><!-- End Profile Nav -->


      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- Master Dropdown -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#master-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-database"></i>
        <span>Master</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="master-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ url('/wilayah') }}">
            <i class="bi bi-geo-alt"></i><span>Wilayah Stasiun</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/kategori-acara') }}">
            <i class="bi bi-list"></i><span>Kategori Acara</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/role') }}">
            <i class="bi bi-key"></i><span>Hak Akses</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/user') }}">
            <i class="bi bi-person"></i><span>Pengguna</span>
          </a>
        </li>
      </ul>
    </li><!-- End Master Dropdown -->

    <!-- Kerjasama Dropdown -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#kerjasama-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-handshake"></i>
        <span>Kerjasama</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="kerjasama-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ url('/kerjasama-nasional') }}">
            <i class="bi bi-check-circle"></i><span>Kerjasama Nasional</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/kerja-sama-daerah') }}">
            <i class="bi bi-check-circle"></i><span>Kerjasama Daerah</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/approval-kerja-sama') }}">
            <i class="bi bi-check-circle"></i><span>Approval Kerja Sama</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/list-kerja-sama') }}">
            <i class="bi bi-briefcase"></i><span>List Kerja Sama</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/riwayat') }}">
            <i class="bi bi-clock-history"></i><span>Riwayat</span>
          </a>
        </li>
      </ul>
    </li><!-- End Kerjasama Dropdown -->

    <!-- Umpan Balik -->
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/feedback') }}">
        <i class="bi bi-chat-left-text"></i>
        <span>Umpan Balik</span>
      </a>
    </li><!-- End Umpan Balik Nav -->

  </ul>
</aside>
<!-- End Sidebar-->

<main id="main" class="main">

  @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>TVRI</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
<script src="{{ url('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ url('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ url('assets/vendor/quill/quill.js') }}"></script>
<script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ url('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ url('assets/js/main.js') }}"></script>


</body>

</html>