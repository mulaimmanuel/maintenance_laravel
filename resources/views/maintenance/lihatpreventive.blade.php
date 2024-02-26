@extends('layout')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<main id="main" class="main">
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Preventive Maintenance</h2>
                            <form id="FPPForm" action="{{ route('preventives.update', $preventive->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="nama_mesin" class="form-label">
                                        Nama Mesin<span style="color: red;">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="nama_mesin" name="nama_mesin" value="{{ $preventive->nama_mesin }}">
                                </div>

                                <div class="mb-3">
                                    <label for="section" class="form-label">
                                        Section<span style="color: red;">*</span>
                                    </label>
                                    <select class="form-select" id="section" name="section">
                                        <option value="{{ $preventive->section }}" selected>{{ $preventive->section }}</option>
                                    </select>
                                    <input type="hidden" name="section" value="{{ $preventive->section }}">
                                </div>

                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">
                                        Lokasi Mesin<span style="color: red;">*</span>
                                    </label>
                                    <select class="form-select" id="lokasi" name="lokasi">
                                        <option value="{{ $preventive->lokasi }}" selected>{{ $preventive->lokasi }}</option>
                                    </select>
                                    <input type="hidden" name="lokasi" value="{{ $preventive->lokasi }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Tabel Checklist Pengecekan</h2>
                            <div class="table-responsive">
                                <!-- Your table goes here -->
                                <table class="table datatable w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Aktivitas</th>
                                            <th scope="col">Checklist</th>
                                            <th scope="col">Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Menangkap elemen input file
        var gambarInput = document.getElementById('gambar');

        // Menangkap elemen gambar
        var gambarPreview = document.getElementById('gambarPreview');

        // Mengatur listener untuk input file
        fotoInput.addEventListener('change', function() {
            previewImage(this, gambarPreview);
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
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>