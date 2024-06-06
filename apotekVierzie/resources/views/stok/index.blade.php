@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Auth::User()->role === 'A')
                        <a href="{{ route('stok.create') }}" class="mb-3 btn bg-gradient-primary mt-3">Tambah</a>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Jumlah Keluar</th>
                                    <th>tanggal_transaksi</th>
                                    <th>Created At</th>
                                    @if (Auth::User()->role === 'A')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stok as $item)
                                    <tr>
                                        <td>{{ $item['nama_obat'] }}</td>
                                        <td>{{ $item->jenis_obat }}</td>
                                        <td>{{ $item->tanggal_dibuat }}</td>
                                        <td>{{ $item->tanggal_kadaluarsa }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        @if (Auth::User()->role === 'A')
                                            <td>
                                                <form method="POST" class="delete-form"
                                                    action="{{ route('stok.destroy', $item->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-danger show_confirm mt-2">Delete</button>
                                                </form>
                                            </td>
                                        @endif
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
