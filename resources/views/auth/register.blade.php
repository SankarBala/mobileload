@extends('layouts.app')

@section('content')

    <!-- Sign Up Modal -->
    <div id="" class="">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body py-4 px-0">

                    <!-- Sign Up Form-->
                    <div class="row">
                        <div class="col-11 col-md-10 mx-auto">
                            <ul class="nav nav-tabs nav-justified mb-4" role="tablist">
                                <li class="nav-item"> <a class="nav-link text-5 line-height-3" href="{{ route('login') }}">Log In</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link text-5 line-height-3 active">Sign Up</a> </li>
                            </ul>
                            <p class="text-4 font-weight-300 text-muted text-center mb-4">Looks like you're new here!
                            </p>
                            <form id="signupForm" method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control border-2 @error('name') is-invalid @enderror"
                                        name="name" required placeholder="Your Name" value="{{ old('name') }}"
                                        autocomplete="name" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-2 @error('email') is-invalid @enderror"
                                        name="email" required placeholder="Email" value="{{ old('email') }}"
                                        autocomplete="email" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control border-2 @error('password') is-invalid @enderror"
                                        name="password" required placeholder="Password" autocomplete="new-password" />
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control border-2" name="password_confirmation"
                                        required placeholder="Confirm Password" autocomplete="new-password" />
                                </div>
                                <div class="form-group my-4">
                                    <div class="form-check text-2 custom-control custom-checkbox">
                                        <input id="agree" name="agreement" class="custom-control-input" type="checkbox"
                                            onclick="agreementCheck()" />
                                        <label class="custom-control-label" for="agree">I agree to the <a
                                                href="{{ route('fallback', 'terms') }}">Terms</a>
                                            and <a href="{{ route('privacyPolicy') }}">Privacy Policy</a>.</label>
                                    </div>
                                    @error('agreement')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button id="submitRegister" class="btn btn-primary btn-block my-4" type="submit"
                                    disabled>Sign Up</button>
                            </form>
                            <x-auth.social-auth />
                            <p class="text-2 text-center mb-0">Already have an account? <a class="btn-link"
                                    href="{{ route('login') }}">Log In</a></p>
                        </div>
                    </div>
                    <!-- Sign Up Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up Modal End -->

    @push('script')
        <script type="text/javascript">
            function agreementCheck() {
                let agree = document.getElementById("agree");
                let submitRegister = document.getElementById("submitRegister");

                if (agree.checked == true) {
                    submitRegister.disabled = false;
                } else {
                    submitRegister.disabled = true;
                }
            }

        </script>
    @endpush

@endsection
