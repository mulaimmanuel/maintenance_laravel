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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Lihat FPP</h5>

                            <form id="FPPForm" action="{{ route('formperbaikans.update', $formperbaikan->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="pemohon" class="form-label">
                                        Pemohon<span style="color: red;">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="pemohon" name="pemohon" value="{{ $formperbaikan->pemohon }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">
                                        Date<span style="color: red;">*</span>
                                    </label>
                                    <input type="date" class="form-control" id="date" name="date" value="{{ $formperbaikan->date }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="section" class="form-label">
                                        Section<span style="color: red;">*</span>
                                    </label>
                                    <select class="form-select" id="section" name="section" disabled>
                                        <option value="{{ $formperbaikan->section }}" selected>{{ $formperbaikan->section }}</option>
                                    </select>
                                    <input type="hidden" name="section" value="{{ $formperbaikan->section }}">
                                </div>
                                <div class="mb-3">
                                    <label for="mesin" class="form-label">
                                        Mesin<span style="color: red;">*</span>
                                    </label>
                                    <select class="form-select" id="mesin" name="mesin" disabled>
                                        <option value="{{ $formperbaikan->mesin }}" selected>{{ $formperbaikan->mesin }}</option>
                                    </select>
                                    <input type="hidden" name="mesin" value="{{ $formperbaikan->mesin }}">
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">
                                        Lokasi Mesin<span style="color: red;">*</span>
                                    </label>
                                    <select class="form-select" id="lokasi" name="lokasi" disabled>
                                        <option value="{{ $formperbaikan->lokasi }}" selected>{{ $formperbaikan->lokasi }}</option>
                                    </select>
                                    <input type="hidden" name="lokasi" value="{{ $formperbaikan->lokasi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="kendala" class="form-label">
                                        Kendala<span style="color: red;">*</span>
                                    </label>
                                    <textarea class="form-control" id="kendala" name="kendala" readonly>{{ $formperbaikan->kendala }}</textarea>
                                </div>
                                <div class="mb-3">
                                    @if($formperbaikan->gambar)
                                    <img id="gambarPreview" src="{{ asset('storage/'.$formperbaikan->gambar) }}" alt="" width="300" height="200">
                                    @else
                                    <p>Tidak ada foto tersimpan.</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel History Progress</h5>
                            <!-- Tabel History Progress -->
                            <div class="table-responsive">
                                <table class="table datatable w-100 table-striped table-bordered">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nomor Tiket</th>
                                            <th scope="col">Tindak Lanjut</th>
                                            <th scope="col">Schedule Pengecekan</th>
                                            <th scope="col">Operator</th>
                                            <th scope="col">Due Date</th>
                                            <th scope="col">File</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">Last Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($formperbaikans as $formperbaikan)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $formperbaikan->id }}</td>
                                            <td>{{ $formperbaikan->tindak_lanjut }}</td>
                                            <td>{{ $formperbaikan->schedule_pengecekan }}</td>
                                            <td>PIC</td>
                                            <td>{{ $formperbaikan->due_date }}</td>
                                            <td>
                                                @if ($formperbaikan->attachment_file)
                                                <a href="{{ route('download.excel', $formperbaikan) }}" target="_blank" class="btn btn-success">
                                                    <i class="bi bi-table"></i> Download Excel File
                                                </a>
                                                @else
                                                <span class="text-muted">N/A</span>
                                                @endif
                                            </td>


                                            <td>
                                                <div style="background-color: {{ $formperbaikan->note_background_color }};
                                            border-radius: 5px; /* Rounded corners */
                                            padding: 5px 10px; /* Padding inside the div */
                                            color: white; /* Text color, adjust as needed */
                                            font-weight: bold; /* Bold text */
                                            text-align: center; /* Center-align text */
                                            text-transform: uppercase; /* Uppercase text */
                                            ">
                                                    {{ $formperbaikan->note }}
                                                </div>
                                            </td>
                                            <td>{{ $formperbaikan->updated_at }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qzQ9pyH1/Nkq4ysbr8yjBq44xDG/BaUkmUamJsIviGniGRC3plUSllPPe9wCJlY6k4t5IfMEO/A7R5Q2TDe2iQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />