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
                                    <th>Profil</th>
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
                                        <td data-bs-toggle="modal" data-bs-target="#picModal{{ $item->nik }}">
                                            @if($item->picture_path == '')
                                                <img src="{{ asset('adminpanel/assets/static/images/faces/1.jpg') }}" alt="profile" height="50px" width="50px" class="rounded-circle">
                                            @else 
                                                <img src="{{ asset('uploads/profiles/' . $item->picture_path) }}" alt="profile path" height="50px" width="50px" class="rounded-circle">
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('karyawan.show', $item->nik) }}">{{ $item->nik }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('karyawan.show', $item->nik) }}">{{ $item->nama }}</a>
                                        </td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->telepon }}</td>
                                        <td>{{ $item->tahun_masuk }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-4">
                                                    <a href="{{ route('karyawan.edit', $item->nik) }}"
                                                       class="btn btn-sm btn-primary me-1"><i class="far fa-edit"></i></a>
                                                </div>
                                                <div class="col-4">
                                                    <form action="{{ route('karyawan.destroy', $item->nik) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Hapus data ini?')"
                                                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>



                                        </td>
                                    </tr>

                                    <div class="modal fade" id="picModal{{ $item->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Foto Profil</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('karyawan.profileChange') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="nik" id="nik" value="{{ $item->nik }}">
                                                        <div class="form-group mandatory">
                                                            <label for="img" class="form-label">Pilih gambar</label>
                                                            <input type="file" name="img" id="img" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
