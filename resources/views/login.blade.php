@extends('layouts.app')
@section('content')
    @push('style-css')
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
    @endpush
    <div class="container">
        <div class="wrapper">
            <div class="form_wrapper">
                <div class="text__header">
                    <p>Masuk</p>
                </div>
                <div class="img_container">
                    <img src="{{ asset('assets/images/svg/login.svg') }}" class="img_main" alt="img_main" />
                </div>
                <div class="form">
                    <center>
                        @if ($errors->any())
                            <div>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </center>
                    <center>
                        @if (session('success'))
                            <div>
                                {{ session('success') }}
                            </div>
                        @endif
                    </center>
                    <form action="{{ URL('login') }}" method="POST">
                        @csrf
                        <div class="form_group">
                            <label for="email">Alamat Email</label>
                            <input type="email" name="email" placeholder="Masukan email" />
                            <i class="fa-regular fa-envelope fa-xl icon_style"></i>
                        </div>
                        <div class="form_group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Masukan password" />
                            <i class="fa-solid fa-key fa-xl icon_style"></i>
                        </div>
                        <div class="label_forgot_pswd">
                            <a href="#" class="forgot_pswd">Lupa password?</a>
                        </div>
                        <div class="btn_group">
                            <button type="submit">Submit</button>
                        </div>
                        <div class="text_footer">
                            <p>Belum punya akun?</p>
                            <a href="{{ URL('register') }}" class="sign_up_text">&nbsp;Daftar sekarang</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
