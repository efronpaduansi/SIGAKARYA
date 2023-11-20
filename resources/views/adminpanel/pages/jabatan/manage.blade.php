@extends('layouts.adminpanel')

@section('title')
    Data Jabatan
@endsection

@section('page-heading')
    Data Jabatan
@endsection

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus"></i> Tambah Baru
                    </button>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="mytable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Jabatan</th>
                                    <th>Gaji Pokok</th>
                                    <th>Uang Makan</th>
                                    <th>Uang Transport</th>
                                    <th>Tunjangan Kesehatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['jabatan'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ 'Rp. ' . number_format($item->gaji_pokok, 0, '.', '.') }}</td>
                                        <td>{{ 'Rp. ' . number_format($item->uang_makan, 0, '.', '.') }}</td>
                                        <td>{{ 'Rp. ' . number_format($item->uang_transport, 0, '.', '.') }}</td>
                                        <td>{{ 'Rp. ' . number_format($item->tunjangan_kesehatan, 0, '.', '.') }}</td>
                                        <td class="d-flex">
                                            <a href="" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->kode }}"><i
                                                    class="far fa-edit"></i></a>

                                            {{-- Load Edit Modal --}}
                                            @include('adminpanel.pages.jabatan.edit_modal')

                                            <form action="{{ route('jabatan.destroy', $item->kode) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Hapus data ini?')"><i
                                                        class="fas fa-trash"></i></button>
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
        @include('adminpanel.pages.jabatan.create_modal');
    </section>
@endsection
