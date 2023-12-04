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
                                <th>Jam</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($data['absensiRecords'] as $item)
                                 <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $item->karyawan->nama }}</td>
                                     <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                     <td>{{ date('H:i:s', strtotime($item->created_at)) }}</td>
                                     <td>{{ $item->keterangan == 1 ? 'Hadir' : 'Tidak Hadir' }}</td>
                                     <td>
                                         <form action="{{ route('absensi.destroy', $item->id) }}" method="POST">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')"><i class="fas fa-times"></i></button>
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
