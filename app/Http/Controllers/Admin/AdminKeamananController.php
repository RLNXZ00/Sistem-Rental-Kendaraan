<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminKeamananController extends Controller
{
    /**
     * Display the Admin Keamanan Dashboard.
     * Currently returns the static sliced UI for design review.
     */
    public function index()
    {
        return view('admin.keamanan.index');
    }
}
