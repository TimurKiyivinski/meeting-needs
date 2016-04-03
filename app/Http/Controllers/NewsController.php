<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $data = [];
        $data['news'] = News::all();
        return view('news/index', $data);
    }

    public function show($id)
    {
        $data = [];
        $data['news'] = News::find($id);
        if (! count($data['news']))
        {
            abort(404);
        }
        else
        {
            return view('news/show', $data);
        }
    }
}
