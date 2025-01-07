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

    .login-section {
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

    input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        background-color: #f8fafc;
        font-size: 0.875rem;
        transition: all 0.2s;
    }

    input:focus {
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

    .remember-forgot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .forgot-password {
        color: #0369a1;
        text-decoration: none;
        font-size: 0.875rem;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .sign-in-button {
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

    .sign-in-button:hover {
        background-color: #075985;
    }

    .divider {
        text-align: center;
        margin: 1.5rem 0;
        color: #64748b;
        font-size: 0.875rem;
    }

    .contact-text {
        text-align: center;
        color: #64748b;
        font-size: 0.875rem;
    }

    .contact-link {
        color: #0369a1;
        text-decoration: none;
    }

    .contact-link:hover {
        text-decoration: underline;
    }

    .sign-up-button {
        width: 100%;
        padding: 0.75rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 0.375rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
        margin-top: 1rem;
    }

    .sign-up-button:hover {
        background-color: #45a049;
    }

    @media (max-width: 768px) {
        .container {
            grid-template-columns: 1fr;
        }

        .info-section {
            display: none;
        }

        .login-section {
            padding: 1.5rem;
        }
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="login-section">
        <h1>Login</h1>
        <p class="subtitle">Log in to your account to start session</p>

        <!-- Update form to submit via POST method to the Login route -->
        <form method="POST" action="{{ route('login.store') }}">
            @csrf <!-- Add CSRF token -->
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="operation@gmail.com" required>
                    @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    <span class="toggle-password" onclick="togglePassword()">👁️</span>
                </div>
            </div>

            <div class="remember-forgot">
                <div class="checkbox-wrapper">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" class="sign-in-button">Sign In</button>
        </form>

        <div class="divider">Or continue with</div>

        <p class="contact-text">
            If not able to login? <a href="#" class="contact-link">Contact Us</a>
        </p>

        <!-- Sign Up Button if the user does not have an account -->
        <p class="text-center mt-4">
            <a href="{{ route('register') }}" class="text-blue-600">Don't have an account? Sign Up</a>
        </p>
    </div>

    <div class="info-section">
        <img src="{{ asset('Assets/images/yc logo.jpeg') }}?height=50&width=200" alt="YC Logo" class="logo">
        <h2 class="title"> An initiative to take care of your dogs and cats <br> Yours Companion </h2>
        <img src="{{ asset('Assets/images/yc logo.jpeg') }}" alt="Bus Management Illustration" class="illustration">
    </div>
</div>

@endsection

@section('scripts')
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    }
</script>
@endsection
