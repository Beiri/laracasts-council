<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;

class ProfilesController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @param  User  $user
     * @return \Response
     */
    public function show(User $user)
    {
        $data = [
            'profileUser' => $user,
            'activities' => Activity::feed($user)
        ];

        if (request()->expectsJson()) {
            return $data;
        }

        return view('profiles.show', $data);
    }

    public function index(User $user)
    {
        return ['activities' => Activity::paginatedFeed($user)->paginate(2)];
    }
}
