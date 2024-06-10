<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Service;
use Illuminate\View\View;

class priceController extends Controller
{
    public function show(): View {
        /* @var Service $service */

        return view('web.sections.price');
    }
}
