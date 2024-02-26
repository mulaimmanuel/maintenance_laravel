<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Astra Daido Steel Indonesia</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('public/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('public/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    {{-- Dropdown Search --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- CSS for full calendar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
            <b>
                <li class="nav-label">Maintenance Menu</h5>
            </b>
            <li class="nav-label">Production</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#prod-forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Form Permintaan Perbaikan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="prod-forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <a class="nav-link collapsed" href="{{ asset('dashboardproduction') }}">
                        <i class="bi bi-list-check"></i>
                        <span>Data Form FPP</span>
                    </a>
                </ul>
            </li><!-- End Prod Forms Nav -->
            <li class="nav-label">Maintenance</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#maint-received-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Received FPP & Jadwal Preventive</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="maint-received-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ asset('dashboardmaintenance') }}">
                            <i class="bi bi-file-earmark-text-fill"></i>
                            <span>Data Received FPP</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ asset('dashpreventive') }}">
                            <i class="bi bi-calendar"></i>
                            <span>Data Jadwal Preventive</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Maint Received Nav -->

            <li class="nav-label">Dept. Maintenance</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#dept-maint-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Mesin & Approve FPP</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="dept-maint-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ asset('mesins') }}">
                            <i class="bi bi-gear"></i>
                            <span>Data Mesin</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ asset('dashboarddeptmtce') }}">
                            <i class="bi bi-check2"></i>
                            <span>Data Approved FPP</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Dept Maint Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#dept-complain-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Complain & Claim</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="dept-complain-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('submission') }}">
                            <i class="bi bi-circle"></i><span>Submission</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-layouts.html">
                            <i class="bi bi-circle"></i><span>History Complain & Claim</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('scheduleVisit') }}">
                            <i class="bi bi-circle"></i><span>Schedule Visit</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Dept Complain & Claim Nav -->

            <li class="nav-label">Sales</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#sales-fpp-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Form Permintaan Perbaikan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="sales-fpp-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ asset('dashboardfppsales') }}">
                            <i class="bi bi-list-check"></i>
                            <span>Data Form FPP</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Sales FPP Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#sales-complain-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Claim & Handling</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="sales-complain-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('index') }}">
                            <i class="bi bi-circle"></i><span>Handling Sales</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-layouts.html">
                            <i class="bi bi-circle"></i><span>History Complain & Claim</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('scheduleVisit') }}">
                            <i class="bi bi-circle"></i><span>Schedule Visit</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Sales Complain & Claim Nav -->

        </ul>
    </aside>



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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

    {{-- JS Search DropDown --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- datatable --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    {{-- searchdropdownJS --}}
    <!-- Tambahkan library Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    {{-- JSSweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="js/datatables-simple-demo.js"></script>

    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

    @yield('scripts')
    <script>
        function confirmStatusChange(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to change the status to "Close".',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna menekan tombol "Yes", kirim permintaan PATCH ke endpoint changeStatus
                    changeStatus(id);
                    window.location.href = "{{ route('index') }}";
                }
            });
        }
        // Fungsi untuk mengirimkan permintaan PATCH ke endpoint changeStatus
        function changeStatus(id) {
            // Kirimkan permintaan AJAX menggunakan jQuery
            $.ajax({
                type: 'PATCH', // Metode HTTP yang digunakan adalah PATCH
                url: '/changeStatus/' + id, // URL endpoint dengan parameter id
                data: {
                    _token: '{{ csrf_token() }}', // Token CSRF untuk keamanan
                    _method: 'PATCH' // Metode HTTP yang digunakan adalah PATCH
                },
                success: function(response) {
                    // Tampilkan pesan sukses jika permintaan berhasil
                    Swal.fire('Success!', 'Status has been changed successfully.', 'success');
                    // Lakukan reload halaman atau update tabel jika diperlukan
                    window.location.href = "{{ route('index') }}";
                }
            });
        }
        // imageModal
        $(document).ready(function() {
            $('.clickable-image').click(function() {
                var imageUrl = $(this).attr('src');
                $('#modalImage').attr('src', imageUrl);
                $('#imageModal').modal('show');
            });
        });

        function SaveAndUpdate() {
            // Lakukan sesuatu saat tombol "Save" atau "Finish" ditekan
            // Contoh: Validasi form, kemudian kirimkan data melalui AJAX jika valid
            // Untuk contoh sederhana, saya hanya menampilkan pesan
            alert('Save or Finish button clicked');
        }

        function FinishAndUpdate() {
            // Lakukan sesuatu saat tombol "Back" ditekan
            // Contoh: Kembali ke halaman sebelumnya atau lakukan navigasi lainnya
            // Untuk contoh sederhana, saya hanya menampilkan pesan
            alert('Back button clicked');
        }
        //sweetalertSave
        function validateAndSubmit() {
            // Simulasi validasi
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Data has been saved successfully.',
            });
        }
        //datatabelSales
        $(document).ready(function() {
            new DataTable('#viewSales');

        });

        //datatableSubmision
        $(document).ready(function() {
            new DataTable('table.display');
        });

        //COnfrimDelete
        document.addEventListener('DOMContentLoaded', function() {
            // Menggunakan event listener untuk menangkap klik pada tombol delete
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Menampilkan SweetAlert untuk konfirmasi penghapusan
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You sure delete this data?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna menekan tombol konfirmasi pada SweetAlert,
                            // maka arahkan ke rute penghapusan
                            window.location.href = button.getAttribute('data-url');
                        }
                    });
                });
            });
        });

        // //jsDropdownCLaim-cutting
        document.getElementById('process_type').addEventListener('change', function() {
            var dropdownValue = this.value;
            var checkBox1 = document.getElementById('type_1');

            if (dropdownValue === 'Cutting') {
                checkBox1.checked = true;
            } else {
                checkBox1.checked = false;
            }
        });

        //RefreshFromPageInputCreateHandling
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            // Check if the page was accessed from the index page
            const fromIndex = document.referrer.includes("index");

            if (fromIndex) {
                // Set initial values for form elements if coming from index page
                resetFormValues();
            }

            const resetButton = document.querySelector('button[type="reset"]');

            resetButton.addEventListener('click', function() {
                // Reset values to default or empty
                resetFormValues();

                // Hide cancel upload button and error message
                document.getElementById('cancelUpload').style.display = 'none';
                document.getElementById('fileError').style.display = 'none';
            });

            function resetFormValues() {
                // Reset values to default or empty for text inputs
                const textInputs = form.querySelectorAll('input[type="text"]');
                textInputs.forEach(input => {
                    input.value = '';
                });

                // Reset selected values for dropdowns
                const selects = form.querySelectorAll('select');
                selects.forEach(select => {
                    select.value = '';
                });

                // Reset checkboxes to default state (checked or unchecked)
                const checkboxes = form.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = checkbox.defaultChecked;
                });
            }
        });
        // readimageform
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);

            // Show the preview image div
            document.getElementById('imagePreview').style.display = 'block';
        }

        //upload fileJS
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('formFile');
            const cancelUploadButton = document.getElementById('cancelUpload');
            const fileError = document.getElementById('fileError');

            fileInput.addEventListener('change', handleFileSelection);
            cancelUploadButton.addEventListener('click', cancelFileUpload);

            function handleFileSelection() {
                const allowedFormats = ['image/jpeg', 'image/png', 'image/gif']; // Add more formats if needed
                const selectedFile = fileInput.files[0];

                if (selectedFile) {
                    if (allowedFormats.includes(selectedFile.type)) {
                        // Valid image format
                        fileError.style.display = 'none';
                        cancelUploadButton.style.display = 'inline-block';
                    } else {
                        // Invalid image format
                        fileError.style.display = 'block';
                        cancelUploadButton.style.display = 'none';
                        resetFileInput();
                    }
                }
            }


            function cancelFileUpload() {
                resetFileInput();
                fileError.style.display = 'none';
                cancelUploadButton.style.display = 'none';

                // Hide the preview image div
                document.getElementById('imagePreview').style.display = 'none';
                // Hide the cancel upload button
                document.getElementById('cancelUpload').style.display = 'none';
                // Clear the file input value
                document.getElementById('formFile').value = '';
            }

            function resetFileInput() {
                // Reset file input by cloning and replacing it
                const newFileInput = fileInput.cloneNode(true);
                fileInput.parentNode.replaceChild(newFileInput, fileInput);
                newFileInput.addEventListener('change', handleFileSelection);
            }
        });

        //reset
        document.addEventListener('DOMContentLoaded', function() {
            const resetButton = document.querySelector('button[type="submit"][name="reset"]');
            const form = document.querySelector('form');

            resetButton.addEventListener('click', function() {
                // Reset values to default or empty
                form.reset();

                // Reset checkboxes to default state (checked or unchecked)
                const checkboxes = form.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = checkbox.defaultChecked;
                });

                // Hide cancel upload button and error message
                document.getElementById('cancelUpload').style.display = 'none';
                document.getElementById('fileError').style.display = 'none';
            });
        });

        //backButonSales
        function goToIndex() {
            window.location.href = "{{ route('index') }}"; // Ganti 'index' dengan nama rute halaman index Anda
        }

        // searchdropdown
        // Inisialisasi Select2 pada semua dropdown dengan class "select2"
        $(document).ready(function() {
            $('.select2').select2();
        });

        //backButonDeptMan
        function goToSubmission() {
            window.location.href = "{{ route('submission') }}"; // Ganti 'index' dengan nama rute halaman index Anda
        }

        // searchdropdown
        // Inisialisasi Select2 pada semua dropdown dengan class "select2"
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>


</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all the accordion elements
        var accordions = document.querySelectorAll('.accordion');

        // Add click event listener to each accordion
        accordions.forEach(function(accordion) {
            // Toggle the 'show' class on collapse element when the accordion title is clicked
            accordion.querySelector('.card-title').addEventListener('click', function() {
                accordion.querySelector('.collapse').classList.toggle('show');
            });
        });
    });
</script>
<style>
    #footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #f8f9fa;
        padding: 10px;
        text-align: center;
        box-shadow: 0px -5px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    #footer .copyright,
    #footer .credits {
        color: #343a40;
    }

    /* Tambahkan gaya untuk membuat footer berada di tengah */
    @media (min-height: 100vh) {
        body {
            margin-bottom: calc(10px + 2em);
            /* Sesuaikan dengan tinggi footer */
        }
    }
</style>