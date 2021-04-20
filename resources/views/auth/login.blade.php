@extends('layouts.app')

@section('content')

    <!-- Login Modal -->
    <div>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body py-4 px-0">
                    <!-- Login Form -->
                    <div class="row">
                        <div class="col-11 col-md-10 mx-auto">
                            <ul class="nav nav-tabs nav-justified mb-4" role="tablist">
                                <li class="nav-item"> <a class="nav-link text-5 line-height-3 active">Login</a> </li>
                                <li class="nav-item"> <a class="nav-link text-5 line-height-3"
                                        href="{{ route('register') }}">Sign Up</a>
                                </li>
                            </ul>
                            <p class="text-4 font-weight-300 text-muted text-center mb-4">We are glad to see you again!
                            </p>
                            <form id="loginForm" method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" required placeholder="Email"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" required
                                        placeholder="Password" autocomplete="off" />
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row my-4">
                                    <div class="col">
                                        <div class="form-check text-2 custom-control custom-checkbox">
                                            <input id="remember-me" name="remember" class="custom-control-input"
                                                type="checkbox" {{ old('remember') ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col text-2 text-right"><a class="btn-link" href="" data-toggle="modal"
                                            data-target="#forgot-password-modal" data-dismiss="modal">Forgot Password
                                            ?</a></div>
                                </div>
                                <button class="btn btn-primary btn-block my-4" type="submit">Login</button>
                            </form>
                            <x-auth.social-auth />
                            <p class="text-2 text-center mb-0">New to MobileLoad? <a class="btn-link"
                                    href="{{ route('register') }}">Sign Up</a></p>
                        </div>
                    </div>
                    <!-- Login Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal End -->

@endsection
