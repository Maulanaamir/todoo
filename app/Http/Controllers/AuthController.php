<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function showRegisterForm()
	{
		return view('auth.register');
	}

	public function register(Request $request)
	{
		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:8|confirmed',
		], [
			'name.required' => 'Name is required.',
			'email.required' => 'Email is required.',
			'email.email' => 'Please provide a valid email address.',
			'email.unique' => 'This email is already taken.',
			'password.required' => 'Password is required.',
			'password.min' => 'Password must be at least 8 characters long.',
			'password.confirmed' => 'Password confirmation does not match.',
		]);

		User::create([
			'name' => $validated['name'],
			'email' => $validated['email'],
			'password' => Hash::make($validated['password']),
		]);

		return redirect()->route('login')->with('success', 'Registration successful! Please login.');
	}

	public function showLoginForm()
	{
		return view('auth.login');
	}

	public function login(Request $request)
	{
		$credentials = $request->validate([
			'email' => 'required|string|email',
			'password' => 'required|string',
		], [
			'email.required' => 'Email is required.',
			'email.email' => 'Please provide a valid email address.',
			'password.required' => 'Password is required.',
		]);

		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();
			return redirect()->route('todos.index')->with('success', 'You are logged in!');
		}

		throw ValidationException::withMessages([
			'email' => 'The provided credentials do not match our records.',
		]);
	}

	public function logout(Request $request)
	{
		Auth::logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('landing')->with('success', 'You have been logged out!');
	}
}