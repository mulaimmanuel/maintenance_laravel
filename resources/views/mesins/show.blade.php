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
                <li class="breadcrumb-item active">Lihat mesin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
            <div class="row">

                <!-- Section 1 - Form -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Lihat Mesin</h5>
                            <!-- Form di sini -->
                            <form id="mesinForm" action="{{ route('mesins.update', $mesin->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <div>
                                        @if($mesin->foto)
                                        <img id="fotoPreview" src="{{ asset('storage/'.$mesin->foto) }}" alt="Existing Foto" width="300" height="200">
                                        @else
                                        <p>Tidak ada foto tersimpan.</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_mesin" class="form-label">Nama Mesin</label>
                                    <input type="text" class="form-control" id="nama_mesin" name="nama_mesin" value="{{ $mesin->nama_mesin }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="no_mesin" class="form-label">No Mesin</label>
                                    <input type="text" class="form-control" id="no_mesin" name="no_mesin" value="{{ $mesin->no_mesin }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="merk" class="form-label">Merk</label>
                                    <input type="text" class="form-control" id="merk" name="merk" value="{{ $mesin->merk }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <input type="text" class="form-control" id="type" name="type" value="{{ $mesin->type }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="mfg_date" class="form-label">Manufacturing date</label>
                                    <input type="number" class="form-control" id="mfg_date" name="mfg_date" placeholder="YYYY" min="1900" max="{{ date('Y') }}" value="{{ $mesin->mfg_date }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="acq_date" class="form-label">Acquisition date</label>
                                    <input type="number" class="form-control" id="acq_date" name="acq_date" placeholder="YYYY" min="1900" max="{{ date('Y') }}" value="{{ $mesin->acq_date }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" class="form-control" id="age" name="age" readonly value="{{ $mesin->age }}">
                                </div>

                                <div class="mb-3">
                                    <label for="preventive_date" class="form-label">Schedule Preventive Date</label>
                                    <input type="date" class="form-control" id="preventive_date" name="preventive_date" value="{{ $mesin->preventive_date }}">
                                </div>

                                <!-- ... (form fields) ... -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button>
                                    <a href="{{ route('mesins.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <b>
                                <h5 class="card-title">Table List Sparepart</h5>
                            </b>
                            <table class="table table-bordered datatable" id="table1" style="width:100%">
                                <!-- Isi tabel 1 disini -->
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sparepart</th>
                                        <th>Vendor</th>
                                        <th>Leadtime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Item 1</td>
                                        <td>Vendor A</td>
                                        <td>3 Hari</td>
                                    </tr>
                                    <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <b>
                                <h5 class="card-title">Table History Kerusakan Mesin</h5>
                            </b>
                            <table class="table table-bordered datatable" id="table2" style="width:100%">
                                <!-- Isi tabel 2 disini -->
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tiket</th>
                                        <th>Mesin</th>
                                        <th>Section</th>
                                        <th>Lokasi</th>
                                        <th>Kendala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td> </td>
                                        <td>Aktif</td>
                                    </tr>
                                    <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
            $('#table2').DataTable();
        });
    </script>

    <script>
        function resetForm() {
            document.getElementById('mesinForm').reset();
        }
    </script>
    <script>
        function handleFormSubmission() {

            Swal.fire({
                title: 'Berhasil Diubah!',
                text: 'Data mesin berhasil diubah.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect or perform any other action after clicking OK
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
        document.getElementById('acq_date').addEventListener('input', function() {
            let mfgdate = parseInt(document.getElementById('mfg_date').value);
            let acquisitiondate = parseInt(this.value);

            if (!isNaN(mfgdate) && !isNaN(acquisitiondate)) {
                let age = acquisitiondate - mfgdate;
                document.getElementById('age').value = age >= 0 ? age : '';
            }
        });
    </script>

    <!-- Di bagian bawah formulir atau dalam tag <script> -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Menangkap elemen input file
            var fotoInput = document.getElementById('foto');
            var sparepartInput = document.getElementById('sparepart');

            // Menangkap elemen gambar
            var fotoPreview = document.getElementById('fotoPreview');
            var sparepartPreview = document.getElementById('sparepartPreview');

            // Mengatur listener untuk input file
            fotoInput.addEventListener('change', function() {
                previewImage(this, fotoPreview);
            });

            sparepartInput.addEventListener('change', function() {
                previewImage(this, sparepartPreview);
            });

            // Fungsi untuk menampilkan preview gambar
            function previewImage(input, previewElement) {
                var file = input.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewElement.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });
    </script>


</main><!-- End #main -->
@endsection
