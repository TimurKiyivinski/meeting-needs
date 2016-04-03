<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;

class VolunteerController extends Controller
{
    public function index()
    {
        $data = [];
        $data['volunteers'] = User::all();
        return view('volunteers/index', $data);
    }

    public function show($id)
    {
        $data = [];
        $data['volunteer'] = User::find($id);
        if (! count($data['volunteer']))
        {
            abort(404);
        }
        else
        {
            return view('volunteers/show', $data);
        }
    }
}
