@extends('layouts.app')

@section('css')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    }

    body {
        min-height: 100vh;
        background-color: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        max-width: 1200px;
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    }

    .register-section {
        padding: 2rem;
        max-width: 480px;
        margin: 0 auto;
        width: 100%;
    }

    .info-section {
        background: #f8fafc;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .logo {
        max-width: 200px;
        margin-bottom: 2rem;
    }

    .title {
        color: #0369a1;
        font-size: 1.5rem;
        line-height: 1.4;
        margin-bottom: 2rem;
    }

    .illustration {
        max-width: 100%;
        height: auto;
    }

    h1 {
        font-size: 2rem;
        color: #0f172a;
        margin-bottom: 0.5rem;
    }

    .subtitle {
        color: #64748b;
        margin-bottom: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        color: #334155;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .input-wrapper {
        position: relative;
    }

    input, select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        background-color: #f8fafc;
        font-size: 0.875rem;
        transition: all 0.2s;
    }

    input:focus, select:focus {
        outline: none;
        border-color: #0369a1;
        background-color: white;
    }

    .toggle-password {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #64748b;
    }

    .register-button {
        width: 100%;
        padding: 0.75rem;
        background-color: #0369a1;
        color: white;
        border: none;
        border-radius: 0.375rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .register-button:hover {
        background-color: #075985;
    }

    .login-link {
        text-align: center;
        margin-top: 1rem;
        font-size: 0.875rem;
    }

    .login-link a {
        color: #0369a1;
        text-decoration: none;
    }

    .login-link a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .container {
            grid-template-columns: 1fr;
        }

        .info-section {
            display: none;
        }

        .register-section {
            padding: 1.5rem;
        }
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="register-section">
        <h1>Register</h1>
        <p class="subtitle">Create your account by answering a few questions</p>

        <form id="registrationForm" action="{{ route('register.store') }}" method="POST">
            @csrf

            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <div class="input-wrapper">
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁️</span>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Password Confirmation Field -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Favorite Color Field -->
            <div class="form-group">
                <label for="favoriteColor">What's your favorite color?</label>
                <div class="input-wrapper">
                    <input type="text" id="favoriteColor" name="f_color" value="{{ old('f_color') }}" required>
                    @error('f_color') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Birth Year Field -->
            <div class="form-group">
                <label for="birthYear">What year were you born?</label>
                <div class="input-wrapper">
                    <select id="birthYear" name="dob" required>
                        <option value="" disabled selected>Select a year</option>
                        @for ($year = 1900; $year <= date('Y'); $year++)
                            <option value="{{ $year }}" {{ old('dob') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>
                    @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Preferred Transport Field -->
            <div class="form-group">
                <label for="preferredTransport">What's your preferred mode of transport?</label>
                <div class="input-wrapper">
                    <select id="preferredTransport" name="mode_of_transport" required>
                        <option value="">Select an option</option>
                        <option value="bus" {{ old('mode_of_transport') == 'bus' ? 'selected' : '' }}>Bus</option>
                        <option value="car" {{ old('mode_of_transport') == 'car' ? 'selected' : '' }}>Car</option>
                        <option value="bicycle" {{ old('mode_of_transport') == 'bicycle' ? 'selected' : '' }}>Bicycle</option>
                        <option value="walking" {{ old('mode_of_transport') == 'walking' ? 'selected' : '' }}>Walking</option>
                    </select>
                    @error('mode_of_transport') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <button type="submit" class="register-button">Register</button>
        </form>

        <p class="login-link">
            Already have an account? <a href="{{ route('login') }}">Log In</a>
        </p>
    </div>

    <div class="info-section">
        <h2 class="title">Pet Care Solution by Your Companion: A Comprehensive Platform for Managing and Enhancing the Well-being of Your Pets</h2>
        <img src="{{ asset('Assets/images/yc logo.jpeg') }}" alt="Bus Management Illustration" class="illustration">
    </div>
</div>

@endsection

@section('scripts')
    <script>
        // Wait for the DOM to fully load
        document.addEventListener('DOMContentLoaded', function() {
            // Function to validate the form before submission
            function validateForm(event) {

                const form = document.getElementById('registrationForm');
                let isValid = true;


                // Validate Full Name
                const name = document.getElementById('name').value.trim();
                if (!name) {
                    isValid = false;
                    alert('Full Name is required.');
                }

                // Validate Email
                const email = document.getElementById('email').value.trim();
                const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!email || !emailPattern.test(email)) {
                    isValid = false;
                    alert('Please enter a valid email address.');
                }

                // Validate Password (at least 8 characters, combination of uppercase, lowercase, number, and special character)
                const password = document.getElementById('password').value.trim();
                const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{8,}$/;
                if (!password || !passwordPattern.test(password)) {
                    isValid = false;
                    alert('Password must be at least 8 characters long and include a combination of uppercase, lowercase letters, numbers, and special characters.');
                }

                // Validate Password Confirmation
                const passwordConfirmation = document.getElementById('password_confirmation').value.trim();
                if (password !== passwordConfirmation) {
                    isValid = false;
                    alert('Passwords do not match.');
                }

                // Validate Favorite Color
                const favoriteColor = document.getElementById('favoriteColor').value.trim();
                if (!favoriteColor) {
                    isValid = false;
                    alert('Favorite color is required.');
                }

                // Validate Birth Year
                const birthYear = document.getElementById('birthYear').value;
                if (!birthYear) {
                    isValid = false;
                    alert('Please select a birth year.');
                }

                // Validate Preferred Transport
                const preferredTransport = document.getElementById('preferredTransport').value;
                if (!preferredTransport) {
                    isValid = false;
                    alert('Please select your preferred mode of transport.');
                }

                // If the form is invalid, prevent submission
                if (!isValid) {
                    event.preventDefault();
                }
            }

            // Attach event listener to the form after the DOM is loaded
            const form = document.getElementById('registrationForm');
            if (form) {
                form.addEventListener('submit', validateForm);
            }

            // Password toggle function
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const toggleButton = document.querySelector('.toggle-password');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleButton.textContent = '🔒';
                } else {
                    passwordInput.type = 'password';
                    toggleButton.textContent = '👁️';
                }
            }

            // Add the togglePassword function to the password toggle button
            const toggleButton = document.querySelector('.toggle-password');
            if (toggleButton) {
                toggleButton.addEventListener('click', togglePassword);
            }
        });
    </script>
@endsection



{{-- @section('scripts')
    <script>
        // Function to validate the form before submission
        function validateForm(event) {
            const form = document.getElementById('registrationForm');
            let isValid = true;

            // Validate Full Name
            const name = document.getElementById('name').value.trim();
            if (!name) {
                isValid = false;
                alert('Full Name is required.');
            }

            // Validate Email
            const email = document.getElementById('email').value.trim();
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!email || !emailPattern.test(email)) {
                isValid = false;
                alert('Please enter a valid email address.');
            }

            // Validate Password (at least 8 characters, combination of uppercase, lowercase, number, and special character)
            const password = document.getElementById('password').value.trim();
            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{8,}$/;
            if (!password || !passwordPattern.test(password)) {
                isValid = false;
                alert('Password must be at least 8 characters long and include a combination of uppercase, lowercase letters, numbers, and special characters.');
            }

            // Validate Password Confirmation
            const passwordConfirmation = document.getElementById('password_confirmation').value.trim();
            if (password !== passwordConfirmation) {
                isValid = false;
                alert('Passwords do not match.');
            }

            // Validate Favorite Color
            const favoriteColor = document.getElementById('favoriteColor').value.trim();
            if (!favoriteColor) {
                isValid = false;
                alert('Favorite color is required.');
            }

            // Validate Birth Year
            const birthYear = document.getElementById('birthYear').value;
            if (!birthYear) {
                isValid = false;
                alert('Please select a birth year.');
            }

            // Validate Preferred Transport
            const preferredTransport = document.getElementById('preferredTransport').value;
            if (!preferredTransport) {
                isValid = false;
                alert('Please select your preferred mode of transport.');
            }

            // If the form is invalid, prevent submission
            if (!isValid) {
                event.preventDefault();
            }
        }

        // Attach event listener to the form
        document.getElementById('registrationForm').addEventListener('submit', validateForm);

        // Password toggle function
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.querySelector('.toggle-password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = '🔒';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = '👁️';
            }
        }
    </script>
@endsection --}}


{{-- @section('scripts')
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.querySelector('.toggle-password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.textContent = '🔒';
        } else {
            passwordInput.type = 'password';
            toggleButton.textContent = '👁️';
        }
    }
</script>
@endsection --}}
