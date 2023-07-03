@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Mobil</h3>
            <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body"></div>
        <div class="table-responsive"></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mobil</th>
                    <th>Gambar Mobil</th>
                    <th>Harga Mobil</th>
                    <th>Status Mobil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cars as $car)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $car->nama_mobil }}</td>
                        <td>
                            <img src="{{ Storage::url($car->gambar) }}" class="img-fluid" alt="">
                        </td>
                        <td>{{ $car->harga_sewa }}</td>
                        <td>{{ $car->status }}</td>
                        <td>
                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onClick="return confirm('Anda Yakin Data Akan Dihapus');" class="d-inline"
                                action="{{ route('admin.cars.destroy', $car->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data Tidak DItemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
