<!-- OTP Modal -->
<div id="otp-modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-body py-4 px-0">
                <button type="button" class="close  mr-4 mb-5" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span> </button>
                <!-- OTP Form -->
                <div class="row">
                    <div class="col-11 col-md-10 mx-auto">
                        <h3 class="text-center mt-3 mb-4">Two-Step Verification</h3>
                        <p class="text-center"><img class="img-fluid"
                                src="{{ asset('frontend/images/otp-icon.png') }}" alt="verification">
                        </p>
                        <p class="text-muted text-3 text-center">Please enter the OTP (one time password) to verify
                            your account. A Code has been sent to <span id="resetContact" class="text-dark text-4">
                            </span> <a class="btn-link" href="" data-toggle="modal" data-target="#forgot-password-modal"
                                data-dismiss="modal"> Change
                            </a>
                        </p>
                        <form id="otp-screen" class="form-border" method="post">
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="text" class="form-control border-2 text-center text-6 px-0 py-2"
                                        maxlength="1" required autocomplete="off">
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control border-2 text-center text-6 px-0 py-2"
                                        maxlength="1" required autocomplete="off">
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control border-2 text-center text-6 px-0 py-2"
                                        maxlength="1" required autocomplete="off">
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control border-2 text-center text-6 px-0 py-2"
                                        maxlength="1" required autocomplete="off">
                                </div>
                            </div>
                            <button id="otpVarify" class="btn btn-primary btn-block shadow-none my-4"
                                type="submit">Verify</button>
                        </form>
                        <p class="text-2 text-center">Not received your code? <a class="btn-link" href="#"
                                data-toggle="modal" data-target="#forgot-password-modal" data-dismiss="modal">Resend
                                code</a></p>
                    </div>
                </div>
                <!-- OTP Form End -->
            </div>
        </div>
    </div>
</div>

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#otpVarify').click(function() {
                alert('ok');
            });
        });

    </script>
@endpush
<!-- OTP Modal End -->
