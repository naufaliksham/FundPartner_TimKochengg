@extends('layouts.app')
@section('content')
@push('style-css')
<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
@endpush
    <div class="container">
      <div class="wrapper">
        <div class="form_wrapper">
          <div class="text__header">
            <p>Login</p>

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
          </div>
          <div class="img_container">
            <img
              src="{{ asset('assets/images/svg/login.svg') }}"
              class="img_main"
              alt="img_main"
            />
          </div>
          <div class="form">
            <form action="{{ URL('login') }}" method="POST">
                @csrf
              <div class="form_group">
                <label for="email">Email Address</label>
                <input
                  type="email"
                  name="email"
                  placeholder="Enter your email address"
                />
                <i class="fa-regular fa-envelope fa-xl icon_style"></i>
              </div>
              <div class="form_group">
                <label for="password">Password</label>
                <input
                  type="password"
                  name="password"
                  placeholder="Enter your password"
                />
                <i class="fa-solid fa-key fa-xl icon_style"></i>
              </div>
              <div class="label_forgot_pswd">
                <a href="#" class="forgot_pswd">Forgot password?</a>
              </div>
              <div class="btn_group">
                <button type="submit">LOGIN</button>
              </div>
              <div class="text_footer">
                <p>Don't have an account?</p>
                <a href="{{ URL('register') }}" class="sign_up_text">Sign Up</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection