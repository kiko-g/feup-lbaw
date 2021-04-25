@extends('layouts.entry')

@section('content')
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <header class="text-start text-light mb-4 ms-4">
        <h3>Sign in</h3>
    </header>
    <div class="form-floating mb-4">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Email address</label>
        @if ($errors->has('floatingInput'))
            <span class="error">
                {{ $errors->first('floatingInput') }}
            </span>
        @endif
    </div>
    <div class="form-floating mb-4">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
        @if ($errors->has('floatingPassword'))
            <span class="error">
                {{ $errors->first('floatingPassword') }}
            </span>
        @endif
    </div>
    <div class="d-flex justify-content-between">
        <a href="./register.php" class="link-light entry-anchor text-start">Don't have an account? <br> Sign up</a>
        <button type="submit" class="btn blue-alt">Submit</button>
    </div>
</form>
@endsection
