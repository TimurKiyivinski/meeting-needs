<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $data = [];
        $data['events'] = Event::all(); // Needs to be fixed to only show future events by default
        return view('events/index', $data);
    }

    public function show($id)
    {
        $data = [];
        $data['event'] = Event::find($id);
        if (! count($data['event']))
        {
            abort(404);
        }
        else
        {
            return view('events/show', $data);
        }
    }
}
