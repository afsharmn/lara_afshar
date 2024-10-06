<?php

namespace App\Http\Controllers\site;


class HomeController extends Controller
{

    public function index()
    {
        return view('site::index');
    }

}
