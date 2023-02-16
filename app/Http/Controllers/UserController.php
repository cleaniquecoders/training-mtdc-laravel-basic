<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->authorize('viewAny', User::class);

        $users = User::paginate();

        return response()->view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->authorize('create');

        return response()->view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create');

        // validate
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:128'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ]);

        // store
        $data = $request->only('name', 'email', 'password');
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        // set session message
        session()->flash(
            'message',
            __('You have successfully add a new user.')
        );

        // redirect to user details.
        return redirect()->route('users.show', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        $this->authorize('view');

        return response()->view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        $this->authorize('update');

        return response()->view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $this->authorize('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete');

        // delete the user
        $user->delete();

        // set session message
        session()->flash(
            'message',
            __('You have successfully delete a user.')
        );

        // redirect to user listing
        return redirect()->route('users.index');
    }
}
