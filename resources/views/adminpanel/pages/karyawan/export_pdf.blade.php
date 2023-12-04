<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Karyawan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            table,
            th,
            td {
                border: 1px solid #ddd;
            }

            th,
            td {
                padding: 12px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            /* Contoh warna latar belakang baris ganjil */
            tr:nth-child(odd) {
                background-color: #f9f9f9;
            }

            .title {
                text-align: center;
                margin: 30px 0;
                /* Menambahkan margin di atas dan di bawah untuk memberikan ruang di sekitar judul */
            }

            .title h1 {
                margin-bottom: 10px;
                color: #435ebe;
            }

            .title h2 {
                margin-bottom: 20px;
                /* Memberikan ruang di bawah judul utama */
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="title">
                        <h1>ZAI BERKAT MANDIRI</h1>
                        <h2>DATA KARYAWAN</h2>
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>No. Induk Kependudukan</th>
                                <td>{{ $karyawan->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ $karyawan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>{{ $karyawan->tempat_lahir . ', ' . date('d/m/Y', strtotime($karyawan->tanggal_lahir)) }}
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $karyawan->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>{{ $karyawan->agama }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ $karyawan->telepon }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <td>{{ $karyawan->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Pendidikan Terakhir</th>
                                <td>{{ $karyawan->pendidikan_terakhir }}</td>
                            </tr>
                            <tr>
                                <th>NPWP</th>
                                <td>{{ $karyawan->npwp }}</td>
                            </tr>
                            <tr>
                                <th>Status Pernikahan</th>
                                <td>{{ $karyawan->status_pernikahan }}</td>
                            </tr>
                            <tr>
                                <th>No. Rekening</th>
                                <td>{{ $karyawan->rekening }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pemilik Rekening</th>
                                <td>{{ $karyawan->nama_rekening }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan saat ini</th>
                                <td>{{ $karyawan->jabatan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Masuk</th>
                                <td>{{ $karyawan->tahun_masuk }}</td>
                            </tr>
                            <tr>
                                <th>Bergabung pada</th>
                                <td>{{ $karyawan->created_at->diffForHumans() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

</html>
