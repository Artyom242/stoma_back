<?php

namespace App\Http\Controllers;

use App\Models\Body_feedback;
use Illuminate\Http\Request;
use Illuminate\View\View;

class feedbackController extends Controller
{
    public function show(): View{

        /* @var Body_feedback $feedback */

        $feedbacks = Body_feedback::query()->paginate(10)->withQueryString();
        $feedback_services= [];

        foreach ($feedbacks as $feedback){
            $feedback_services[] = $feedback->getServicesComment()
                ->where('body_feedback_id', $feedback->id)
                ->withPivot('body_feedback_id')
                ->get();
        }

        return view('web.sections.feedback', compact('feedbacks', 'feedback_services'));
    }
}
