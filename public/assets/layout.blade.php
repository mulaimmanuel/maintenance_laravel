<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tables / Data - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('public/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('public/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <!-- Logo Section -->
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="Logo">
                <span class="d-none d-lg-block">Daido Steel</span>
            </a>

            <!-- Toggle Sidebar Button -->
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <!-- Search Bar -->
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <!-- Profile Dropdown -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6>Kevin Anderson</h6>
                <span>Web Designer</span>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item d-flex align-items-center" href="users-profile.html"><i class="bi bi-person"></i><span>My Profile</span></a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item d-flex align-items-center" href="users-profile.html"><i class="bi bi-gear"></i><span>Account Settings</span></a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item d-flex align-items-center" href="pages-faq.html"><i class="bi bi-question-circle"></i><span>Need Help?</span></a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-box-arrow-right"></i><span>Sign Out</span></a></li>
        </ul><!-- End Profile Dropdown Items -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <!-- ... (other menu items) ... -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="{{ asset('surats') }}">
                    <i class="bi bi-envelope-arrow-down"></i>
                    <span>Data Surat</span>
                </a>
            </li> -->
            <li class="nav-label">Maintenance</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ asset('mesins') }}">
                    <i class="bi bi-card-checklist"></i>
                    <span>Data Mesin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ asset('formperbaikans') }}">
                    <i class="bi bi-card-checklist"></i>
                    <span>Data Form FPP</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ asset('receivedfpps') }}">
                    <i class="bi bi-card-checklist"></i>
                    <span>Data Received FPP</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ asset('approvedfpps') }}">
                    <i class="bi bi-card-checklist"></i>
                    <span>Data Approved FPP</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ asset('preventives') }}">
                    <i class="bi bi-card-checklist"></i>
                    <span>Data Jadwal Preventive</span>
                </a>
            </li>
            <li class="nav-label">Claim Handling</li>
            <!-- Add Maintenance and Claim Handling labels -->
        </ul>
    </aside><!-- End Sidebar -->


    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>PT Astra Daido Steel Indonesia</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">PT Astra Daido Steel Indonesia</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>