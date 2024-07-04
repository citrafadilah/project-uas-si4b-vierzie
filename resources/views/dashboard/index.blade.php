@extends('layouts.user_type.auth')

@section('content')
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Penjualan</p>
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
        <canvas id="penjualan"></canvas>
    </div>
@endsection
@push('scripts')
    <script>
        var data = @json($graph);

        var ctx = document.getElementById('penjualan').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(row => row.bulan),
                datasets: [{
                    label: 'Total Penjualan',
                    data: data.map(row => row.total),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna bar
                    borderColor: 'rgba(54, 162, 235, 1)', // Warna border
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
