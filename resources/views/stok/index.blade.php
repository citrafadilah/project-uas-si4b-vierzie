@extends('layouts.user_type.auth')

@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif

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
                                    <th>Distributor</th>
                                    {{-- <th>Jumlah Keluar</th> --}}
                                    <th>Total Stok</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    @if (Auth::User()->role === 'A')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stok as $item)
                                    <tr>
                                        <td>{{ $item->obat->nama_obat }}</td>
                                        <td>{{ $item->distributor->nama }}</td>
                                        {{-- <td>{{ $item->jumlah_keluar }}</td> --}}
                                        <td>{{ $item->jumlah_obat }}</td>
                                        <td>{{ $item->tanggal_kadaluarsa }}</td>
                                        @if (Auth::User()->role === 'A')
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('stok.edit', $item->id) }}"><button
                                                            class="btn btn-success mr-2">Edit</button></a>

                                                    <form method="POST" class="delete-form"
                                                        action="{{ route('stok.destroy', $item->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Anda yakin ingin menghapus distributor ini?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
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
@push('scripts')
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                    title: 'Apakah Anda yakin ? ',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                })
                .then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        form.submit();
                    }
                });
        });
    </script>
@endpush
