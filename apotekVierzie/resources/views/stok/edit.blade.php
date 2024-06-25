@extends('layouts.user_type.auth')
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
        <!--   Core JS Files   -->
        <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script>
          var win = navigator.platform.indexOf('Win') > -1;
          if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
              damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
          }
        </script>
      <!-- Github buttons -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>

@section('content')
    <div class="col">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <h4 class="card-title">Edit Stok {{ $stok->obat->nama_obat }}</h4>
                    <p class="card-description">Edit List</p>
                    <form class="form-sample" action="{{ route('stok.update', $stok->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama" hidden>Obat ID</label>
                            <input type="text" class="form-control" name="obat_id" placeholder="obat id"
                                value="{{ $stok->obat_id }}" hidden>
                            @error('obat_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_masuk">Jumlah Masuk</label>
                            <input type="text" class="form-control" name="jumlah_masuk" placeholder="Jumlah Masuk"
                                value="{{ $stok->jumlah_masuk }}">
                            @error('jumlah_masuk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_keluar">Jumlah Keluar</label>
                            <input type="text" class="form-control" name="jumlah_keluar" placeholder="Jumlah Keluar"
                                value="{{ $stok->jumlah_keluar }}">
                            @error('jumlah_keluar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_transaksi">Tanggal Transaksi</label>
                            <input type="date" class="form-control" name="tanggal_transaksi"
                                placeholder="Tanggal Transaksi" value="{{ $stok->tanggal_transaksi }}">
                            @error('tanggal_transaksi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class=" btn bg-gradient-primary me-2">Simpan</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
