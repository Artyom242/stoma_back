<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class mainController extends Controller
{
    public function show(): View {
        return view('web.sections.index');
    }
}
