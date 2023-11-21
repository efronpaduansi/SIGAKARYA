<?php

namespace App\Http\Controllers\Admin;

use App\Models\Karyawan;
use App\Models\Pinjaman;
// use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class PinjamanController extends Controller
{

    private function generateRandomNumber()
    {
        // $randomNumber = Str::random(8);
        $randomNumber = mt_rand(100000, 999999);

        $numberCheck = Pinjaman::where('no_pinjaman', $randomNumber)->first();

        if($numberCheck){
            $this->generateRandomNumber();
        }

        return $randomNumber;
    }

    public function index()
    {
        $data['pinjaman'] = Pinjaman::latest()->get();

        return view('adminpanel.pages.pinjaman.manage', ['data' => $data]);
    }

    public function create()
    {
        $data['karyawan'] = Karyawan::oldest('nama')->get();
        $data['number'] =  $this->generateRandomNumber();

        return view('adminpanel.pages.pinjaman.form_create', ['data' => $data]);
    }

    public function store(Request $request)
    {

        //get data karyawan
        $karyawan = Karyawan::where('nik', trim(htmlspecialchars($request->addNIK)))->first();

        $data = [
            'no_pinjaman' => $request->addNo,
            'nik_karyawan' => $karyawan->nik,
            'kode_jabatan' => $karyawan->kode_jabatan,
            'tanggal_pinjam' => trim(htmlspecialchars($request->addTanggal)),
            'jumlah' => trim(htmlspecialchars(preg_replace('/[Rp.,]/', '', $request->addJumlah))),
            'jangka_waktu' => htmlspecialchars(intval($request->addJangkaWaktu)),
        ];

        $savePinjaman = Pinjaman::create($data);

        if(!$savePinjaman){
            return redirect('/pinjaman')->withToastError('Simpan gagal!');
        }

        $getLatestData = Pinjaman::latest()->first();

        //perhitungan angsuran
        $jumlah = $getLatestData->jumlah;
        $jangkaWaktu = $getLatestData->jangka_waktu;

        $totalAngsuran = ($jumlah / $jangkaWaktu);

        return view('adminpanel.pages.pinjaman.confirm_page', [
            'data' => $getLatestData,
            'angsuran' => $totalAngsuran,
        ]);

    }

    public function updateJumlahAngsuran(Request $request, $no)
    {
        $jumlahAngsuran = trim(htmlspecialchars(preg_replace('/[Rp.,]/', '', $request->angsuran)));

        $updateAngsuran = Pinjaman::where('no_pinjaman', $no)
                        ->update(array('angsuran' => $jumlahAngsuran));

        if(!$updateAngsuran){
            return redirect('/pinjaman')->withToastError('Error saat mengirim data!');
        }

        return redirect('/pinjaman')->withToastSuccess('Pengajuan Anda berhasil dikirim!');
    }

    public function setujui($no)
    {
        $status = 'Disetujui';

        $updateStatus = Pinjaman::where('no_pinjaman', $no)->update(array('status' => $status));

        if(!$updateStatus){
            return redirect('/pinjaman')->withToastError('Update gagal!');
        }

        return redirect('/pinjaman')->withToastSuccess('Update berhasil!');
    }

    public function tolak($no)
    {
        $status = 'Ditolak';

        $updateStatus = Pinjaman::where('no_pinjaman', $no)->update(array('status' => $status));

        if(!$updateStatus){
            return redirect('/pinjaman')->withToastError('Update gagal!');
        }

        return redirect('/pinjaman')->withToastSuccess('Update berhasil!');
    }

}
