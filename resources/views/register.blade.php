<!-- resources/views/register.blade.php -->

<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div>
            <label for="role">Ingin menjadi:</label>
            <input type="radio" id="role-investor" name="role" value="0" required>
            <label for="role-investor">Investor</label>
        
            <input type="radio" id="role-umkm" name="role" value="1" required>
            <label for="role-umkm">Mitra UMKM</label>
        </div>        

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
    <div>
        <p>Sudah punya akun?<a href="{{ route("login") }}"><i>silahkan masuk</i></a></p>
    </div>
</body>
</html>
