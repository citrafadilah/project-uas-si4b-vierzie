@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Auth::User()->role === 'A')
                        <a href="{{ route('riwayat.create') }}" class="mb-3 btn bg-gradient-primary mt-3">Tambah</a>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Jumlah Keluar</th>
                                    <th>tanggal_transaksi</th>
                                    {{-- @if (Auth::User()->role === 'A')
                                        <th>Aksi</th>
                                    @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat as $item)
                                    <tr>
                                        <td>{{ $riwayat->obat->nama_obat }}</td>
                                        <td>{{ $riwayat->stok->jumlah_masuk }}</td>
                                        <td>{{ $riwayat->stok->jumlah_keluar }}</td>
                                        <td>{{ $riwayat->stok->tanggal_transaksi }}</td>
                                        {{-- @if (Auth::User()->role === 'A')
                                            <td>
                                                <form method="POST" class="delete-form"
                                                    action="{{ route('stok.destroy', $item->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-danger show_confirm mt-2">Delete</button>
                                                </form>
                                            </td>
                                        @endif --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
