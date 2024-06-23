@extends('layouts.user_type.auth')

@section('content')
    <div class="col">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <form method="POST" action="{{ route('obat.update', $obat->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                <div class="card-header">Edit Obat</div>
                <div class="card-body">

                        <div class="form-group">
                            <label for="nama">Nama Obat</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $obat->nama }}">
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga Obat</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ $obat->harga }}">
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok Obat</label>
                            <input type="number" class="form-control" id="stok" name="stok"
                                value="{{ $obat->stok }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
