<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Weekend;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function getWeekendDays($month){
        $weekends = Weekend::query()->whereMonth('weekendDate', $month)->get();

        $weekendDays = [];
        foreach ($weekends as $weekend){
            if (empty($weekend['fromTime']) && empty($weekend['toTime'])){
                $formattedDate = date_format(date_create($weekend['weekendDate']), 'd.m.Y');
                $weekendDays[] = $formattedDate;
            }
        }
        return response()->json($weekendDays);
    }

    public function getWeekendTimes($date){
        $weekendTimes = Weekend::query()->where('weekendDate', $date)->first();

        if ($weekendTimes) {
            return response()->json([
                'fromTime' => $weekendTimes['fromTime'],
                'toTime' => $weekendTimes['toTime'],
            ]);
        } else {
            return response()->json(null);
        }

    }
}
