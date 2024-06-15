<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Form\ApplicationRequest;
use App\Models\Application;
use App\Models\Application_time;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function getDays($day){
//        $applications = Application::query()->where('application_date', $day)->get();
//
//        return response()->json([
//            'applications' => $applications,
//        ]);

        dd('awd');
    }

    public function create(ApplicationRequest $request){
        $data = $request->validated();

        $applicationModel = Application::query()->create([
            'application_type_id' => $data['type'],
            'name' => $data['name'],
            'phone' => $data['phone'],
            'application_date' => $data['dateCreate'],
        ]);

        foreach ($data['times'] as $time) {
            Application_time::query()->create([
                'application_id' => $applicationModel->id,
                'time' => $time,
            ]);
        }

        return response()->json(
            ['message' => 'Заявка успешно создана',
                'data' => $data],
            201);

    }

}
