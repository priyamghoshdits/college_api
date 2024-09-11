<?php

namespace App\Http\Controllers;

use App\Models\holiday;
use App\Http\Requests\StoreholidayRequest;
use App\Http\Requests\UpdateholidayRequest;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function get_days($day)
    {
        $year = Carbon::now()->year;

        $days = [];

        // Start from the first day of January in the given year
        $currentDate = Carbon::createFromDate($year, 1, 1);
        if($day == 'Monday'){
            // Loop through each day in the year
            while ($currentDate->year == $year) {
                // Check if the current day is a Sunday (dayOfWeek = 0)
                if ($currentDate->dayOfWeek === Carbon::MONDAY) {
                    $days[] = $currentDate->copy(); // Add a copy of the Carbon instance to the array
                }

                // Move to the next day
                $currentDate->addDay();
            }
        }else if($day == 'Sunday'){
            // Loop through each day in the year
            while ($currentDate->year == $year) {
                // Check if the current day is a Sunday (dayOfWeek = 0)
                if ($currentDate->dayOfWeek === Carbon::SUNDAY) {
                    $days[] = $currentDate->copy(); // Add a copy of the Carbon instance to the array
                }

                // Move to the next day
                $currentDate->addDay();
            }
        }else if($day == 'Tuesday'){

            // Loop through each day in the year
            while ($currentDate->year == $year) {
                // Check if the current day is a Sunday (dayOfWeek = 0)
                if ($currentDate->dayOfWeek === Carbon::TUESDAY) {
                    $days[] = $currentDate->copy(); // Add a copy of the Carbon instance to the array
                }

                // Move to the next day
                $currentDate->addDay();
            }

        }else if($day == 'Wednesday'){
            // Loop through each day in the year
            while ($currentDate->year == $year) {
                // Check if the current day is a Sunday (dayOfWeek = 0)
                if ($currentDate->dayOfWeek === Carbon::WEDNESDAY) {
                    $days[] = $currentDate->copy(); // Add a copy of the Carbon instance to the array
                }

                // Move to the next day
                $currentDate->addDay();
            }
        }else if($day == 'Thursday'){

            // Loop through each day in the year
            while ($currentDate->year == $year) {
                // Check if the current day is a Sunday (dayOfWeek = 0)
                if ($currentDate->dayOfWeek === Carbon::THURSDAY) {
                    $days[] = $currentDate->copy(); // Add a copy of the Carbon instance to the array
                }

                // Move to the next day
                $currentDate->addDay();
            }

        }else if($day == 'Friday'){

            // Loop through each day in the year
            while ($currentDate->year == $year) {
                // Check if the current day is a Sunday (dayOfWeek = 0)
                if ($currentDate->dayOfWeek === Carbon::FRIDAY) {
                    $days[] = $currentDate->copy(); // Add a copy of the Carbon instance to the array
                }

                // Move to the next day
                $currentDate->addDay();
            }

        }else if($day == 'Saturday'){
            // Loop through each day in the year
            while ($currentDate->year == $year) {
                // Check if the current day is a Sunday (dayOfWeek = 0)
                if ($currentDate->dayOfWeek === Carbon::SATURDAY) {
                    $days[] = $currentDate->copy(); // Add a copy of the Carbon instance to the array
                }

                // Move to the next day
                $currentDate->addDay();
            }
        }


        return $days;

    }

    public function holiday_for_whole_year(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $days = $this->get_days($requestedData->week_name);
        $description = $requestedData->description;
        foreach ($days as $day){
            $holiday = new holiday();
            $holiday->date = $day;
            $holiday->description = $description;
            $holiday->save();
        }
        return response()->json(['success'=>1,'data'=>$days], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_holiday(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $holiday = new holiday();
        $holiday->date = $requestedData->date;
        $holiday->description = $requestedData->description;
        $holiday->save();

        return response()->json(['success'=>1,'data'=>$holiday], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_holiday_list_by_month($month)
    {
        $data = holiday::whereMonth('date', $month)
            ->orderBy('date')
            ->get();
        foreach ($data as $item){
            $item->day = date('l', strtotime($item['date']));
        }
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_holiday(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $holiday = holiday::find($requestedData->id);
        $holiday->date = $requestedData->date;
        $holiday->description = $requestedData->description;
        $holiday->update();

        return response()->json(['success'=>1,'data'=>$holiday], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_holiday($id)
    {
        $data = holiday::find($id);
        $data->delete();

        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(holiday $holiday)
    {
        //
    }
}
