@extends('public.index')

@section('content')
{{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
<div class="registerForm">
    <!-- general form elements -->
    

    <form method="POST" action="{{ route('register') }}">
        @csrf
<div class="formpadding">
<h2 style="text-align:center">Sign Up</h2>

<hr>

<label for="name"><b>Name</b></label>
<input type="text" class="@error('name') is-invalid @enderror" placeholder="Enter name" name="name">
@error('name')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span><br>
@enderror

<label for="email"><b>Email</b></label>
<input type="text" class="@error('email') is-invalid @enderror" placeholder="Enter email" name="email">
@error('email')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span><br>
@enderror


<label for="password"><b>Password</b></label>
<input type="password" class="@error('password') is-invalid @enderror" placeholder="Enter password" name="password">
@error('password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror


<label for="password"><b> Confirm Password</b></label>
<input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">


<hr>

<button type="submit" class="registerbtn">Sign Up</button>
</div>

<div class="formpadding signin">
    <p>Already have an account? <a href="{{ route('login') }}">Sign in</a>.</p>
  </div>
</form>
      
</div>
@endsection

