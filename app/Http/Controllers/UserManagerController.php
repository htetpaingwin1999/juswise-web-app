<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function index()
    {
        $userLists = User::all();
        return view('user-manager.index', compact('userLists'));
    }
}
