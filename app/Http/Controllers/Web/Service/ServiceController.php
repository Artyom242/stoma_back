<?php

namespace App\Http\Controllers\Web\Service;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Service;

class ServiceController extends Controller
{
    public function show($name){

        $sectionModel = Section::query()->where('name_en', $name)->first();
        if ($sectionModel){

            /** @var Section $sectionModel*/
            $servicesBySection = $sectionModel->services()->get();

            return view('web.sections.services.' . $name, compact("servicesBySection"));
        } else {
            $servicesBySection = Service::query()->where('name_en', $name)->first();

            return view('web.sections.services.' . $name, compact("servicesBySection"));
        }
    }
}
