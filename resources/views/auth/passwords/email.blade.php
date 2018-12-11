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
                <h1 class="title">Forgot Password?</h1>
                
              <form method="POST" action="{{ route('password.email') }}">
               @csrf  
                <div class="field">
                    <label for="email" class="label">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="email@example.com" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                </div>
                
                <div class="field">
                <button class="button is-primary is-outlined is-fullwidth m-t-30">Get Reset Link</button>
                </div>
              </form>
            </div><!-- end of .card-content -->
        </div><!-- end of .card -->
        <h5 class="has-text-centered m-t-20"><a href="{{ route('login') }}" class="is-muted"><i class="fa fa-caret-left m-r-10"></i>Back to login</a></h5>
    </div>
</div>

@endsection
