<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->with('department')->orderBy('name')->paginate(10);

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get();
        $departments = Department::orderBy('name')->get();
        return view('users.create')->with('roles', $roles)->with('departments' , $departments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);

        User::create($request->only('name', 'email', 'role_id', 'department_id'));

        $users = User::with('role')->paginate(15);

        return redirect()->route('users.index')->with('users', $users)->withSuccess('User Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = User::findOrFail($user->id);

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user->load('role', 'department');
        $roles = Role::all();
        $departments = Department::all();

        return view('users.edit')->with('user' , $user)->with('roles' , $roles)->with('departments', $departments);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->only(['name', 'email', 'role_id', 'department_id']));

        $user->save();

        return redirect()->route('users.show', $user)->withSuccess('User Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->withSuccess('User deleted successfully!');

    }
}
