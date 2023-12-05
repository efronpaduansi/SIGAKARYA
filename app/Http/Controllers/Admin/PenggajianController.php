<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function index()
    {
        return view("adminpanel.pages.penggajian.index");
    }

    public function create()
    {
        return view("adminpanel.pages.penggajian.form_create");
    }

}
