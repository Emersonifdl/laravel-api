<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function show(User $user)
    {
        return response()->json($user);
    }
}
