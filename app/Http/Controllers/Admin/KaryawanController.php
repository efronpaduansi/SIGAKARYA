<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Hash;
use PDF;

class KaryawanController extends Controller
{
    public function index()
    {
        $data['karyawan'] = Karyawan::query()->get();

        return view('adminpanel.pages.karyawan.manage', ['data' => $data]);
    }

    public function create()
    {
        $data['jabatan'] = Jabatan::query()->get(['kode', 'nama']);

        return view('adminpanel.pages.karyawan.form_create', ['data' => $data]);
    }

    public function store(Request $request)
    {

        //cek nik
        $result = Karyawan::where('nik', trim(htmlspecialchars($request->addNIK)))->first();

        if($result){
            return redirect('/karyawan')->withToastError('NIK harus unik!');
        }

        $data = [
            'nik' => trim(htmlspecialchars($request->addNIK)),
            'nama' => trim(htmlspecialchars($request->addNama)),
            'tempat_lahir' => trim(htmlspecialchars($request->addTempatLahir)),
            'tanggal_lahir' => trim(htmlspecialchars($request->addTanggalLahir)),
            'jenis_kelamin' => trim(htmlspecialchars($request->addJK)),
            'tahun_masuk' => trim(htmlspecialchars($request->addTahunMasuk)),
            'agama' => trim(htmlspecialchars($request->addAgama)),
            'telepon' => trim(htmlspecialchars($request->addTelepon)),
            'email' => trim($request->addEmail),
            'rekening' => trim(htmlspecialchars($request->addRekening)),
            'nama_rekening' => trim(htmlspecialchars($request->addNamaRekening)),
            'alamat' => trim(htmlspecialchars($request->addAlamat)),
            'pendidikan_terakhir' => trim(htmlspecialchars($request->addPendidikan)),
            'npwp' => trim(htmlspecialchars($request->addNPWP)),
            'status_pernikahan' => trim(htmlspecialchars($request->addStatusPernikahan)),
            'kode_jabatan' => trim(htmlspecialchars($request->addJabatan)),
        ];

        $storeKaryawan = Karyawan::create($data);

        if(!$storeKaryawan){
            return redirect('/karyawan')->withToastError('Simpan gagal!');
        }
        //Create new user from karyawan form
        $createNewUser = User::create([
            'name' => trim(htmlspecialchars($request->addNama)),
            'email' => trim($request->addEmail),
            'password' => Hash::make('password'),
            'role' => 'karyawan',
        ]);

        return redirect('/karyawan')->withToastSuccess('Simpan sukses!');

    }

    public function show($nik)
    {
        $karyawan = Karyawan::where('nik', $nik)->first();

        if(!$karyawan){
            return view('errors.404');
        }

        return view('adminpanel.pages.karyawan.karyawan', ['karyawan' => $karyawan]);

    }

    public function exportPdf($nik)
    {
        $karyawan = Karyawan::where('nik', $nik)->first();

        $pdf = PDF::loadview('adminpanel.pages.karyawan.export_pdf', ['karyawan' => $karyawan]);
        // return $pdf->download('data-karyawan-pdf');
        return $pdf->stream();
    }

    public function edit($nik)
    {

        $karyawan = Karyawan::where('nik', $nik)->first();

        if(!$karyawan){
            return view('errors.404');
        }

        $jabatan  = Jabatan::query()->get(['kode', 'nama']);

        return view('adminpanel.pages.karyawan.form_edit', [
            'karyawan' => $karyawan,
            'jabatan' => $jabatan,
        ]);
    }

    public function update(Request $request, $nik)
    {

        //cek nik karyawan
        $result = Karyawan::where('nik', '!=', $nik)->get();

        foreach($result as $key => $value){
            $requestNIK = trim(htmlspecialchars($request->editNIK));

            if($value['nik'] === $requestNIK){
                return redirect('/karyawan')->withToastError('NIK harus unik!');
            }
        }

        $data = [
            'nik' => trim(htmlspecialchars($request->editNIK)),
            'nama' => trim(htmlspecialchars($request->editNama)),
            'tempat_lahir' => trim(htmlspecialchars($request->editTempatLahir)),
            'tanggal_lahir' => trim(htmlspecialchars($request->editTanggalLahir)),
            'jenis_kelamin' => trim(htmlspecialchars($request->editJK)),
            'tahun_masuk' => trim(htmlspecialchars($request->editTahunMasuk)),
            'agama' => trim(htmlspecialchars($request->editAgama)),
            'telepon' => trim(htmlspecialchars($request->editTelepon)),
            'email' => trim($request->editEmail),
            'rekening' => trim(htmlspecialchars($request->editRekening)),
            'nama_rekening' => trim(htmlspecialchars($request->editNamaRekening)),
            'alamat' => trim(htmlspecialchars($request->editAlamat)),
            'pendidikan_terakhir' => trim(htmlspecialchars($request->editPendidikan)),
            'npwp' => trim(htmlspecialchars($request->editNPWP)),
            'status_pernikahan' => trim(htmlspecialchars($request->editStatusPernikahan)),
            'kode_jabatan' => trim(htmlspecialchars($request->editJabatan)),
        ];

        $updateKaryawan = Karyawan::where('nik', $nik)->update($data);

        if(!$updateKaryawan){
            return redirect()->back()->withToastError('Update gagal!');
        }

        return redirect('/karyawan')->withToastSuccess('Update berhasil!');

    }

    public function destroy($nik)
    {
        $karyawan = Karyawan::where('nik', $nik)->first();

        if(!$karyawan){
            return view('errors.404');
        }

        $deleteKaryawan = $karyawan->delete();

        if(!$deleteKaryawan){
            return redirect()->back()->withToastError('Hapus gagal!');
        }

        return redirect('/karyawan')->withToastSuccess('Hapus berhasil!');
    }

}
