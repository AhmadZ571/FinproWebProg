@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Pesan</h3>
        </div>
        <div class="card-body"></div>
        <div class="table-responsive"></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->nama }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->pesan }}</td>
                        <td>
                            <a href="{{ route('admin.messages.index', $message->id) }}"></a>
                            <form onClick="return confirm('Anda Yakin Data Akan Dihapus');" class="d-inline"
                                action="{{ route('admin.messages.destroy', $message->id) }}" method="post">
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
