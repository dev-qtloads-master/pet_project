<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.register'); // Show the registration form
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Ensure password_confirmation matches
            'mode_of_transport' => 'nullable|string|max:255',
            'f_color' => 'nullable|string|max:255',
            'dob' => 'required|integer|between:1900,' . date('Y'), // Ensure dob is a valid year
        ]);

        // Redirect back with errors if validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Format dob to ensure it is a valid date format (YYYY-01-01)
        $dob = $request->input('dob') ? $request->input('dob') . '-01-01' : null;

        // Create and store the new user in the database
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Hash password
            'mode_of_transport' => $request->input('mode_of_transport'),
            'f_color' => $request->input('f_color'),
            'dob' => $dob, // Store dob in proper date format
        ]);

        // Optionally, log the user in immediately after registration
        // auth()->login($user);

        // Redirect to the login page with a success message
        return redirect()
            ->route('home')
            ->with('success', 'Registration successful. Please log in.');
    }
}
