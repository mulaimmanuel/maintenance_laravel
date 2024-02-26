@extends('layout')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Schedule Visit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Schedule Visit</h5>
                    <div id='calendar'></div>
                </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        
    </section>
</main><!-- End #main -->


@endsection
@section('scripts')
    <script src="{{asset('assets/js/viewcalendar.js')  }}"></script>
    <script>
        var scheduleVisits = {!! json_encode($scheduleVisits) !!};
    </script>
@endsection