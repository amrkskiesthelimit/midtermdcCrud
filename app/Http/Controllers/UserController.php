<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index() {
        $roles = Role::all();
        $users = User::with('roles')->paginate(10);

        $users = User::paginate(10);
        return Inertia::render('Users/index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
