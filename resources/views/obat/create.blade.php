@extends('layouts.user_type.auth')

@section('content')
    <div class="col">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <h4 class="card-title">Input Obat</h4>
                    <p class="card-description">Tambah Obat baru</p>

                    <form class="forms-sample" action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputNation">Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat">
                            @error('nama_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNation">Jenis Obat</label>
                            <input type="text" class="form-control" name="jenis_obat" placeholder="Jenis Obat">
                            @error('jenis_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNation">Manfaat</label>
                            <input type="text" class="form-control" name="manfaat" placeholder="Manfaat">
                            @error('manfaat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNation">Efek Samping</label>
                            <input type="text" class="form-control" name="efek_samping" placeholder="Efek Samping">
                            @error('efek_samping')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <button type="submit" class="btn bg-gradient-primary me-2">Simpan</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
