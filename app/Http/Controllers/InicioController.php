<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        $articles = Article::with('user', 'tag') -> paginate(5);
        return view('welcome', compact('articles'));
    }
}
