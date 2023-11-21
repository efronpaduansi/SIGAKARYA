@extends('layouts.adminpanel')

@section('title')
    Absensi Karyawan
@endsection

@section('page-heading')
    Absensi Karyawan
@endsection

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="mytable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal</th>
                                <th>Masuk</th>
                                <th>Pulang</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('adminpanel.pages.jabatan.create_modal');
    </section>
@endsection
