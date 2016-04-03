<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use App\Models\Event;
use App\Models\UserEvent;

class EventController extends Controller
{
    public function index()
    {
        $data = [];
        $data['events'] = Event::with('photo')->get(); // Needs to be fixed to only show future events by default
        return view('events/index', $data);
    }

    public function show($id)
    {
        $data = [];
        $data['event'] = Event::with('users')->find($id);
        $data['banner'] = $data['event']['photo']['path'];

        if(! Auth::check())
            abort(404);

        $user = Auth::user();
        $participation = UserEvent::where(['event_id' => $id, 'user_id' => $user->id])->first();

        $data['user'] = $user;
        $data['participation'] = $participation;

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
