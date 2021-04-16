   <!-- Forgot Password Modal -->
    <div id="forgot-password-modal" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body py-4 px-0">
                    <button type="button" class="close  mr-4 mb-5" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">&times;</span> </button>
                    <!-- Forgot Password Form -->
                    <div class="row">
                        <div class="col-11 col-md-10 mx-auto">
                            <h3 class="text-center mt-3 mb-4">Forgot your password?</h3>
                            <p class="text-center text-3 text-muted">Enter your Email or Mobile and we’ll help you reset
                                your password.</p>
                            <form id="forgotForm" class="form-border" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control border-2" id="emailAddress" required
                                        placeholder="Enter Email or Mobile Number">
                                </div>
                                <button class="btn btn-primary btn-block my-4" type="submit">Continue</button>
                            </form>
                            <p class="text-center mb-0"><a class="btn-link" href="" data-toggle="modal"
                                    data-target="#login-modal" data-dismiss="modal">Return to Log In</a> <span
                                    class="text-muted mx-3">|</span> <a class="btn-link" href="" data-toggle="modal"
                                    data-target="#otp-modal" data-dismiss="modal">Request OTP</a></p>
                        </div>
                    </div>
                    <!-- Forgot Password Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Forgot Password Modal End -->
