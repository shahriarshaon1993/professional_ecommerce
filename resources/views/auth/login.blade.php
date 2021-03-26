@extends('layouts.app')

@section('content')

    <!-- Contact Form -->

        <div class="contact_form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 offset-lg-1 p-4" style="border: 1px solid gray; border-radius: 25px;">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center">Sign In</div>

                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email or Phone</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your E-mail or Phone" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Your Password" required autocomplete="current-password">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-info">Sign In</button><br><br>

                                <a href="{{ route('password.request') }}">I forgot my password</a>

                            </form><br>

                            <button type="submit" class="btn btn-primary btn-block"><i class="fab fa-facebook-square"></i> Login With Facebook</button>

                            <button type="submit" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Login With Google</button>

                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1 p-4" style="border: 1px solid gray; border-radius: 25px;">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center">Sign Up</div>

                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group icon_parent">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your full name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group icon_parent">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Enter your phone number">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group icon_parent">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your E-mail">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group icon_parent">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group icon_parent">
                                    <label for="password-confirm">Re-type Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Signup</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="panel"></div>
        </div>

@endsection
