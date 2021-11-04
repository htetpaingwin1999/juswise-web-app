<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article-category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|unique:article_categories,title"
        ]);

        $articleCategory = new ArticleCategory();
        $articleCategory->title = $request->title;
        $articleCategory->user_id = Auth::id();
        $articleCategory->save();

        return redirect()->route('article-category.index')->with('toast', ['icon' => 'success', 'title' => 'New Category Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory)
    {
        return view('article-category.edit', compact('articleCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $request->validate([
            "title" => "required|unique:article_categories,title," . $articleCategory->id
        ]);

        $articleCategory->title = $request->title;
        $articleCategory->user_id = Auth::id();
        $articleCategory->update();

        return redirect()->route('article-category.index')->with('toast', ['icon' => 'success', 'title' => $request->title . " is Updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        $title = $articleCategory->title;
        $articleCategory->delete();
        return redirect()->route('article-category.index')->with('toast', ['icon' => 'success', 'title' => $title . " is deleted."]);
    }
}
