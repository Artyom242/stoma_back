<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class contactController extends Controller
{
    public function show(): View {
        return view('web.sections.contact');
    }
}
