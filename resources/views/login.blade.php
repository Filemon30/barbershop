
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - {{ config('app.name', 'Barbershop') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('CSS/logIn.css') }}">
</head>

<body>

    <main class="login-container">

        <div class="login-card">

            <header class="card-header">
                <h1>WELCOME BACK</h1>
                <p>Sign in to your account to book your next appointment.</p>
            </header>


            <!-- Success / Status Message -->
            @if (session('status'))
                <div class="alert-status">
                    {{ session('status') }}
                </div>
            @endif


            <!-- Login Form -->
            <form
                class="login-form"
                method="POST"
            
            >
                @csrf


                <!-- Email -->
                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="input-wrapper">

                        <i
                            data-lucide="mail"
                            class="input-icon"
                        ></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="name@example.com"
                            required
                            autofocus
                            autocomplete="email"
                            class="@error('email') input-error @enderror"
                        >

                    </div>

                    @error('email')
                        <span class="error-message">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                <!-- Password -->
                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <i
                            data-lucide="lock"
                            class="input-icon"
                        ></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            autocomplete="current-password"
                            class="@error('password') input-error @enderror"
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                            aria-label="Show password"
                        >
                            <i data-lucide="eye"></i>
                        </button>

                    </div>

                    @error('password')
                        <span class="error-message">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                <!-- Remember Me / Forgot Password -->
                <div class="form-options">

                    <label class="remember-me">

                        <input
                            type="checkbox"
                            name="remember"
                            id="remember"
                            {{ old('remember') ? 'checked' : '' }}
                        >

                        <span class="custom-checkbox"></span>

                        <span class="label-text">
                            Remember Me
                        </span>

                    </label>


                    @if (Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-password"
                        >
                            Forgot Password?
                        </a>
                    @endif

                </div>


                <!-- Login -->
                <button
                    type="submit"
                    class="btn-login"
                >
                    LOGIN
                </button>

            </form>


            <!-- Create Account -->
            @if (Route::has('register'))

                <footer class="card-footer">

                    <p>
                        Don't have an account?
                    </p>

                    <a
                        href="{{ route('register') }}"
                        class="create-account"
                    >
                        CREATE ACCOUNT
                    </a>

                </footer>

            @endif

        </div>

    </main>


    <!-- JavaScript -->
    <script>

        // Initialize Lucide icons
        lucide.createIcons();


        // Password visibility
        const togglePassword =
            document.getElementById('togglePassword');

        const passwordInput =
            document.getElementById('password');


        if (togglePassword && passwordInput) {

            togglePassword.addEventListener('click', function () {

                const isPassword =
                    passwordInput.type === 'password';

                passwordInput.type =
                    isPassword ? 'text' : 'password';


                this.setAttribute(
                    'aria-label',
                    isPassword
                        ? 'Hide password'
                        : 'Show password'
                );


                const icon =
                    this.querySelector('[data-lucide]');

                if (icon) {

                    icon.setAttribute(
                        'data-lucide',
                        isPassword
                            ? 'eye-off'
                            : 'eye'
                    );

                    lucide.createIcons();

                }

            });

        }

    </script>

</body>

</html>
