<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function index()
    {
        $feedbacks = Feedback::when(isset(request()->search), function ($q) {
            $search = request()->search;
            return $q->orwhere("rating", "like", "%$search%");
        })->latest('id')->paginate(5);
        return view('feedback', compact('feedbacks'));
    }

    public function setRating(Request $request)
    {
        $request->validate([
            "star" => "required",
            "description" => "required|min:3"
        ]);


        $feedback = new Feedback();
        $feedback->rating = $request->star;
        $feedback->useful = $request->useful;
        $feedback->description = $request->description;
        $feedback->save();

        return redirect()->route('jusxDb');
    }
}
