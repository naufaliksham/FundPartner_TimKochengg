<!-- resources/views/forgot_password.blade.php -->

<html>
<head>
    <title>Lupa Password</title>
</head>
<body>
    <h2>Lupa Password</h2>

    @if(session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
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
