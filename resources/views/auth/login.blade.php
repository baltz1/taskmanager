@extends('layouts/main')

@section('content')
  <div id="home">
    <div class="welcome-box">
      <h1>Welcome To Your Task Manager</h1>
{{-- Login Area  --}}
      <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group">
              <label for="email">{{ __('E-Mail Address') }}:</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group ">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}:</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                      </label>
                  </div>
              </div>
          </div>

          <div class="form-group ">
              <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn-lightBlue">
                      {{ __('Login') }}
                  </button>

                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
                  <a href="/register">
                    Create Account
                  </a>
              </div>
          </div>
      </form>
    </div>
  </div>
@endsection
