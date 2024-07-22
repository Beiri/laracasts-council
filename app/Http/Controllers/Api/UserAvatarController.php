<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserAvatarController extends Controller
{
    /**
     * Store a new user avatar.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /** @var \App\User $user */
        $user = auth()->user();
        request()->validate([
            'avatar' => ['required', 'image']
        ]);

        Storage::disk('public')->delete($user->getOriginal('avatar_path'));

        $user->update([
            'avatar_path' => request()->file('avatar')->store('avatars', 'public')
        ]);

        return response([], 204);
    }
}
