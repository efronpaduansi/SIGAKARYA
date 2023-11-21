<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Alert;

class JabatanController extends Controller
{

    private function generateJabatanNumber()
    {
        $lastKode = Jabatan::max('kode') ?? 0;
        $nextId = $lastKode + 0001;

        return str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }


    public function index()
    {
        $data['jabatan'] = Jabatan::query()
                        ->orderBy('kode', 'asc')
                        ->get();
        $data['lastKode'] = $this->generateJabatanNumber();

        return view('adminpanel.pages.jabatan.manage', ['data' => $data]);
    }

    public function store(Request $request)
    {
        //Cek kode
        $getDataJabatan = Jabatan::where('kode', trim(htmlspecialchars($request->addKode)))->first();

        if($getDataJabatan){
            return redirect('/jabatan')->withToastError('Kode jabatan harus unik!');
        }

        $data = [
            'kode' => trim(htmlspecialchars($request->addKode)),
            'nama' => trim(htmlspecialchars($request->addNama)),
            'gaji_pokok' => trim(htmlspecialchars(preg_replace('/[Rp.,]/', '', $request->addGapok))),
            'uang_makan' => trim(htmlspecialchars(preg_replace('/[Rp.,]/', '', $request->addUangMakan))),
            'uang_transport' => trim(htmlspecialchars(preg_replace('/[Rp.,]/', '', $request->addUangTransport))),
            'tunjangan_kesehatan' => trim(htmlspecialchars(preg_replace('/[Rp.,]/', '', $request->addTunjanganKesehatan))),
        ];

        $storeJabatan = Jabatan::create($data);
        if(!$storeJabatan){
            return redirect('/jabatan')->withToastError('Simpan gagal!');
        }

        return redirect('/jabatan')->withToastSuccess('Simpan berhasil!');
    }

    public function update(Request $request, $kode)
    {
        //cek kode
        $result = Jabatan::where('kode', '!=' , $kode)->get();

        foreach($result as $key => $value){
            $requestKode = trim(htmlspecialchars($request->editKode));
            if($value['kode'] === $requestKode){
                return redirect('/jabatan')->withToastError('Kode harus unik!');
            }
        }

        $data = [
            'kode' => trim(htmlspecialchars($request->editKode)),
            'nama' => trim(htmlspecialchars($request->editNama)),
            'gaji_pokok' => trim(htmlspecialchars(preg_replace('/[Rp.,]/', '', $request->editGapok))),
            'uang_makan' => trim(htmlspecialchars(preg_replace('/[Rp.,]/', '', $request->editUangMakan))),
            'uang_transport' => trim(htmlspecialchars(preg_replace('/[Rp.,]/', '', $request->editUangTransport))),
            'tunjangan_kesehatan' => trim(htmlspecialchars(preg_replace('/[Rp.,]/', '', $request->editTunjanganKesehatan))),
        ];

        $updateJabatan = Jabatan::where('kode', $kode)->update($data);

        if(!$updateJabatan){
            return redirect('/jabatan')->withToastError('Update gagal!');
        }

        return redirect('/jabatan')->withToastSuccess('Update berhasil!');

    }

    public function destroy($kode)
    {
        $itemDeleted = Jabatan::where('kode', $kode)->delete();

        if(!$itemDeleted){
            return redirect('/jabatan')->withToastError('Hapus gagal!');
        }

        return redirect('/jabatan')->withToastSuccess('Hapus berhasil!');
    }

}
