<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategory = BlogCategory::get();
        return view("blog-category.index", [
            "blogCategory" => $blogCategory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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

        $blogCategory = new BlogCategory();
        $blogCategory->title = $request->title;
        $blogCategory->user_id = Auth::id();
        $blogCategory->save();

        return redirect()->route('blog-category.index')->with('toast', ['icon' => 'success', 'title' => 'New Category Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blogCategory)
    {
        $blog = $blogCategory;
        // return $blog;
        return view('blog-category.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            "title" => "required|unique:blog_categories,title"
        ]);

        $blogCategory->title = $request->title;
        $blogCategory->update();

        return redirect()->route('blog-category.index')->with('toast', ['icon' => 'success', 'title' => ' Category Upgrade Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blogCategory)
    {
        $blog = $blogCategory;
        $blog->delete();
        return redirect()->route('blog-category.index')->with('toast', ['icon' => 'success', 'title' =>  "Category  delete Success."]);
    }
}
