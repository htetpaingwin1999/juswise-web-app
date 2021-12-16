<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('user-profile.profile');
    }

    public function editProfile()
    {
        return view('user-profile.edit-profile');
    }

    public function changePassword()
    {
        return view('user-profile.change-password');
    }

    public function changeNameEmail(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:50",
            "email" => "required|min:5|max:50",
            "position" => "required|min:3|max:50"
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->position = $request->position;
        $user->update();

        return redirect()->route('profile')->with("toast", ["icon" => "success", "title" => "User Information Updated."]);
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            "photo" => "required|mimes:png,jpg,jpeg|file|max:25000"
        ]);

        Storage::delete("public/user-profile/" . Auth::user()->photo);
        $file = $request->file("photo");

        $autoName = uniqid() . "_profile." . $file->getClientOriginalExtension();
        Storage::putFileAs("public/user-profile", $file, $autoName);

        $user = User::find(Auth::id());
        $user->photo = $autoName;
        $user->update();

        return redirect()->route('profile')->with("toast", ["icon" => "success", "title" => "Profile Picture Updated."]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            "current_password" => ['required', new MatchOldPassword()],
            "new_password" => ['required', 'min:8'],
            "new_confirm_password" => ['same:new_password']
        ]);

        // User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        // Auth::logout();

        $user = new User();
        $currentUser = $user->find(Auth::id());
        $currentUser->password = Hash::make($request->new_password);
        $currentUser->update();
        Auth::logout();

        return redirect()->route('login');
    }
}
