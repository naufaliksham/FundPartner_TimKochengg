<!-- resources/views/login.blade.php -->

<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <p>Belum punya akun?<a href="{{ route("register") }}"><i>silahkan daftar</i></a></p>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>
