@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title">Log In</h1>
              <form method="POST" action="{{ route('login') }}">
               @csrf  
                <div class="field">
                    <label for="email" class="label">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="email@example.com" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                </div>
                <div class="field">
                    <label for="password" class="label">Password</label>
                        <input type="password" name="password" id="password"  class="input {{ $errors->has('password') ? ' is-danger' : '' }}">
                        @if ($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                </div>
                <div class="field">
                <b-checkbox name="remember" class="m-t-20">Remember me</b-checkbox>
                <button class="button is-primary is-outlined is-fullwidth m-t-30">Log In</button>
                </div>
              </form>
            </div><!-- end of .card-content -->
        </div><!-- end of .card -->

        <h5 class="has-text-centered m-t-20"><a href="{{ route('password.request') }}" class="is-muted">Forgot Your Password?</a></h5>
        
    </div>
</div>


@endsection
