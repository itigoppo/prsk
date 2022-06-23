@extends('layouts.admin-full')
@section('title', 'ユーザー登録')

@section('content')

    <div id="auth-form" class="card mt-3">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <div class="form-group">
                        <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>

                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="form-group">
                        <label for="email"
                               class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="form-group">
                        <label for="password"
                               class="col-form-label text-md-end">{{ __('Password') }}</label>

                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="form-group">
                        <label for="password-confirm"
                               class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0 mx-5">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>

                @if (Route::has('login'))
                    <div class="row mt-3 mb-0 text-end">
                        <a href="{{ route('login') }}">
                            {{ __('login back') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
