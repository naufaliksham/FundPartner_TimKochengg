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
                <label for="username">Nama Lengkap</label>
                <input
                  type="text"
                  name="name"
                  placeholder="Masukkan nama lengkap"
                />
                <i class="fa-regular fa-user fa-xl icon_style"></i>
              </div>
              <div class="form_group">
                <label for="email">Alamat Email</label>
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
                  placeholder="Masukan password"
                />
                <i class="fa-solid fa-key fa-xl icon_style"></i>
              </div>

              <div class="form_group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                placeholder="Ulangi password"required>
                <i class="fa-solid fa-key fa-xl icon_style"></i>
              </div>

              <div class="form_group">
                <label for="role">Daftar Sebagai</label>
                <select name="role" id="role" class="role_select">
                  <option value="Mitra">--- </option>
                  <option value="1">MITRA </option>
                  <option value="0">INVESTOR</option>
                </select>
              </div>
        
              <div class="label_forgot_pswd">
                <a href="#" class="forgot_pswd">Lupa password?</a>
              </div>
              <div class="btn_group">
                <button type="submit">DAFTAR</button>
              </div>
              <div class="text_footer">
                <p>Sudah punya akun?</p>
                <a href="{{ URL('login') }}" class="sign_in_text">&nbsp;Masuk</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection