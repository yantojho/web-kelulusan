<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\seting;

class IndexController extends Controller
{
    public function index()
    {
        $setting = seting::find(1);
        return view('index', compact('setting'));
    }
}
