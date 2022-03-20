<?php

namespace App\Http\Controllers;

use App\User;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function indexClientes(User $user)
    {
        return view('main.index',[
            'user' => $user
        ]);
    }
}
