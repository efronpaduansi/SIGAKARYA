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
                                <th>Nama Lengkap</th>
                                <td>{{ $data->karyawan->nama }}</td>
                            </tr>
                            <tr>
                                <th>No. Induk Kependudukan</th>
                                <td>{{ $data->karyawan->nik }}</td>
                            </tr>
                            <tr>
                                <th>Bulan</th>
                                <td>{{ $data->bulan }}</td>
                            </tr>
                            <tr>
                                <th>Gaji Awal</th>
                                <td>{{ "Rp. " . number_format($data->gaji_awal, 0, '.', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Tunjangan Jabatan</th>
                                <td>{{ "Rp. " . number_format($data->tunjangan_jabatan, 0, '.', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Tunjangan Makan</th>
                                <td>{{ "Rp. " . number_format($data->tunjangan_makan, 0, '.', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Tunjangan Transport</th>
                                <td>{{ "Rp. " . number_format($data->tunjangan_transport, 0, '.', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Tunjangan BPJS</th>
                                <td>{{ "Rp. " . number_format($data->tunjangan_bpjs, 0, '.', '.') }}</td>
                            </tr>

                            <tr>
                                <th>PPH per Tahun</th>
                                <td>{{ "Rp. " . number_format($data->pph_per_thn, 0, '.', '.') }}</td>
                            </tr>

                        </tbody>
                    </table>
                    <hr>
                    Gaji Diterima
                    <table>
                        <tbody>
                            <tr>
                                <th>Terbilang: <span class="fst-italic">({{ $data->terbilang }} Rupiah)</span></th>
                                <td class="fw-bold">{{ "Rp. " . number_format($data->gajiBersih, 0, '.', '.')  }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

</html>
