@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Auth::User()->role === 'A')
                        <a href="{{ route('obat.create') }}" class="mb-3 btn bg-gradient-primary mt-3">Tambah</a>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Jenis Obat</th>
                                    <th>Manfaat</th>
                                    <th>Efek Samping</th>
                                    {{-- <th>Created At</th> --}}
                                    @if (Auth::User()->role === 'A')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obat as $item)
                                    <tr>
                                        <td>{{ $item->nama_obat }}</td>
                                        <td>{{ $item->jenis_obat }}</td>
                                        <td>{{ $item->manfaat }}</td>
                                        <td>{{ $item->efek_samping }}</td>
                                        {{-- <td>{{ $item->created_at }}</td> --}}
                                        @if (Auth::User()->role === 'A')
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('obat.edit', $item->id) }}"><button
                                                            class="btn btn-success mr-2">Edit</button></a>

                                                    <form method="POST" class="delete-form"
                                                        action="{{ route('obat.destroy', $item->id) }}">
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
