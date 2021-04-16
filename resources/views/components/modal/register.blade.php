<!-- Sign Up Modal -->
<div id="signup-modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-body py-4 px-0">
                <button type="button" class="close mr-4 mb-5" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span> </button>
                <!-- Sign Up Form-->
                <div class="row">
                    <div class="col-11 col-md-10 mx-auto">
                        <ul class="nav nav-tabs nav-justified mb-4" role="tablist">
                            <li class="nav-item"> <a class="nav-link text-5 line-height-3" href="" data-toggle="modal"
                                    data-target="#login-modal" data-dismiss="modal">Log In</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link text-5 line-height-3 active">Sign Up</a> </li>
                        </ul>
                        <p class="text-4 font-weight-300 text-muted text-center mb-4">Looks like you're new here!
                        </p>
                        <form id="signupForm" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control border-2" id="fullName" required
                                    placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-2" id="emailAddress" required
                                    placeholder="Email Id">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control border-2" id="loginPassword" required
                                    placeholder="Password">
                            </div>
                            <div class="form-group my-4">
                                <div class="form-check text-2 custom-control custom-checkbox">
                                    <input id="agree" name="agree" class="custom-control-input" type="checkbox">
                                    <label class="custom-control-label" for="agree">I agree to the <a href="#">Terms</a>
                                        and <a href="#">Privacy Policy</a>.</label>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block my-4" type="submit">Sign Up</button>
                        </form>
                        <div class="d-flex align-items-center my-3">
                            <hr class="flex-grow-1">
                            <span class="mx-2 text-2 text-muted">Or Sign Up with Social Profile</span>
                            <hr class="flex-grow-1">
                        </div>
                        <div class="d-flex  flex-column align-items-center mb-3">
                            <ul class="social-icons social-icons-colored social-icons-circle">
                                <li class="social-icons-facebook"><a href="#" data-toggle="tooltip"
                                        data-original-title="Sign Up with Facebook"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="social-icons-twitter"><a href="#" data-toggle="tooltip"
                                        data-original-title="Sign Up with Twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="social-icons-google"><a href="#" data-toggle="tooltip"
                                        data-original-title="Sign Up with Google"><i class="fab fa-google"></i></a>
                                </li>
                                <li class="social-icons-linkedin"><a href="#" data-toggle="tooltip"
                                        data-original-title="Sign Up with Linkedin"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <p class="text-2 text-center mb-0">Already have an account? <a class="btn-link" href=""
                                data-toggle="modal" data-target="#login-modal" data-dismiss="modal">Log In</a></p>
                    </div>
                </div>
                <!-- Sign Up Form End -->
            </div>
        </div>
    </div>
</div>
<!-- Sign Up Modal End -->
