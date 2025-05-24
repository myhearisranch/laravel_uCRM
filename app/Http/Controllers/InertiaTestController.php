<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Inertia::renderを使うのに必要
use Inertia\Inertia;

class InertiaTestController extends Controller
{
    public function index() 
    {
        return Inertia::render('Inertia/Index');
    }
}
