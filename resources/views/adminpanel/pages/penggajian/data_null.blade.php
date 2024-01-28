@extends('layouts.adminpanel')

@section('title')
    Cetak Gaji
@endsection

@section('page-heading')
    Cetak Gaji
@endsection

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="justify-content-end">
                        {{-- <a href="{{ route('karyawan.exportPdf', $karyawan->nik) }}" class="btn btn-sm btn-secondary mb-3"
                            target="_blank"><i class="far fa-file-pdf"></i> Export
                            PDF</a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <div class="col-12 text-center">

                                    <img class="img-error" src="{{ asset('adminpanel/assets/compiled/svg/error-404.svg') }}"
                                    alt="Not Found" height="300px"/>
                                    <h1 class="error-title">BELUM ADA DATA YANG DITEMUKAN!</h1>
                                    <a href="{{ route('penggajian.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                                        Kembali</a>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
