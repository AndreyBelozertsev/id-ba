<?php

namespace App\Http\Controllers\Auth;


use Illuminate\View\View;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\RegisterRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }


    public function store(RegisterRequest $request): RedirectResponse
    {

        $user = User::create([
            'name' => $request->name,
            'family' => $request->family,
            'patronymic' => $request->patronymic,
            'phone' => $request->phone,
            'social_link' => $request->social_link,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'branch_id' => (int)$request->branch_id,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}