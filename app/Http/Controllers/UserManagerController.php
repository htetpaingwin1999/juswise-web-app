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

    public function controlPermission(Request $request)
    {
        $user = User::find($request->id);

        return view('user-manager.control-permission', compact('user'));
    }

    public function makeAdmin(Request $request)
    {
        $currentUser = User::find($request->id);

        if ($currentUser->role != 0) {
            $currentUser->role = '0';
            $currentUser->update();
        }

        return redirect()->back()->with('toast', ['icon' => 'success', 'title' => 'Update admin role ' . $currentUser->name]);
    }

    public function makeVolunteer(Request $request)
    {
        $currentUser = User::find($request->id);
        if ($currentUser->role != 0) {
            $currentUser->role = '1';
            $currentUser->update();
        }

        return redirect()->back()->with('toast', ['icon' => 'success', 'title' => 'Update role success for' . $currentUser->name]);
    }

    public function makeUser(Request $request)
    {
        $currentUser = User::find($request->id);
        if ($currentUser->role != 0) {
            $currentUser->role = '3';
            $currentUser->update();
        }

        return redirect()->back()->with('toast', ['icon' => 'success', 'title' => 'Update role success for' . $currentUser->name]);
    }

    public function banUser(Request $request)
    {
        $currentUser = User::find($request->id);
        if ($currentUser->isBanned == 0) {
            $currentUser->isBanned = '1';
            $currentUser->update();
        }

        return redirect()->route('user-manager.index')->with('toast', ['icon' => 'success', 'title' => $currentUser->name . " is banned."]);
    }

    public function unLockUser(Request $request)
    {
        $currentUser = User::find($request->id);
        if ($currentUser->isBanned == 1) {
            $currentUser->isBanned = '0';
            $currentUser->update();
        }

        return redirect()->route('user-manager.index')->with('toast', ['icon' => 'success', 'title' => $currentUser->name . " is unlock."]);
    }
}
