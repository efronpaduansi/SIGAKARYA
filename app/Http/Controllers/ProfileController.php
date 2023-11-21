<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::where('id', auth()->user()->id)->first();

        return view('adminpanel.pages.profile.myprofile', ['profile' => $profile]);
    }

    public function passwordUpdate(Request $request, $id)
    {
        $oldPass = $request->oldPass;
        $newPass = $request->newPass;
        $confPass = $request->confPass;

        $userData = User::where('id', $id)->first();
        if(Hash::check($oldPass, $userData->password)){
            if($newPass !== $confPass){
                return back()->withToastError('Perubahan gagal disimpan!');
            }

            $updateUserPass = $userData->update(array('password' => Hash::make($newPass)));

            return back()->withToastSuccess('Perubahan berhasil disimpan!');
        }
        return back()->withToastError('Perubahan gagal disimpan!');
    }
}
