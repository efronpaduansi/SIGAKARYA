<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Alert;

class AbsensiController extends Controller
{
    public function index()
    {
        $data['absensiRecords'] =  Absensi::latest()->get();

        return view('adminpanel.pages.absensi.manage', ['data' => $data]);
    }

    public function destroy($id)
    {
        $deleteData = Absensi::where('id', $id)->delete();

        if(!$deleteData){
            return back()->withToastError('Hapus gagal!');
        }

        return back()->withToastSuccess('Hapus berhasil!');
    }

}
