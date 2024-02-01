@extends('layout')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Create mesin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Create Mesin</h5>

                            <form id="mesinForm" action="{{ route('mesins.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="nama_mesin" class="form-label">
                                        Nama Mesin<span style="color: red;">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="nama_mesin" name="nama_mesin" required>
                                </div>

                                <div class="mb-3">
                                    <label for="no_mesin" class="form-label">
                                        No Mesin<span style="color: red;">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="no_mesin" name="no_mesin" required>
                                </div>

                                <div class="mb-3">
                                    <label for="merk" class="form-label">
                                        Merk<span style="color: red;">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="merk" name="merk" required>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">
                                        Type<span style="color: red;">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="type" name="type" required>
                                </div>

                                <div class="mb-3">
                                    <label for="mfg_date" class="form-label">
                                        Manufacturing date<span style="color: red;">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="mfg_date" name="mfg_date" placeholder="YYYY" min="1900" max="{{ date('Y') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="acq_date" class="form-label">
                                        Acquisition date<span style="color: red;">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="acq_date" name="acq_date" placeholder="YYYY" min="1900" max="{{ date('Y') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label">Age<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="age" name="age" readonly>
                                    <!-- Jika Anda ingin melakukan perhitungan Age secara otomatis, Anda perlu menambahkan JavaScript untuk menghitungnya. -->
                                </div>


                                <div class="mb-3">
                                    <label for="preventive_date" class="form-label">Schedule Preventive Date</label>
                                    <input type="date" class="form-control" id="preventive_date" name="preventive_date">
                                </div>

                                <img id="fotoPreview" src="" alt="" width="300" height="200" style="display: none;">

                                <div class="mb-3">
                                    <label for="foto" class="form-label">Upload Foto (Jika ada)</label>
                                    <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage(this, 'fotoPreview')">
                                </div>

                                <img id="sparepartPreview" src="" alt="Preview Sparepart" width="300" height="200" style="display: none;">

                                <div class="mb-3">
                                    <label for="sparepart" class="form-label">Upload Data Sparepart (Jika ada)</label>
                                    <input type="file" class="form-control" id="sparepart" name="sparepart" onchange="previewImage(this, 'sparepartPreview')">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button>
                                    <a href="{{ route('mesins.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function resetForm() {
            document.getElementById('mesinForm').reset();
        }
    </script>
    <script>
        function handleFormSubmission() {
            // Jika formulir valid, tampilkan SweetAlert untuk konfirmasi
            Swal.fire({
                title: 'Berhasil Disimpan!',
                text: 'Data mesin berhasil disimpan.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('mesinForm').submit();
                }
            });

        }

        // Event listener for form submission
        document.getElementById('mesinForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Call the function to handle form submission and show SweetAlert
            handleFormSubmission();
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Tambahkan skrip JavaScript untuk menghitung Age saat mengisi form
        document.getElementById('mfg_date').addEventListener('input', function() {
            calculateAge();
        });

        document.getElementById('acq_date').addEventListener('input', function() {
            calculateAge();
        });

        function calculateAge() {
            let mfgdate = parseInt(document.getElementById('mfg_date').value);
            let acquisitiondate = parseInt(document.getElementById('acq_date').value);

            if (!isNaN(mfgdate) && !isNaN(acquisitiondate)) {
                let age = acquisitiondate - mfgdate;
                document.getElementById('age').value = age >= 0 ? age : '';
            }
        }
    </script>

    <script>
        // Fungsi untuk menampilkan gambar setelah diunggah
        function previewImage(input, previewId) {
            var preview = document.getElementById(previewId);
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block'; // Menampilkan gambar setelah diunggah
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.style.display = 'none'; // Menyembunyikan gambar jika tidak ada file yang dipilih
            }
        }
    </script>

</main><!-- End #main -->
@endsection