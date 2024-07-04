@extends('layouts.user_type.auth')
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ url('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ url('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
        <!--   Core JS Files   -->
        <script src="{{ url('/assets/js/core/popper.min.js') }}"></script>
        <script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ url('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
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
      <script src="{{ url('assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>

@section('content')
    <div class="col">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <h4 class="card-title">Edit Riwayat {{ $riwayat->nama_riwayat }}</h4>
                    <p class="card-description">Edit List</p>
                    <form class="form-sample" action="{{ route('riwayat.update', $riwayat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="exampleInputNation">Nama Obat</label>
                            <select name="obat_id" class="form-control">
                                @foreach ($obat as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['nama_obat'] }}</option>
                                @endforeach
                            </select>
                            @error('obat_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNation">Stok</label>
                            <select name="stok_id" class="form-control">
                                @foreach ($stok as $item)
                                    {{-- <input type="hidden" name="stok" value="{{ $item['jumlah_obat'] }}"> --}}
                                    <option value="{{ $item['id'] }}">{{$item->jumlah_obat}} - {{ $item->obat->nama_obat }}</option>
                                @endforeach
                            </select>
                            @error('obat_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="manfaat">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" placeholder="Jumlah"
                                value="{{ $riwayat->jumlah }}">
                            @error('manfaat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="efek_samping">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" placeholder="efek_samping Obat"
                                value="{{ $riwayat->tanggal }}">
                            @error('efek_samping')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis_transaksi">Jenis Transaksi:</label>
                            <select class="form-control" name="jenis_transaksi" id="jenis_transaksi">
                                <option value="" selected>Jenis Transaksi</option>
                                <option value="masuk">Masuk</option>
                                <option value="keluar">Keluar</option>
                            </select>
                        </div>

                        <button type="submit" class=" btn bg-gradient-primary me-2">Simpan</button>
                        <a href="{{ route('riwayat.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
