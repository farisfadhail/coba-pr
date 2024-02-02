<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::paginate(10);
        return view('index',[
            'articles'=>$article
        ]);
    }

    public function show(string $id){
        return view('show',[
            'article' => Article::find($id)
        ]);
    }

}
