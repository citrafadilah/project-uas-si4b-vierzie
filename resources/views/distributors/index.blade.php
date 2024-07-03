@extends('layouts.user_type.auth')

@section('title', 'Daftar Distributor')

@section('contents')
<div class="card">
    <div class="card-header">
        <h1 class="mb-0 text-center">Daftar Distributor</h1>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('distributors.create') }}" class="btn btn-success mb-3">Tambah Distributor Baru</a>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-success">
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Catatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($distributors as $distributor)
                        <tr>
                            <td>{{ $distributor->nama }}</td>
                            <td>{{ $distributor->alamat }}</td>
                            <td>{{ $distributor->noHp }}</td>
                            <td>{{ $distributor->email }}</td>
                            <td>{{ $distributor->catatan }}</td>
                            <td>
                                <span class="badge bg-{{ $distributor->status == 'sedang diproses' ? 'warning' : 'success' }}">
                                    {{ $distributor->status }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex flex-row">
                                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#modalCatatan{{ $distributor->id }}">
                                        Kirim Permintaan
                                    </button>
                                    @if ($distributor->status == 'sedang diproses')
                                        <form action="{{ route('distributors.markAsArrived', $distributor->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success me-2">Telah Sampai</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('distributors.destroy', $distributor->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus distributor ini?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCatatan{{ $distributor->id }}" tabindex="-1" aria-labelledby="modalCatatanLabel{{ $distributor->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('distributors.sendRequest', $distributor->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCatatanLabel{{ $distributor->id }}">Kirim Catatan untuk {{ $distributor->nama }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="catatan" class="form-label">Catatan:</label>
                                                <textarea class="form-control" id="catatan" name="catatan" placeholder="Tambah catatan"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
