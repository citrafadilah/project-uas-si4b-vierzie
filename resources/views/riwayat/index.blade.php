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
                                    <th>Jenis Transaksi</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    {{-- @if (Auth::User()->role === 'A')
                                        <th>Aksi</th>
                                    @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat as $item)
                                    <tr>
                                        <td>{{ $item->obat->nama_obat }}</td>
                                        <td class="text-capitalize">{{ $item->jenis_transaksi }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->tanggal }}</td>
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
