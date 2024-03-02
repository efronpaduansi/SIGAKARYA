<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $jmlKaryawan = Karyawan::count();
        $jmlUser = User::count();
        $jmlPinjaman = Pinjaman::count();
        $jmlJabatan = Jabatan::count();
        return view("adminpanel.pages.dashboard", compact(
            'jmlKaryawan', 'jmlUser', 'jmlPinjaman', 'jmlJabatan'
        ));
    }
}
