<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Service;


class StickyHeaderController extends Controller
{
    public function index(){
        $services = Service::query()->get();
        $sections = Section::query()->get();

        $links = [
            'logo' => asset('images/full_logo.svg'),
            'index' => asset('/'),
            'clinic' => asset('/clinic'),
            'price' => asset('/price'),
            'feedback' => asset('/feedback'),
            'contact' => asset('/contact'),
        ];

        return response()->json([
            'services' => $services,
            'sections' => $sections,
            'links' => $links,
        ]);
    }
}
