<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class PagesController extends BaseController
{
    public function Index()
    {
        return view('index');
    }
}
