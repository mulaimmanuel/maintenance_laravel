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
                        <h5 class="card-title">List Data Jadwal Preventive</h5>
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
                                        <th scope="col">Status</th>
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
                                        <td>{{ $preventive->merk }}</td>
                                        <td>{{ $preventive->no_mesin }}</td>
                                        <td>{{ $preventive->mfg_date }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#issueModal{{ $preventive->id }}">
                                                <i class="bi bi-list-check"></i> <!-- Icon for View Issue -->
                                            </button>
                                            <!-- Issue Modal -->
                                            <div class="modal fade" id="issueModal{{ $preventive->id }}" tabindex="-1" role="dialog" aria-labelledby="issueModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="issueModalLabel">Issue Untuk {{ $preventive->nama_mesin }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="issueForm">
                                                                <div class="form-group" id="issueItemsContainer">
                                                                    <label for="issueChecklist">Issue Checklist</label><br><br>
                                                                    @php
                                                                    $issueItems = explode(',', $preventive->issue);
                                                                    @endphp
                                                                    @foreach ($issueItems as $item)
                                                                    <div class="form-check">
                                                                        <input type="checkbox" id="issue_{{ $item }}" name="issueChecklist[]" value="{{ $item }}" checked>
                                                                        <label for="issue_{{ $item }}" class="form-check-label">{{ $item }}</label>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <input type="text" class="form-control" id="newIssueItem" placeholder="Masukkan item issue baru">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary" onclick="addNewIssueItem()">Tambah</button>
                                                            <button type="button" class="btn btn-primary" onclick="saveIssue()">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#perbaikanModal{{ $preventive->id }}">
                                                <i class="bi bi-tools"></i> <!-- Icon for View Perbaikan -->
                                            </button>
                                            <!-- Perbaikan Modal -->
                                            <div class="modal fade" id="perbaikanModal{{ $preventive->id }}" tabindex="-1" role="dialog" aria-labelledby="perbaikanModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="perbaikanModalLabel">Rencana Perbaikan Untuk {{ $preventive->nama_mesin }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="perbaikanForm">
                                                                <div class="form-group" id="perbaikanItemsContainer">
                                                                    <label for="perbaikanChecklist">Perbaikan Checklist</label><br><br>
                                                                    @php
                                                                    $perbaikanItems = explode(',', $preventive->rencana_perbaikan);
                                                                    @endphp
                                                                    @foreach ($perbaikanItems as $item)
                                                                    <div class="form-check">
                                                                        <input type="checkbox" id="perbaikan_{{ $item }}" name="perbaikanChecklist[]" value="{{ $item }}" checked>
                                                                        <label for="perbaikan_{{ $item }}" class="form-check-label">{{ $item }}</label>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <input type="text" class="form-control" id="newPerbaikanItem" placeholder="Masukkan item perbaikan baru">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary" onclick="addNewPerbaikanItem()">Tambah</button>
                                                            <button type="button" class="btn btn-primary" onclick="savePerbaikan()">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>


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

<script>
    function addNewPerbaikanItem() {
        var newPerbaikanItem = document.getElementById('newPerbaikanItem').value;
        if (newPerbaikanItem.trim() !== '') {
            var perbaikanItemsContainer = document.getElementById('perbaikanItemsContainer');
            var newPerbaikanInput = document.createElement('div');
            newPerbaikanInput.classList.add('form-check');
            newPerbaikanInput.innerHTML = `
                <input type="checkbox" id="perbaikan_${newPerbaikanItem}" name="perbaikanChecklist[]" value="${newPerbaikanItem}" checked>
                <label for="perbaikan_${newPerbaikanItem}" class="form-check-label">${newPerbaikanItem}</label>
            `;
            perbaikanItemsContainer.appendChild(newPerbaikanInput);
            document.getElementById('newPerbaikanItem').value = ''; // Clear input field after adding item
        }
    }
</script>

<script>
    function addNewIssueItem() {
        var newIssueItem = document.getElementById('newIssueItem').value;
        if (newIssueItem.trim() !== '') {
            var issueItemsContainer = document.getElementById('issueItemsContainer');
            var newIssueInput = document.createElement('div');
            newIssueInput.classList.add('form-check');
            newIssueInput.innerHTML = `
                <input type="checkbox" id="issue_${newIssueItem}" name="issueChecklist[]" value="${newIssueItem}" checked>
                <label for="issue_${newIssueItem}" class="form-check-label">${newIssueItem}</label>
            `;
            issueItemsContainer.appendChild(newIssueInput);
            document.getElementById('newIssueItem').value = ''; // Clear input field after adding item
        }
    }
</script>