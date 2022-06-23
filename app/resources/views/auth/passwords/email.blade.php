@extends('layouts.admin-full')
@section('title', 'パスワードリマインダー')

@section('content')

    <div id="auth-form" class="card mt-3">
        <div class="card-header">{{ __('Reset Password') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row mb-3">
                    <div class="form-group">
                        <label for="email"
                               class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0 mx-5">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
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
