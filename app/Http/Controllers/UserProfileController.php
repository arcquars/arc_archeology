<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserProfileController extends Controller
{
    public function show()
    {
//        $role = Role::findByName('system-owner');
//        $role->givePermissionTo('manager-users');

        $user = Auth::user();
        return view('users.profile', compact('user'));
    }
}
