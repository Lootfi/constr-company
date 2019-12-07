<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $redirectTo = '/';
    public function index()
    {
        return view('admin.add-gest');
    }

    public function addGest()
    { }
}
