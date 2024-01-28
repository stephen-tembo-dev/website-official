@extends('layouts.app')

@section('content')

<div class="container std-sp"></div>

    <div class="row">
        <div class="col s12 m8 offset-m2">
        <div style="border-radius: 10px; margin-top:40px" class="card z-depth-1">
                <div class="card-content">
                <h5 class=""><b>{{ __('Sign up') }}</b></h5>

                    <form style="margin-top:20px" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="validate @error('name') invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="helper-text red-text" data-error="{{ $message }}" data-success=""></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="email">{{ __('email') }}</label>
                                <input id="email" type="text" class="validate @error('email') invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="helper-text red-text" data-error="{{ $message }}" data-success=""></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="validate @error('password') invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="helper-text red-text" data-error="{{ $message }}" data-success=""></span>
                                @enderror
                            </div>

                            <div class="input-field col s6">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="validate" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row">

                        </div>

                        <div class="row">
                            <div class="col s12">
                                <button style="border-radius:8px" type="submit" class="btn waves-effect waves-light z-depth-0 btn-primary btn-small black">
                                    {{ __('Sign up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
    <div class="container std-sp"></div>

@endsection