<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Family;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::where('deleted', false)->get();
        return view('admin/articles/index', ['articles' => $articles]);
    }

    public function create()
    {
        $families = Family::where('deleted', false)->get();
        return view('admin/articles/create', ['families' => $families]);
    }

    

}



?>