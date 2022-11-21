<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class DataDiriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $no = 0;
        $data_user = User::all();

        return view('user.index', compact('data_user', 'no'));
    }
}
