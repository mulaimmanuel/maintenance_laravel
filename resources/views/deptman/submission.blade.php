@extends('layout')

@section('content')
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
                        <h5 class="card-title">Data Table Handling</h5>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table id="" class="display" style="table-layout: fixed;">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="50px">NO</th>
                                        <th class="text-center" width="100px">NO WO</th>
                                        <th class="text-center" width="100px">Customer Code</th>
                                        <th class="text-center" width="150px">Name Customer</th>
                                        <th class="text-center" width="50px">Area</th>
                                        <th class="text-center" width="100px">Type Material</th>
                                        <th class="text-center" width="30px">T</th>
                                        <th class="text-center" width="30px">W</th>
                                        <th class="text-center" width="30px">OD</th>
                                        <th class="text-center" width="30px">ID</th>
                                        <th class="text-center" width="30px">L</th>
                                        <th class="text-center" width="90px">Qty(/Ton)</th>
                                        <th class="text-center" width="30px">PCS</th>
                                        <th class="text-center" width="100px">Category (NG)</th>
                                        <th class="text-center" width="100px">Proses Type</th>
                                        <th class="text-center" width="100px">Type 1</th>
                                        <th class="text-center" width="100px">Image</th>
                                        <th class="text-center" width="100px">Last Update</th>
                                        <th class="text-center" width="100px">Status</th>
                                        <th class="text-center" width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                    <tr>
                                        <td class="text-center py-3">{{ ++$i }}</td>
                                        <td class="text-center py-3">{{ $row->no_wo }}</td>
                                        <td class="text-center py-3">{{ $row->customers->customer_code ?? '' }}</td>
                                        <td class="text-center py-3">{{ $row->customers->name_customer ?? '' }}</td>
                                        <td class="text-center py-3">{{ $row->customers->area ?? '' }}</td>
                                        <td class="text-center py-3">{{ $row->type_materials->type_name ?? '' }}
                                        </td>
                                        <td class="text-center py-3">{{ $row->thickness }}</td>
                                        <td class="text-center py-3">{{ $row->weight }}</td>
                                        <td class="text-center py-3">{{ $row->outer_diameter }}</td>
                                        <td class="text-center py-3">{{ $row->inner_diameter }}</td>
                                        <td class="text-center py-3">{{ $row->lenght }}</td>
                                        <td class="text-center py-3">{{ $row->qty }}</td>
                                        <td class="text-center py-3">{{ $row->pcs }}</td>
                                        <td class="text-center py-3">{{ $row->category }}</td>
                                        <td class="text-center py-3">{{ $row->process_type }}</td>
                                        <td class="text-center py-3">{{ $row->type_1 }}</td>
                                        <td class="text-center pt-3">
                                            <img src="{{ asset('/storage/handling/' . $row->image) }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                        </td>
                                        <td class="text-center py-3">{{ $row->created_at }}</td>
                                        <td class="text-center py-4">
                                            @if ($row->status == 0)
                                            <span class="badge bg-success align-items-center" style="font-size: 18px;">Open</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST">
                                                <a href="{{ route('showConfirm', $row->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-folder-open fa-2x"></i>
                                                    <!-- Gantilah 'fas fa-eye' dengan kelas ikon yang sesuai -->
                                                </a>
                                            </form>
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
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Table Handling</h5>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table id="" class="display" style="table-layout: fixed;">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="50px">NO</th>
                                        <th class="text-center" width="100px">NO WO</th>
                                        <th class="text-center" width="100px">Customer Code</th>
                                        <th class="text-center" width="150px">Name Customer</th>
                                        <th class="text-center" width="50px">Area</th>
                                        <th class="text-center" width="100px">Type Material</th>
                                        <th class="text-center" width="30px">T</th>
                                        <th class="text-center" width="30px">W</th>
                                        <th class="text-center" width="30px">OD</th>
                                        <th class="text-center" width="30px">ID</th>
                                        <th class="text-center" width="30px">L</th>
                                        <th class="text-center" width="90px">Qty(/Ton)</th>
                                        <th class="text-center" width="30px">PCS</th>
                                        <th class="text-center" width="100px">Category (NG)</th>
                                        <th class="text-center" width="100px">Proses Type</th>
                                        <th class="text-center" width="100px">Type 1</th>
                                        <th class="text-center" width="100px">Type 2</th>
                                        <th class="text-center" width="100px">Image</th>
                                        <th class="text-center" width="100px">Schedule Visit</th>
                                        <th class="text-center" width="100px">Due Date</th>
                                        <th class="text-center" width="100px">Pic</th>
                                        <th class="text-center" width="100px">Last Update</th>
                                        <th class="text-center" width="100px">Status</th>
                                        <th class="text-center" width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data2 as $row)
                                    <tr>
                                        <td class="text-center py-3">{{ ++$i }}</td>
                                        <td class="text-center py-3">{{ $row->no_wo }}</td>
                                        <td class="text-center py-3">{{ $row->customers->customer_code ?? '' }}
                                        </td>
                                        <td class="text-center py-3">{{ $row->customers->name_customer ?? '' }}
                                        </td>
                                        <td class="text-center py-3">{{ $row->customers->area ?? '' }}</td>
                                        <td class="text-center py-3">{{ $row->type_materials->type_name ?? '' }}
                                        </td>
                                        <td class="text-center py-3">{{ $row->thickness }}</td>
                                        <td class="text-center py-3">{{ $row->weight }}</td>
                                        <td class="text-center py-3">{{ $row->outer_diameter }}</td>
                                        <td class="text-center py-3">{{ $row->inner_diameter }}</td>
                                        <td class="text-center py-3">{{ $row->lenght }}</td>
                                        <td class="text-center py-3">{{ $row->qty }}</td>
                                        <td class="text-center py-3">{{ $row->pcs }}</td>
                                        <td class="text-center py-3">{{ $row->category }}</td>
                                        <td class="text-center py-3">{{ $row->process_type }}</td>
                                        <td class="text-center py-3">{{ $row->type_1 }}</td>
                                        <td class="text-center py-3">{{ $row->type_2 }}</td>
                                        <td class="text-center pt-3">
                                            <img src="{{ asset('/storage/handling/' . $row->image) }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                        </td>
                                        <td class="text-center pt-3">{{ $row->schedule_visit }}</td>
                                        <td class="text-center pt-3">{{ $row->due_date }}</td>
                                        <td class="text-center pt-3">{{ $row->pic }}</td>
                                        <td class="text-center py-3">{{ $row->created_at }}</td>
                                        <td class="text-center py-3" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            @if ($row->status == 0)
                                            <span class="badge bg-success align-items-center" style="font-size: 18px;">Open</span>
                                            @elseif ($row->status == 1)
                                            <span class="badge bg-warning align-items-center" style="font-size: 18px;">On Progress</span>
                                            @elseif($row->status == 2)
                                            <span class="badge bg-info align-items-center" style="font-size: 18px;">Finish</span>
                                            @elseif($row->status == 3)
                                            <span class="badge bg-danger align-items-center" style="font-size: 18px;">Close</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($row->status == 1)
                                            <a href="{{ route('showFollowUp', $row->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                                            </a>
                                            @elseif ($row->status == 2)
                                            <a href="{{ route('showHistoryProgres', $row->id) }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                            </a>
                                            @elseif ($row->status == 3)
                                            <a href="{{ route('showHistoryProgres', $row->id) }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                            </a>
                                            @endif
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