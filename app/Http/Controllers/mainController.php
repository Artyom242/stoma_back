<?php

namespace App\Http\Controllers;

use App\Models\Requisite;
use App\Models\Section;
use App\Models\Service;
use Illuminate\View\View;

class mainController extends Controller
{
    public function show(): View {

        return view('web.sections.index');
    }

    public function create() {
        dd('awd');
    }
}
