@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="notification is-success">
        {{ session('status') }}
    </div>
@endif

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title">Reset Your Password</h1>
              <form method="POST" action="{{ route('password.update') }}">
               @csrf  
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="field">
                    <label for="email" class="label">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="email@example.com" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                </div>
                <div class="columns">
                <div class="column">
                <div class="field">
                    <label for="password" class="label">Password</label>
                        <input type="password" name="password" id="password"  class="input {{ $errors->has('password') ? ' is-danger' : '' }}" required>
                        @if ($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                </div>
                </div>
                <div class="column">
                <div class="field">
                    <label for="password" class="label">Repeat Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"  class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" required>
                        @if ($errors->has('password_confirmation'))
                            <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                </div>
                </div>
                </div>
                <div class="field">
                
                <button class="button is-primary is-outlined is-fullwidth m-t-30">Reset Password</button>
                </div>
              </form>
            </div><!-- end of .card-content -->
        </div><!-- end of .card -->
        
    </div>
</div>

@endsection
