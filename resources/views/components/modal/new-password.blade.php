<div id="new-password-modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-body py-4 px-0">
                <button type="button" class="close  mr-4 mb-5" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span> </button>
                <!-- Forgot Password Form -->
                <div class="row">
                    <div class="col-11 col-md-10 mx-auto">
                        <h3 class="text-center mt-3 mb-4">New password</h3>

                        <form id="newPasswordForm" class="form-border">
                            <div class="form-group">

                                <input id="newPasswordOtp" type="hidden" name="otp" value="" />
                                <input id="otpTokenFinal" type="hidden" name="otpToken" value="" />

                                <input id="password" type="password" class="form-control border-2 my-2" name="password"
                                    required placeholder="Enter new password" autocomplete="new-password">

                                <input id="password_confirmation" type="password" class="form-control border-2 my-4"
                                    name="password_confirmation" required placeholder="Confirm password"
                                    autocomplete="new-password">

                                <p id="changePasswordWarning" class="text-warning"></p>
                            </div>
                            <button id="changePassword" class="btn btn-primary btn-block my-5" type="button">
                                Change</button>
                        </form>
                    </div>
                </div>
                <!-- Forgot Password Form End -->
            </div>
        </div>
    </div>
</div>

<form id="loginFormAfterChangePassword" method="post" action="{{ route('login') }}" class="d-none">
    @csrf
    <input id="emailForLoginAfterChangePassword" type="email" class="form-control" name="email" />
    <input id="passwordForLoginAfterChangePassword" type="password" class="form-control" name="password" />
</form>

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#changePassword').click(function(e) {
                e.preventDefault();

                otp = $('#newPasswordOtp').val();
                otpToken = $('#otpTokenFinal').val();
                password = $('#password').val();
                password_confirmation = $('#password_confirmation').val();

                $.ajax({
                    url: "{{ route('changePassword') }}",
                    type: "POST",
                    data: JSON.stringify({
                        otp: otp,
                        otpToken: otpToken,
                        password: password,
                        password_confirmation: password_confirmation
                    }),
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function(data, status) {

                        $('#emailForLoginAfterChangePassword').val( data.message);
                        $('#passwordForLoginAfterChangePassword').val( password);

                        $('#loginFormAfterChangePassword').submit();

                    }
                }).fail(function(res) {

                    // if (res.responseJSON.errors.otp) || res.responseJSON.errors.otpToken) {
                    //     $('#changePasswordWarning').text(
                    //         "You must follow the sequences of reset password.");
                    // } else {
                        $('#changePasswordWarning').text(res.responseJSON.message);
                    // }
                });

            });

        });

    </script>
@endpush
