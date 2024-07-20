<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->group == 'admin') {
            return view('dashboard.index');
        }
        if (Auth::user()->group == 'user') {
            $konser = Konser::paginate(10);
            return view('user.konser', compact('konser'));
        }
    }
    
}
