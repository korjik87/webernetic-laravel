<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Article::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
            'published_at' => 'required|date|after:start_date',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $article = new Article();
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->published_at = $request->input('published_at');
        $article->author = Auth::id();
        return response()->json($article);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
            'published_at' => 'required|date|after:start_date',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if($article->author === Auth::id()){

            $article->title = $request->input('title');
            $article->body = $request->input('body');
            $article->published_at = $request->input('published_at');

            return response()->json($article);
        }
        return response()->json(['error' => 'Not authorized.'],403);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
