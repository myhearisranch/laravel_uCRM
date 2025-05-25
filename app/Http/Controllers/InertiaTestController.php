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
        return Inertia::render('Inertia/Index', [
            'blogs' => InertiaTest::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    public function show($id)
    {
       return Inertia::render('Inertia/Show',
       [
            'id'   => $id,
            'blog' => InertiaTest::findOrFail($id)
       ]);
    }

    public function store(Request $request)
    {
        // SQLSTATE[42S02]: Base table or view not found: 1146 Table 'laravel_ucrm.posts' doesn't exist
        //title'   => ['required', 'unique:posts', 'max:20'],だと、
        //投稿時にunique:posts, postsテーブルのtitleカラムの中で一意かをチェックする => そもそもpostsテーブルはないので、エラーが発生した
        $request->validate([
            'title'   => ['required', 'max:20'],
            'content' => ['required'],
        ]);

        $inertiaTest = new InertiaTest();
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index')
        ->with([
            'message' => '登録しました。'
        ]);
    }

    public function delete($id)
    {
        $book = InertiaTest::findOrFail($id);
        $book->delete();

        return to_route('inertia.index')
            ->with([
                'message' => '更新しました。'
            ]);
    }
}
