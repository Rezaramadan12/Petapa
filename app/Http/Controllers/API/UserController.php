<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUser()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function createUser(Request $request)
    {
        // Validasi request

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return response()->json($user, 201);
    }
    public function updateUser(Request $request, $id)
    {
        // Validasi request

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return response()->json($user);
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(null, 204);
    }
}
