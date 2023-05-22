<!-- resources/views/reset_password.blade.php -->

<html>
<head>
    <title>Pengaturan Ulang Password</title>
</head>
<body>
    <h2>Pengaturan Ulang Password</h2>

    @if(session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">Password Baru:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Konfirmasi Password Baru:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">Atur Ulang Password</button>
        </div>
    </form>
    <div>
        <p>Ingat password?<a href="{{ route("login") }}"><i>Silahkan masuk</i></a></p>
    </div>
</body>
</html>
