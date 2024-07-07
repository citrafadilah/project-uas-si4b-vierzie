@extends('layouts.user_type.auth')

@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif
    <div class="row mt-4 mb-4">
        <div class="w-100 mb-lg-0 mb-4">
            <div class="card "style="background-color: #F1EEDC;">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <h3 class="font-weight-bolder">Welcome, {{ auth()->user()->name }}</h3>
                                <h5>{{ now()->format('d-m-y') }}</h5>
                                <p class="mb-5">Sekarang anda Login Sebagai {{ auth()->user()->role }}</p>
                            </div>
                        </div>
                        <!-- <div class="card "style="background-color: #DA7297;"> -->
                        <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                            <img src="..\assets\img\logo.png" class="position-relative h-auto w-70" alt="waves">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4" bis_skin_checked="1">
            <div class="card" bis_skin_checked="1">
                <div class="card-body p-3" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-8" bis_skin_checked="1">
                            <div class="numbers" bis_skin_checked="1">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Obat Tersedia</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $data['obat'] }}
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end" bis_skin_checked="1">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
                                bis_skin_checked="1">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::User()->role === 'A')
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4" bis_skin_checked="1">
                <div class="card" bis_skin_checked="1">
                    <div class="card-body p-3" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-8" bis_skin_checked="1">
                                <div class="numbers" bis_skin_checked="1">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Obat Masuk</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $data['riwayat'] }}
                                        <span class="text-success text-sm font-weight-bolder"></span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end" bis_skin_checked="1">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
                                    bis_skin_checked="1">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <canvas id="myChart"></canvas>
    </div>
@endsection
@push('dashboard')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

<script>

// Get data
const incoming = {!! json_encode($incoming) !!};
const outgoing = {!! json_encode($outgoing) !!};

// Chart options
const options = {
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  }
}

// Chart data
const data = {
  labels: incoming.map(d => d.tanggal),
  datasets: [
    {
      label: 'Masuk',
      data: incoming.map(d => d.jumlah),
      backgroundColor: 'blue'
    },
    {
      label: 'Keluar',
      data: outgoing.map(d => d.jumlah),
      backgroundColor: 'red'
    }
  ]
};

// Render chart
const myChart = new Chart(
  document.getElementById('myChart'),
  {
    type: 'bar',
    data: data,
    options: options
  }
);

</script>
@endpush
