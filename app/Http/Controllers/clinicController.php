<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class clinicController extends Controller
{
    public function show(): View {
        return view('web.sections.clinic');
    }
}
