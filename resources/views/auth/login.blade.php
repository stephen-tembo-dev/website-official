@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col m8 s12 offset-m2">
            <div style="border-radius: 10px; margin-top:80px" class="card z-depth-1">
                <div class="card-content">
                    <h5 class=""><b>{{ __('Sign in') }}</b></h5>

                    <form style="margin-top:20px" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="email">{{ __('email') }}</label>
                                <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="helper-text red-text" data-error="{{ $message }}" data-success=""></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="validate @error('password') invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="helper-text red-text" data-error="{{ $message }}" data-success=""></span>
                                @enderror
                            </div>
                        </div>

                     
                        <div class="row">
                            <div class="col s12">
                                <button style="border-radius:8px" type="submit" class="btn waves-effect waves-light z-depth-0 btn-primary btn-small ">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a style="margin-left:20px" class="" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection