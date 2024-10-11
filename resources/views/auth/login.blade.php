<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="{{ asset('styles/index.css') }}">
    <style>
        body {
            direction: rtl;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="main-page">
        <div class="login-box">
            <h2>تسجيل الدخول</h2>

            <!-- Show validation errors, if they exist -->
            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf  <!-- Include CSRF token -->

                <!-- Email Input -->
                <div class="user-box">
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    <label>البريد الإلكتروني</label>
                </div>

                <!-- Password Input -->
                <div class="user-box">
                    <input type="password" name="password" required>
                    <label>كلمة المرور</label>
                </div>

                <!-- Submit Button -->
                <button class="btn-h" type="submit">دخول</button>
            </form>
        </div>
    </div>
</body>
</html>
