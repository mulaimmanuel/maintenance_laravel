@extends('layout')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qzQ9pyH1/Nkq4ysbr8yjBq44xDG/BaUkmUamJsIviGniGRC3plUSllPPe9wCJlY6k4t5IfMEO/A7R5Q2TDe2iQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-mt-4">
                <div class="card">
                    <div class="accordion">
                        <div class="card-body">
                            <h5 class="card-title">Form Lihat FPP</h5>
                            <div class="collapse" id="updateProgress">

                                <form id="FPPForm" action="{{ route('formperbaikans.update', $formperbaikan->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

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
                                        <label for="section" class="form-label">
                                            Section<span style="color: red;">*</span>
                                        </label>
                                        <select class="form-select" id="section" name="section" disabled>
                                            <option value="{{ $formperbaikan->section }}" selected>{{ $formperbaikan->section }}</option>
                                        </select>
                                        <input type="hidden" name="section" value="{{ $formperbaikan->section }}">
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
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <div id="gambarPreviewContainer">
                                            @if($formperbaikan->gambar)
                                            <img id="gambarPreview" src="{{ asset($formperbaikan->gambar) }}" alt="Preview Gambar" style="max-width: 200px;">
                                            @else
                                            <p>No image available</p>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-mt-4">
                <div class="card">
                    <div class="accordion">
                        <div class="card-body">
                            <h5 class="card-title">Update Progress</h5>

                            <div class="collapse" id="updateProgress">
                                <!-- Form Update Progress -->
                                <form id="updateForm" action="{{ route('formperbaikans.update', $formperbaikan->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @php
                                    $latestTindakLanjut = $formperbaikan->tindaklanjuts->last();
                                    @endphp

                                    @if ($latestTindakLanjut)
                                    <!-- Tindak Lanjut -->
                                    <div class="mb-3">
                                        <label for="tindak_lanjut" class="form-label">Tindak Lanjut</label>
                                        <textarea class="form-control" id="tindak_lanjut" name="tindak_lanjut" rows="3">{{ old('tindak_lanjut', $latestTindakLanjut->tindak_lanjut ?? '') }}</textarea>
                                    </div>

                                    <!-- Due Date -->
                                    <div class="mb-3">
                                        <label for="due_date" class="form-label">Due Date</label>
                                        <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $latestTindakLanjut->due_date ?? '') }}">
                                    </div>

                                    <!-- Schedule Pengecekan -->
                                    <div class="mb-3">
                                        <label for="schedule_pengecekan" class="form-label">Schedule Pengecekan</label>
                                        <input type="date" class="form-control" id="schedule_pengecekan" name="schedule_pengecekan" value="{{ old('schedule_pengecekan', $latestTindakLanjut->schedule_pengecekan ?? '') }}">
                                    </div>

                                    <!-- Input for attachment file -->
                                    <div class="mb-3">
                                        @if($latestTindakLanjut->attachment_file)
                                        <label for="attachment_file" class="form-label">Attachment File</label>
                                        <!-- Input file for existing attachment -->
                                        <input type="file" class="form-control" id="attachment_file" name="attachment_file">
                                        <br>
                                        @php
                                        $filePath = asset('storage/' . $latestTindakLanjut->attachment_file);
                                        $fileName = basename($latestTindakLanjut->attachment_file);
                                        @endphp
                                        <a href="{{ $filePath }}" target="_blank" download="{{ $fileName }}">
                                            <img src="{{ $filePath }}" alt="{{ $fileName }}" class="img-thumbnail">
                                        </a>
                                        <br>
                                        @else
                                        <!-- Input file for new attachment -->
                                        <label for="attachment_file" class="form-label">Attachment File</label>
                                        <input type="file" class="form-control" id="attachment_file" name="attachment_file">
                                        <br>
                                        <p>No attachment file found.</p>
                                        @endif
                                    </div>

                                    <!-- Hidden Inputs for Confirmation -->
                                    <input type="hidden" name="confirmed_finish" id="confirmed_finish" value='0'>
                                    <input type="hidden" name="confirmed_finish6" id="confirmed_finish6" value='0'>

                                    @else
                                    <p>No Tindak Lanjut found.</p>
                                    @endif
                                    <div class="text-end">
                                        <button type="button" class="btn btn-secondary" id="saveButton" onclick="handleSaveButtonClick()">Save</button>
                                        <button type="button" class="btn btn-primary" id="finishButton" onclick="handleFinishButtonClick()">Finish</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <div class="accordion">
                            <h5 class="card-title">Tabel History Progress</h5>
                            <div class="collapse" id="updateProgress">
                                <!-- Tabel History Progress -->
                                <div class="table-responsive">
                                    <table class="table datatable w-100 table-striped table-bordered">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tindak Lanjut</th>
                                                <th scope="col">Schedule Pengecekan</th>
                                                <th scope="col">Operator</th>
                                                <th scope="col">Due Date</th>
                                                <th scope="col">File</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Note</th>
                                                <th scope="col">Last Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($formperbaikan->tindaklanjuts as $tindaklanjut)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $tindaklanjut->tindak_lanjut }}</td>
                                                <td>{{ $tindaklanjut->schedule_pengecekan }}</td>
                                                <td>PIC</td>
                                                <td>{{ $tindaklanjut->due_date }}</td>
                                                <td>
                                                    @if ($tindaklanjut->attachment_file)
                                                    @php
                                                    $fileName = basename($tindaklanjut->attachment_file);
                                                    $buttonClass = $tindaklanjut->getAttachmentButtonClass();
                                                    $buttonIcon = $tindaklanjut->getAttachmentButtonIcon();
                                                    @endphp
                                                    <a href="{{ route('download.attachment', $tindaklanjut) }}" target="_blank" class="{{ $buttonClass }}">
                                                        <i class="{{ $buttonIcon }}"></i> {{ $fileName }}
                                                    </a>
                                                    @else
                                                    <span class="text-muted">N/A</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div style="background-color: {{ $tindaklanjut->status_background_color }};
                                            border-radius: 5px; /* Rounded corners */
                                            padding: 5px 10px; /* Padding inside the div */
                                            color: white; /* Text color, adjust as needed */
                                            font-weight: bold; /* Bold text */
                                            text-align: center; /* Center-align text */
                                            text-transform: uppercase; /* Uppercase text */
                                            ">
                                                        {{ $tindaklanjut->ubahtext() }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="background-color: {{ $tindaklanjut->note_background_color }};
                        border-radius: 5px; /* Rounded corners */
                        padding: 5px 10px; /* Padding inside the div */
                        color: black; /* Text color, adjust as needed */
                        font-weight: bold; /* Bold text */
                        text-align: center; /* Center-align text */
                        text-transform: uppercase; /* Uppercase text */
                        ">
                                                        {{ $tindaklanjut->note }}
                                                    </div>
                                                </td>
                                                <td>{{ $tindaklanjut->updated_at }}</td>
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

<!-- Letakkan skrip JavaScript ini di dalam tag <head> atau sebelum tag </body> -->
<script>
    function handleSaveButtonClick() {
        // Validate schedule_pengecekan against due_date
        var schedulePengecekan = document.getElementById('schedule_pengecekan').value;
        var dueDate = document.getElementById('due_date').value;

        if (schedulePengecekan && dueDate && schedulePengecekan > dueDate) {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Schedule Pengecekan tidak boleh melebihi Due Date.'
            });
            return;
        }

        // If validation passes, proceed with form submission
        document.getElementById('confirmed_finish6').value = '1';
        document.getElementById('updateForm').submit();
    }
</script>


<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var img = document.createElement("img");
            img.src = reader.result;
            img.alt = "Preview Gambar";
            img.style.maxWidth = "200px";
            var container = document.getElementById("gambarPreviewContainer");
            container.innerHTML = ""; // Clear existing content
            container.appendChild(img);
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var attachmentInput = document.getElementById('attachment_file');
        var filePreview = document.getElementById('filePreview');

        // Check if there's an existing file and trigger previewFile
        if (attachmentInput.files.length > 0) {
            previewFile(attachmentInput, filePreview);
        }

        attachmentInput.addEventListener('change', function() {
            previewFile(this, filePreview);
        });

        function previewFile(input, previewElement) {
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                if (file.type.includes('image')) {
                    previewElement.src = e.target.result;
                } else if (file.name.toLowerCase().endsWith('.xlsx') || file.name.toLowerCase().endsWith('.xls')) {
                    // For Excel files, provide a link for downloading
                    var excelLink = document.createElement('a');
                    excelLink.href = e.target.result;
                    excelLink.textContent = 'Download Excel File';
                    excelLink.setAttribute('target', '_blank');
                    previewElement.innerHTML = '';
                    previewElement.appendChild(excelLink);
                } else {
                    // For other file types, display a message
                    previewElement.textContent = 'Preview not available for this file type.';
                }
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
        // Validate schedule_pengecekan against due_date
        var schedulePengecekan = document.getElementById('schedule_pengecekan').value;
        var dueDate = document.getElementById('due_date').value;

        if (schedulePengecekan && dueDate && schedulePengecekan > dueDate) {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Schedule Pengecekan tidak boleh melebihi Due Date.'
            });
            return;
        }

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin mengubah status menjadi Finish?',
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
                        document.getElementById('updateForm').submit();
                    }
                });
            }
        });
    }
</script>