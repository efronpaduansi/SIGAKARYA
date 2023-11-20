@extends('layouts.adminpanel')

@section('title')
    Data Karyawan
@endsection

@section('page-heading')
    Data Karyawan
@endsection

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('/karyawan/tambah') }}" class="btn btn-primary mb-5"><i class="fas fa-plus"></i> Tambah
                        Baru</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="mytable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Tahun Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['karyawan'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->telepon }}</td>
                                        <td>{{ $item->tahun_masuk }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('karyawan.show', $item->nik) }}"
                                                class="btn btn-sm btn-info me-1"><i class="far fa-eye"></i></a>

                                            <a href="{{ route('karyawan.edit', $item->nik) }}"
                                                class="btn btn-sm btn-primary me-1"><i class="far fa-edit"></i></a>

                                            <form action="{{ route('karyawan.destroy', $item->nik) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Hapus data ini?')"
                                                    class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
