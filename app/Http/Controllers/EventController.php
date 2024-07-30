<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function save_event(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->form_date = $request->form_date;
        $event->to_date = $request->to_date;
        $event->event_type = $request->event_type;

        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/event/');
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $event->file_name = $file_name;
        }

        $event->save();

        return response()->json(['success' => 1, 'data' => $event]);
    }
    public function update_event(Request $request)
    {
        $event = Event::find($request->id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->form_date = $request->form_date;
        $event->to_date = $request->to_date;
        $event->event_type = $request->event_type;

        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/event/');
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $event->file_name = $file_name;
        }

        $event->update();

        return response()->json(['success' => 1, 'data' => $event]);
    }

    public function get_event()
    {
        $data = Event::latest()->take(10)->get();
        return response()->json(['success' => 1, 'data' => $data]);
    }

    public function delete_event($id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(['success' => 1, 'data' => $event]);
    }
}
