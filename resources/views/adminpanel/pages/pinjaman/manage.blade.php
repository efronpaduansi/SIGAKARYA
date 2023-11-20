    @extends('layouts.adminpanel')

    @section('title')
        Pinjaman Karyawan
    @endsection

    @section('page-heading')
        Pinjaman Karyawan
    @endsection

    @section('content')
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/pinjaman/tambah') }}" class="btn btn-primary mb-5"><i class="fas fa-plus"></i> Ajukan
                            Pinjaman</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No. Pinjaman</th>
                                        <th>Nama Peminjam</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah Pinjaman</th>
                                        <th>Tenor</th>
                                        <th>Angsuran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data['pinjaman'] as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_pinjaman }}</td>
                                            <td>{{ $item->karyawan->nama }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}</td>
                                            <td>{{ 'Rp. ' . number_format($item->jumlah, 0, '.', '.') }}</td>
                                            <td>{{ $item->jangka_waktu . 'x' }}</td>
                                            <td>{{ 'Rp. ' . number_format($item->angsuran, 0, '.', '.') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button
                                                        class="btn {{ $item->status === 'Menunggu Konfirmasi' ? 'dropdown-toggle' : '' }} {{ $item->status == 'Menunggu Konfirmasi'
                                                            ? 'btn-warning'
                                                            : ($item->status == 'Disetujui'
                                                                ? 'btn-success'
                                                                : ($item->status == 'Ditolak'
                                                                    ? 'btn-danger'
                                                                    : 'btn-secondary')) }}"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{ $item->status }}
                                                    </button>
                                                    @if ($item->status === 'Menunggu Konfirmasi')
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item text-primary"
                                                                    href="{{ route('pinjaman.setujui', $item->no_pinjaman) }}"><i
                                                                        class="fas fa-check-circle"></i> Setujui</a>
                                                            </li>
                                                            <li><a class="dropdown-item text-danger"
                                                                    href="{{ route('pinjaman.tolak', $item->no_pinjaman) }}"
                                                                    onclick="return confirm('Tolak pengajuan ini?')"><i
                                                                        class="fas fa-times"></i> Tolak</a>
                                                            </li>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ route('pinjaman.destroy', $item->no_pinjaman) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
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
        </section>
    @endsection
