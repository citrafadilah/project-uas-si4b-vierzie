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
                                    {{-- <th>Jumlah Masuk</th> --}}
                                    {{-- <th>Jumlah Keluar</th> --}}
                                    <th>tanggal_transaksi</th>
                                    <th>Total Stok</th>
                                    @if (Auth::User()->role === 'A')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stok as $item)
                                    <tr>
                                        <td>{{ $item->obat->nama_obat }}</td>
                                        {{-- <td>{{ $item->jumlah_masuk }}</td> --}}
                                        {{-- <td>{{ $item->jumlah_keluar }}</td> --}}
                                        <td>{{ $item->tanggal_transaksi }}</td>
                                        <td>{{ $item->jumlah_masuk - $item->jumlah_keluar }}</td>
                                        @if (Auth::User()->role === 'A')
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('stok.edit', $item->id) }}"><button
                                                            class="btn btn-success mr-2">Edit</button></a>

                                                    <form method="POST" class="delete-form"
                                                        action="{{ route('stok.destroy', $item->id) }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger show_confirm"><i
                                                                class="far fa-trash-alt mr-2"></i>Delete</button>
                                                    </form>
                                                </div>
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
