@extends('layouts.user_type.auth')

@section('content')
    <div class="col">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <h4 class="card-title">Input Riwayat</h4>
                    <p class="card-description">Tambah Riwayat</p>

                    <form class="forms-sample" action="{{ route('riwayat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputNation">Nama Pengguna</label>
                            <select name="user_id" class="form-control">
                                @foreach ($riwayat as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNation">Nama Pengguna</label>
                            <select name="user_id" class="form-control">
                                @foreach ($riwayat as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNation">Jumlah Masuk</label>
                            <input type="text" class="form-control" name="jumlah_masuk" placeholder="Jumlah Masuk">
                            @error('jumlah_masuk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNation">Jumlah Keluar</label>
                            <input type="text" class="form-control" name="jumlah_keluar" placeholder="Jumlah Keluar">
                            @error('jumlah_keluar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNation">Tanggal Transaksi</label>
                            <input type="date" class="form-control" name="tanggal_transaksi"
                                placeholder="Tanggal Transaksi">
                            @error('tanggal_transaksi')
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
