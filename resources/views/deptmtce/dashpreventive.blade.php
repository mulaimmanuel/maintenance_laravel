@extends('layout')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>

    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List Data Jadwal Preventif</h5>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Mesin</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">No Mesin</th>
                                        <th scope="col">Mulai Operasi</th>
                                        <th scope="col">Issue</th>
                                        <th scope="col">Rencana Perbaikan</th>
                                        <th scope="col">Created Date</th>
                                        <th scope="col">Last Update</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($preventives as $preventive)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $preventive->nama_mesin }}</td>
                                        <td>{{ $preventive->no_mesin }}</td>
                                        <td>{{ $preventive->merk}}</td>
                                        <td>{{ $preventive->mfg_date }}</td>
                                        <td>{{ $preventive->issue }}</td>
                                        <td>{{ $preventive->rencana_perbaikan }}</td>
                                        <td>
                                            <div style="background-color: {{ $preventive->status_background_color }};
                                            border-radius: 5px; /* Rounded corners */
                                            padding: 5px 10px; /* Padding inside the div */
                                            color: white; /* Text color, adjust as needed */
                                            font-weight: bold; /* Bold text */
                                            text-align: center; /* Center-align text */
                                            text-transform: uppercase; /* Uppercase text */
                                            ">
                                                {{ $preventive->ubahtext() }}
                                            </div>
                                        </td>

                                        <td>{{ $preventive->created_at }}</td>
                                        <td>{{ $preventive->updated_at }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('maintenance.editpreventive', $preventive->id) }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main><!-- End #main -->
@endsection
<script>
    function deleteSurat(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data yang dihapus tidak bisa dipakai kembali!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user clicks "Ya, hapus!" button, perform the deletion
                Swal.fire({
                    title: "Berhasil!",
                    text: "Nomor Surat Berhasil dihapus.",
                    icon: "success",
                    timer: 1000, // Penundaan (delay) sebelum mengeksekusi aksi berikutnya (dalam milidetik)
                    showConfirmButton: false // Menyembunyikan tombol OK
                }).then(() => {
                    // Add a button "OK" after the confirmation
                    Swal.fire({
                        title: "Info",
                        text: "Data berhasil dihapus!",
                        icon: "info",
                        showConfirmButton: true,
                        confirmButtonText: "OK"
                    }).then((okResult) => {
                        // Check if the user clicked "OK"
                        if (okResult.isConfirmed) {
                            // Submit the form
                            document.getElementById('suratForm_' + id).submit();
                        }
                    });
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "Gagal",
                    text: "Nomor Surat gagal dihapus",
                    icon: "error"
                });
            }
        });
    }
</script>