@extends('layouts.user_type.auth')

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
                    <form action="{{ route('stok.update', $stok->id) }}" method="POST" enctype="multipart/form-data">
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
]                        <button type="submit" class=" btn bg-gradient-primary me-2">Simpan</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
