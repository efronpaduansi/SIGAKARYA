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
                    <div class="justify-content-start d-flex">
                        <form action="{{ route('penggajian.cetakPDF', $dataGaji->karyawan->nik) }}" method="get">
                            @csrf
                            <input type="hidden" name="bulan" value="{{ $dataGaji->bulan }}">
                            <button type="submit" class="btn btn-secondary me-3"><i class="far fa-file-pdf"></i> Export
                                PDF</button>
                        </form>
                        <a href="{{ route('penggajian.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <td>:</td>
                                    <td>{{ $dataGaji->karyawan->nama}}</td>
                                </tr>
                                <tr>
                                    <th>NIK Karyawan</th>
                                    <td>:</td>
                                    <td>{{ $dataGaji->karyawan->nik}}</td>
                                </tr>
                                <tr>
                                    <th>Gaji Awal</th>
                                    <td>:</td>
                                    <td>{{ "Rp. " . number_format($dataGaji->gaji_awal, 0, '.', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Tunjangan Jabatan</th>
                                    <td>:</td>
                                    <td>{{ "Rp. " . number_format($dataGaji->tunjangan_jabatan, 0, '.', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Tunjangan Makan</th>
                                    <td>:</td>
                                    <td>{{ "Rp. " . number_format($dataGaji->tunjangan_makan, 0, '.', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Tunjangan Transport</th>
                                    <td>:</td>
                                    <td>{{ "Rp. " . number_format($dataGaji->tunjangan_transport, 0, '.', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Tunjangan BPJS</th>
                                    <td>:</td>
                                    <td>{{ "Rp. " . number_format($dataGaji->tunjangan_bpjs, 0, '.', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>PPH per Tahun</th>
                                    <td>:</td>
                                    <td>{{ "Rp. " . number_format($dataGaji->pph_per_thn, 0, '.', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th>Gaji Diterima</th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Terbilang: <span class="fst-italic">({{ $terbilang }} Rupiah)</span></th>
                                    <td>:</td>
                                    <td class="fw-bold">{{ "Rp. " . number_format($gajiBersih, 0, '.', '.')  }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
