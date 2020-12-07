<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Newsletter;

class UserController extends Controller
{

    public function changePassword()
    {
        $data['user'] = Auth::user();

        return view('admin.change-password', $data);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
           'old_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!\Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
           'password' => 'required|min:8|different:old_password',
           'confirm_password' => 'required|same:password',
        ]);

        $user->update(['password' => bcrypt($request->password)]);

        return back()->with(['success' => 'Your password has been updated successfully.']);
    }
}
