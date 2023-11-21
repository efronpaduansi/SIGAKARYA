<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::oldest('name')->get();

        return view('adminpanel.pages.users.manage', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $data = [
          'name' => trim(htmlspecialchars($request->addName)),
          'email' => trim($request->addEmail),
          'role' => trim(htmlspecialchars($request->addRole)),
          'password' => trim(Hash::make($request->addPass)),
        ];

        $saveNewUser = User::create($data);

        if(!$saveNewUser){
            return back()->withToastError('Simpan gagal!');
        }

        return back()->withToastSuccess('Simpan berhasil');
    }

}
