@extends('layouts.user_type.auth')

@section('content')
    <div class="col">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <h4 class="card-title">Edit Obat {{ $obat->nama_obat }}</h4>
                    <p class="card-description">Edit List</p>
                    <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama">Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat"
                                value="{{ $obat->nama_obat }}">
                            @error('nama_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_obat">Jenis Obat</label>
                            <input type="text" class="form-control" name="jenis_obat" placeholder="Jenis Obat"
                                value="{{ $obat->jenis_obat }}">
                            @error('jenis_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_dibuat">Tanggal Dibuat</label>
                            <input type="date" class="form-control" name="tanggal_dibuat" placeholder="Tanggal Dibuat"
                                value="{{ $obat->tanggal_dibuat }}">
                            @error('tanggal_dibuat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_kadaluarsa">Kadaluarsa</label>
                            <input type="date" class="form-control" name="tanggal_kadaluarsa"
                                placeholder="Tanggal Kadaluarsa" value="{{ $obat->tanggal_kadaluarsa }}">
                            @error('tanggal_kadaluarsa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="manfaat">Manfaat</label>
                            <input type="text" class="form-control" name="manfaat" placeholder="Manfaat"
                                value="{{ $obat->manfaat }}">
                            @error('manfaat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="efek">Efek Samping</label>
                            <input type="text" class="form-control" name="efek_samping" placeholder="Efek Samping"
                                value="{{ $obat->efek_samping }}">
                            @error('efek_samping')
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
