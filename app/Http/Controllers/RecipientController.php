<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Recipient;

class RecipientController extends Controller
{
    public function index()
    {
        $data = [];
        $data['recipients'] = Recipient::all();
        return view('recipients/index', $data);
    }

    public function show($id)
    {
        $data = [];
        $data['recipient'] = Recipient::find($id);
        if (! count($data['recipient']))
        {
            abort(404);
        }
        else
        {
            return view('recipients/show', $data);
        }
    }
}
