<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function assignRole(Request $request, $userId)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|in:admin,client', // Assuming roles are 'admin' and 'client'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->role = $request->input('role');
        $user->save();

        return response()->json(['message' => 'Role assigned successfully', 'user' => $user], 200);
    }
}
