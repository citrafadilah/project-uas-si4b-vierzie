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

                    <form class="forms-sample" action="{{ route('riwayat.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

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
                                    <option value="{{ $item['id'] }}">{{$item->jumlah_obat}} - {{ $item->obat->nama_obat }} - {{ $item->tanggal_kadaluarsa }}</option>
                                @endforeach
                            </select>
                            @error('obat_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" min="<?php echo date('Y-m-d'); ?>">
                            @error('tanggal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" placeholder="Jumlah">
                            @error('jumlah')
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

                        <button type="submit" class="btn bg-gradient-primary me-2">Simpan</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
