<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index($day){
        $applications = Application::query()->where('application_date', $day)->get();

        return response()->json([
            'applications' => $applications,
        ]);
    }
    public function create($day){
        $applications = Application::query()->where('application_date', $day)->get();

        return response()->json([
            'applications' => $applications,
        ]);
    }
}
