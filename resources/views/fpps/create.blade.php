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
                <li class="breadcrumb-item active">Create FPP</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Create FPP</h5>

                            <form id="FPPForm" action="{{ route('formperbaikans.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="pemohon" class="form-label">
                                        Pemohon<span style="color: red;">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="pemohon" name="pemohon" required>
                                </div>

                                <div class="mb-3">
                                    <label for="date" class="form-label">
                                        Date<span style="color: red;">*</span>
                                    </label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>

                                <div class="mb-3">
                                    <label for="section" class="form-label">
                                        Pilih Section<span style="color: red;">*</span>
                                    </label>
                                    <select class="form-select" id="section" name="section" required>
                                        <option value="" disabled selected>Select Section</option>
                                        <option value="Cutting">Cutting</option>
                                        <option value="Machining">Machining</option>
                                        <option value="MC Custom">MC Custom</option>
                                        <option value="Bubut">Bubut</option>
                                        <option value="Heat Treatment">Heat Treatment</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="mesin" class="form-label">
                                        Pilih Mesin<span style="color: red;">*</span>
                                    </label>
                                    <select class="form-select" id="mesin" name="mesin" required>
                                        <option value="" disabled selected>Select Mesin</option>
                                        <option value="CC1">CC1</option>
                                        <option value="CC2">CC2</option>
                                        <option value="CC3">CC3</option>
                                        <option value="CC4">CC4</option>
                                        <option value="CC5">CC5</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">
                                        Lokasi Mesin<span style="color: red;">*</span>
                                    </label>
                                    <select class="form-select" id="lokasi" name="lokasi" required>
                                        <option value="" disabled selected>Select Lokasi Mesin</option>
                                        <option value="Deltamas">Deltamas</option>
                                        <option value="DS8">DS8</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="kendala" class="form-label">
                                        Kendala<span style="color: red;">*</span>
                                    </label>
                                    <textarea class="form-control" id="kendala" name="kendala" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <img id="gambarPreview" src="" alt="" width="300" height="200" style="display: none;">
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">
                                        Upload Gambar (Jika Ada)<span style="color: red;"></span>
                                    </label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImage(this, 'gambarPreview')">
                                </div>

                                <input type="hidden" name="note" id="note" value="">

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button>
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
            document.getElementById('FPPForm').reset();
        }
    </script>
    <script>
        function handleFormSubmission() {
            // Jika formulir valid, tampilkan SweetAlert untuk konfirmasi
            Swal.fire({
                title: 'Berhasil Disimpan!',
                text: 'Data Form FPP berhasil disimpan.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect or perform any other action after clicking OK
                    document.getElementById('FPPForm').submit();
                }
            });
        }

        // Event listener for form submission
        document.getElementById('FPPForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Call the function to handle form submission and show SweetAlert
            handleFormSubmission();
        });

        function resetForm() {
            document.getElementById('FPPForm').reset();
            document.getElementById('gambarPreview').style.display = 'none';
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