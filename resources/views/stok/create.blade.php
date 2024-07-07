@extends('layouts.user_type.auth')

@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif

    <div class="col">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <h4 class="card-title">Input Stok Obat</h4>
                    <p class="card-description">Tambah Stok Obat</p>
                    <form class="forms-sample" action="{{ route('stok.store') }}" method="POST"
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
                            <label for="exampleInputNation">Distributor</label>
                            <select name="distributor_id" class="form-control">
                                @foreach ($distributor as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="number" class="form-control" name="jumlah_obat" placeholder="Jumlah obat"> --}}
                            @error('jumlah_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNation">Jumlah Obat</label>
                            <input type="number" class="form-control" name="jumlah_obat" placeholder="Jumlah obat">
                            @error('jumlah_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNation">Tanggal Kadaluarsa</label>
                            <input type="date" class="form-control" name="tanggal_kadaluarsa"
                                placeholder="Tanggal Kadaluarsa" min="<?php echo date('Y-m-d'); ?>">
                            @error('tanggal_kadaluarsa')
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
