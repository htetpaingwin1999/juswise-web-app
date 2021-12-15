<?php

namespace App\Http\Controllers;

use App\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $all = Problem::all();

        // foreach ($all as $a) {
        //     $a->slug = Str::slug($a->title, '-') . "-" . uniqid();
        //     $a->update();
        // }

        $cases =
            Problem::when(isset(request()->search), function ($q) {
                $search = request()->search;
                return $q->orwhere("title", "like", "%$search%")->orwhere("case_number", "like", "%$search%")->orwhere("allegation", "like", "%$search%")->orwhere("case_summary", "like", "%$search%")->orwhere("decision_date", "like", "%$search%");
            })->with(['user', 'category'])->latest('id')->paginate(7);
        return view('case.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('case.create');
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
            "title" => "required|min:5|unique:problems,title|max:255",
            "case_number" => "required|min:3|max:100",
            "category_id" => "required|exists:categories,id",
            "allegation" => "required|min:5|max:255",
            "decision_date" => "required|min:5|max:50",
            "case_summary" => "required|min:5",
            "decision" => "required|min:5",
            "instance" => "required|min:5|max:100",
            "conclusion" => "required|min:5",
            "related_case" => "required|min:5",
            "document_name" => "required|min:3|max:255",
            "document_link" => "required|min:5|max:255"
        ]);


        $case = new Problem();
        $case->title = $request->title;
        $case->slug = Str::slug($request->title, '-') . "-" . uniqid();
        $case->case_number = $request->case_number;
        $case->category_id = $request->category_id;
        $case->allegation = $request->allegation;
        $case->decision_date = date("j F Y", strtotime($request->decision_date));
        // $case->decision_date = $request->decision_date;
        $case->case_summary = $request->case_summary;
        $case->decision = $request->decision;
        $case->instance = $request->instance;
        $case->conclusion = $request->conclusion;
        $case->related_case = $request->related_case;
        $case->document_name = $request->document_name;
        $case->document_link = $request->document_link;
        $case->user_id = Auth::id();
        $case->save();

        return redirect()->route('problem.index')->with('toast', ['icon' => 'success', 'title' => 'New case is created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function show(Problem $problem)
    {
        return view('case.show', compact('problem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function edit(Problem $problem)
    {
        return view('case.edit', compact('problem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problem $problem)
    {
        $request->validate([
            "title" => "required|min:5|unique:problems,title|max:255",
            "case_number" => "required|min:3|max:100",
            "category_id" => "required|exists:categories,id",
            "allegation" => "required|min:5|max:255",
            "decision_date" => "required|min:5|max:50",
            "case_summary" => "required|min:5",
            "decision" => "required|min:5",
            "instance" => "required|min:5|max:100",
            "conclusion" => "required|min:5",
            "related_case" => "required|min:5",
            "document_name" => "required|min:3|max:255",
            "document_link" => "required|min:5|max:255"
        ]);

        $case = $problem;
        if ($case->title != $request->title) {
            $case->slug = Str::slug($request->title, '-') . "-" . uniqid();
        }
        $case->title = $request->title;
        $case->case_number = $request->case_number;
        $case->category_id = $request->category_id;
        $case->allegation = $request->allegation;
        $case->decision_date = date("j F Y", strtotime($request->decision_date));
        // $case->decision_date = $request->decision_date;
        $case->case_summary = $request->case_summary;
        $case->decision = $request->decision;
        $case->instance = $request->instance;
        $case->conclusion = $request->conclusion;
        $case->related_case = $request->related_case;
        $case->document_name = $request->document_name;
        $case->document_link = $request->document_link;
        $case->update();

        return redirect()->route('problem.index')->with('toast', ['icon' => 'success', 'title' => 'Update Success.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem $problem)
    {
        $problem->delete();

        return redirect()->back()->with('toast', ['icon' => 'success', 'title' => "Case is deleted."]);
    }
}
