<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }


    public function edit()
     {

        return view('users.edit')->with('user', auth()->user());
   }

   public function update(UpdateProfileRequest $request)
   {
    // Get the authenticated user
    $user = auth()->user();

    // Update the user's information
    $user->update([
        'name' => $request->name,
        'about' => $request->about,
    ]);

    // Redirect with a success message
    return redirect(route('users.index'))->with('success', 'User Updated Successfully');

}
    public function makeAdmin(User $user)
    {
        $user->role='admin';

        $user->save();

        return redirect(route('users.index'))->with('success','User made admin Successfully');


    }
}
