<?php

namespace App\Http\Controllers;

use App\Problem;
use Illuminate\Http\Request;

class JusDbController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function jusxDb()
    {
        $cases =
            Problem::when(isset(request()->search), function ($q) {
                $search = request()->search;
                return $q->orwhere("title", "like", "%$search%")->orwhere("case_number", "like", "%$search%")->orwhere("allegation", "like", "%$search%")->orwhere("case_summary", "like", "%$search%");
            })->with('category')->latest('id')->paginate(7);

        return view('juswise-theme.jusx-db', compact('cases'));
    }

    public function detail($slug)
    {
        $case = Problem::where('slug', $slug)->first();
        if (empty($case)) {
            return abort(404);
        }
        return view('juswise-theme.detail', compact('case'));
    }

    public function baseOnCategory($id)
    {
        $cases =
            Problem::where("category_id", $id)->when(isset(request()->search), function ($q) {
                $search = request()->search;
                return $q->orwhere("title", "like", "%$search%")->orwhere("case_number", "like", "%$search%")->orwhere("allegation", "like", "%$search%")->orwhere("case_summary", "like", "%$search%");
            })->with('category')->latest('id')->paginate(7);
        // return $cases;
        return view('juswise-theme.jusx-db', compact('cases'));
    }

    public function baseOnDate(Request $request)
    {
        $start = date("j F Y", strtotime($request->start));
        $end = date("j F Y", strtotime($request->end));;

        // $start = $request->start;
        // $end = $request->end;

        // return $start . " " . $end;

        $cases =
            Problem::whereBetween('decision_date', [$start, $end])->when(isset(request()->search), function ($q) {
                $search = request()->search;
                return $q->orwhere("title", "like", "%$search%")->orwhere("case_number", "like", "%$search%")->orwhere("allegation", "like", "%$search%")->orwhere("case_summary", "like", "%$search%");
            })->with('category')->latest('id')->paginate(7);

        // return $cases;
        return view('juswise-theme.jusx-db', compact('cases'));
    }
}
