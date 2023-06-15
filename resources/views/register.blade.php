@extends('layouts.app')
@section('content')
@push('style-css')
<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}" />
@endpush
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
      <div class="wrapper">
        <div class="form_wrapper">
          <div class="text__header">
            <p>Register</p>


          </div>
          <div class="img_container">
            <img
              src="{{ asset('assets/images/svg/register.svg') }}"
              class="img_main"
              alt="img_main"
            />
          </div>
          <div class="form">
            <form action="{{ URL('register') }}" method="POST">
                @csrf
              <div class="form_group">
                <label for="username">Username</label>
                <input
                  type="text"
                  name="username"
                  placeholder="Enter your username"
                />
                <i class="fa-regular fa-user fa-xl icon_style"></i>
              </div>
              <div class="form_group">
                <label for="fullname">Full Name</label>
                <input
                  type="text"
                  name="fullname"
                  placeholder="Enter your full name"
                />
                <i class="fa-regular fa-address-card fa-xl icon_style"></i>
              </div>
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

              <div class="form_group">
                <label for="role">Login Sebagai</label>
                <select name="role" id="role" class="role_select">
                    <option value="Mitra">--- </option>
                  <option value="Mitra">MITRA </option>
                  <option value="Investor">INVESTOR</option>
                </select>
              </div>
        
              <div class="label_forgot_pswd">
                <a href="#" class="forgot_pswd">Forgot password?</a>
              </div>
              <div class="btn_group">
                <button type="submit">REGISTER</button>
              </div>
              <div class="text_footer">
                <p>Already Have an Account?</p>
                <a href="{{ URL('login') }}" class="sign_in_text">Sign In</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection