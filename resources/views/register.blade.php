@extends('layouts.app')
@section('content')
@push('style-css')
<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}" />
@endpush
@if ($errors->any())
    <div style="color:red">
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
                  placeholder="Masukkan nama lengkap"required
                />
                <i class="fa-regular fa-user fa-xl icon_style"></i>
              </div>
              <div class="form_group">
                <label for="email">Alamat Email</label>
                <input
                  type="email"
                  name="email"
                  placeholder="Masukan email"required
                />
                <i class="fa-regular fa-envelope fa-xl icon_style"></i>
              </div>
              <div class="form_group">
                <label for="password">Password</label>
                <input
                  type="password"
                  name="password"
                  placeholder="Masukan password"required
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

              <div class="form_group"><br>
                <center>
                <label for="role">Daftar Sebagai</label><br>
                  <div class="wrapper2">
                  <input type="radio" name="role" value="0" id="option-1" checked>
                  <input type="radio" name="role" value="1" id="option-2">
                    <label for="option-1" class="option option-1">
                      <div class="dot"></div>
                       <span>Investor</span>
                       </label>
                    <label for="option-2" class="option option-2">
                      <div class="dot"></div>
                       <span>Mitra UMKM</span>
                    </label>
                  </div>
                </center>
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