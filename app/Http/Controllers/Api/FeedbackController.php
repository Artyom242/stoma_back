<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Form\FeedbackRequest;
use App\Models\Body_feedback;
use App\Models\Comment;
use App\Models\Service;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function getServices(){
        $services = Service::query()->get();

        return response()->json($services);
    }

    public function createFeedback(FeedbackRequest $request){
        $data = $request->validated();

        $feedbackModel = Body_feedback::query()->create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'text' => $data['feedback'],
            'rating' => $data['rating'],
        ]);

        foreach ($data['services'] as $service){
            /* @var Body_feedback $feedbackModel $*/
            $feedbackModel->getServicesComment()->attach($service['id']);
        }

        return response()->json($data);
    }
}
