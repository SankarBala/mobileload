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
                                   <input type="text" class="form-control border-2 my-0" id="resetEmailOrPhone"
                                       name="emailOrPhone" required placeholder="Enter Email or Mobile Number">
                                   <p id="otpMessage" class="text-success"></p>
                               </div>
                               <button id="resetPassword" class="btn btn-primary btn-block my-4" type="submit">Send
                                   OTP</button>
                           </form>
                           <p class="text-center mb-0"><a class="btn-link" href="" data-toggle="modal"
                                   data-target="#otp-modal" data-dismiss="modal">Submit OTP</a></p>
                       </div>
                   </div>
                   <!-- Forgot Password Form End -->
               </div>
           </div>
       </div>
   </div>

   @push('script')
       <script type="text/javascript">
           $(document).ready(function() {
               //    $('#resetPassword').click(function() {
               $('#forgotForm').submit(function(e) {
                   e.preventDefault();
                   $.ajax({
                       url: "{{ route('otp.store') }}",
                       type: "POST",
                       data: JSON.stringify({
                           contact: $('#resetEmailOrPhone').val(),
                           csrf_token: "{{ csrf_token() }}"
                       }),
                       dataType: 'json',
                       contentType: 'application/json',
                       success: function(data, status) {
                           let wait = 60;

                           $('#otpMessage').html("OTP successfully sent to your contact");

                           $('#resetContact').html($('#resetEmailOrPhone').val());

                           $('#resetPassword').prop('disabled', true);

                           $('#forgot-password-modal').modal('hide');
                           $('#otp-modal').modal();

                           let repeat = setInterval(function() {
                               wait = wait - 1;
                               $('#resetPassword').text(wait);
                               if (wait < 1) {
                                   $('#resetPassword').text("Submit");
                                   $('#resetPassword').prop('disabled', false);
                                   clearInterval(repeat);
                               }
                           }, 1000);
                       }
                   }).fail(function(res) {
                       $('#otpMessage').html("The contact you entered is invalid.");
                   });

               });
           });

       </script>
   @endpush
   <!-- Forgot Password Modal End -->
