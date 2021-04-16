    <!-- Login Modal -->
    <div id="login-modal" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body py-4 px-0">
                    <button type="button" class="close mr-4 mb-5" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">&times;</span> </button>
                    <!-- Login Form -->
                    <div class="row">
                        <div class="col-11 col-md-10 mx-auto">
                            <ul class="nav nav-tabs nav-justified mb-4" role="tablist">
                                <li class="nav-item"> <a class="nav-link text-5 line-height-3 active">Login</a> </li>
                                <li class="nav-item"> <a class="nav-link text-5 line-height-3" href=""
                                        data-toggle="modal" data-target="#signup-modal" data-dismiss="modal">Sign Up</a>
                                </li>
                            </ul>
                            <p class="text-4 font-weight-300 text-muted text-center mb-4">We are glad to see you again!
                            </p>
                            <form id="loginForm" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="emailAddress" required
                                        placeholder="Mobile or Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="loginPassword" required
                                        placeholder="Password">
                                </div>
                                <div class="row my-4">
                                    <div class="col">
                                        <div class="form-check text-2 custom-control custom-checkbox">
                                            <input id="remember-me" name="remember" class="custom-control-input"
                                                type="checkbox">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col text-2 text-right"><a class="btn-link" href="" data-toggle="modal"
                                            data-target="#forgot-password-modal" data-dismiss="modal">Forgot Password
                                            ?</a></div>
                                </div>
                                <button class="btn btn-primary btn-block my-4" type="submit">Login</button>
                            </form>
                            <div class="d-flex align-items-center my-3">
                                <hr class="flex-grow-1">
                                <span class="mx-2 text-2 text-muted">Or Login with Social Profile</span>
                                <hr class="flex-grow-1">
                            </div>
                            <div class="d-flex  flex-column align-items-center mb-3">
                                <ul class="social-icons social-icons-colored social-icons-circle">
                                    <li class="social-icons-facebook"><a href="#" data-toggle="tooltip"
                                            data-original-title="Log In with Facebook"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-icons-twitter"><a href="#" data-toggle="tooltip"
                                            data-original-title="Log In with Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="social-icons-google"><a href="#" data-toggle="tooltip"
                                            data-original-title="Log In with Google"><i class="fab fa-google"></i></a>
                                    </li>
                                    <li class="social-icons-linkedin"><a href="#" data-toggle="tooltip"
                                            data-original-title="Log In with Linkedin"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <p class="text-2 text-center mb-0">New to Quickai? <a class="btn-link" href=""
                                    data-toggle="modal" data-target="#signup-modal" data-dismiss="modal">Sign Up</a></p>
                        </div>
                    </div>
                    <!-- Login Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal End -->