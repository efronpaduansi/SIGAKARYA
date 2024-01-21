@extends('layouts.adminpanel')

@section('title')
    Rekap Gaji
@endsection

@section('page-heading')
    Rekap Gaji
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
