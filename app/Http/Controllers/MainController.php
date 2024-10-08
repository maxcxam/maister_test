<?php

namespace App\Http\Controllers;

use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('main', compact('users'));
    }
}
