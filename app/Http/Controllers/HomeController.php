<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use View;

class HomeController extends Controller
{

    public function index()
    {
        return View::make('home');
    }
}
