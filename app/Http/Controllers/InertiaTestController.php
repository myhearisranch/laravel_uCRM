<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Inertia::renderを使うのに必要
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index() 
    {
        //resources/views/Pages/Inertia/Index.vueを表示することを示す
        return Inertia::render('Inertia/Index');
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    public function show($id)
    {
       return Inertia::render('Inertia/Show',
       [
            'id' => $id
       ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => ['required', 'unique:posts', 'max:20'],
            'content' => ['required'],
        ]);

        $inertiaTest = new InertiaTest();
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index');
    }
}
