@extends('layout')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<main id="main" class="main">
    <!-- Existing content... -->
    <!-- New Form Content -->
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

                                <input type="hidden" name="confirmed_finish" id="confirmed_finish" value='0'>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-secondary" id="saveButton">Save</button>
                                    <button type="button" class="btn btn-primary" id="finishButton" onclick="handleFinishButtonClick()">Finish</button>
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
<script>
    function handleFinishButtonClick() {
        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin mengubah status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                // Set the value of confirmed_finish to 1 before submitting the form
                document.getElementById('confirmed_finish').value = '1';

                // Show success notification
                Swal.fire({
                    icon: 'success',
                    title: 'Status berhasil diubah!',
                    showConfirmButton: false,
                    timer: 1500, // Durasi notifikasi dalam milidetik
                    didClose: () => {
                        // Submit the form after the success notification is closed
                        document.getElementById('FPPForm').submit();
                    }
                });
            }
        });
    }
</script>