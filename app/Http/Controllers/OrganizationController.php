<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        $data = [];
        $data['organizations'] = Organization::all();
        return view('organizations/index', $data);
    }

    public function show($id)
    {
        $data = [];
        $data['organization'] = Organization::find($id);
        if (! count($data['organization']))
        {
            abort(404);
        }
        else
        {
            return view('organizations/show', $data);
        }
    }
}
