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
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <div class="col">
        <div class="col-md-6 grid-margin stretch-card">
            <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Obat {{ $obat->nama_obat }}</h4>
                        <p class="card-description">Edit List</p>
                        <div class="form-group">
                            <label for="nama">Nama Pemain</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Pemain"
                                value="{{ $obat->nama }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="posisi">Role</label>
                            <input type="text" class="form-control" name="posisi" placeholder="Role"
                                value="{{ $obat->posisi }}">
                            @error('posisi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="foto">Foto Pemain</label>
                            <input type="file" class="form-control" name="foto" placeholder="Input Foto Pemain">
                            @if (strlen($obat->foto) > 0)
                                <img src="{{ asset('a_fotos/' . $obat->foto) }}" style="max-height:140px">
                            @endif
                            @error('nama_team')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="prodiselect">Team</label>
                            <select name="team_id" class="form-select js-example-basic-single"
                                aria-label="Default select example" placeholder="Team Saat ini">
                            </select>

                            @error('nama_team')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--  -->

                        <button type="submit" class=" btn bg-gradient-primary me-2">Simpan</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-light">Batal</a>
                    </div>
            </form>
        </div>
    </div>
    </div>
@endsection
