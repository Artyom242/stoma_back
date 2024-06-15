<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Service;
use Illuminate\View\View;

class mainController extends Controller
{
    public function show(): View {

        $services = Service::query()->get();
        $sections = Section::query()->get();

        return view('web.sections.index', compact('services', 'sections'));
    }

    public function create() {
        dd('awd');
    }
}
