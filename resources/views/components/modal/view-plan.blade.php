 <!-- Modal Dialog - View Plans -->
 <div id="view-plans" class="modal fade" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Browse Plans</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                         aria-hidden="true">×</span> </button>
             </div>
             <div class="modal-body">
                 <form class="form-row mb-4 mb-sm-2" method="post">
                     <div class="col-12 col-sm-6 col-lg-4">
                         <div class="form-group">
                             <select class="custom-select" required="">
                                 <option value="">Select Your Operator</option>
                                 <option>Grameenphone</option>
                                 <option>Banglalink</option>
                                 <option>Airtel</option>
                                 <option>Robi</option>
                                 <option>Teletalk</option>
                             </select>
                         </div>
                     </div>
                     <div class="col-12 col-sm-6 col-lg-4">
                         <div class="form-group">
                             <select class="custom-select" required="">
                                 <option value="">All Plans</option>
                                 <option>Talktime</option>
                                 <option>SMS</option>
                                 <option>Data</option>
                             </select>
                         </div>
                     </div>
                     <div class="col-12 col-sm-6 col-lg-3">
                         <button class="btn btn-primary btn-block" type="submit">View Plans</button>
                     </div>
                 </form>
                 <div class="plans" id="plans">

                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Modal Dialog - View Plans end -->

 @push('script')
     <script type="text/javascript">
         $(document).ready(function() {

             $.ajax({
                 url: "{{ route('packages') }}",
                 type: "GET",
                 success: packageArrange
             }).fail(function(res) {
                 console.log(res.responseJSON.message);
             });

         });


         function packageArrange(packages, status) {
             let plans = '';
             packages.forEach((package) => {

                 let plan = `<hr class="my-4"><div class="row align-items-center">
                            <div class="col-2 text-3 text-center">${package.operator}
                              <span class="text-1 text-muted d-block">Operator</span>
                                   </div>
                                   <div class="col-2  text-3 text-center">${package.package}
                                       <span class="text-1 text-muted d-block">Package</span>
                                   </div>
                                   <div class="col-2 text-3 text-center">${package.validity}
                                       <span class="text-1 text-muted d-block">Validity</span>
                                   </div>
                                   <div class="col-2  text-3 text-center">${package.price}
                                       <span class="text-1 text-muted d-block">Price</span>
                                   </div>
                                   <div class="col-2 text-3 text-center">${package.dial_code}
                                       <span class="text-1 text-muted d-block">Dial Code</span>
                                   </div>
                                   <div class="col-2  text-center px-0 mx-0">
                                       <button class="btn btn-primary btn-sm"
                                        onclick="selectPackage('${package.operator}', ${package.price})">
                                        Recharge
                                        </button>
                                   </div>
                               </div>`;
                 plans = plans + plan;
             });

             $('#plans').html(plans);
         }



         function selectPackage(operator, price) {

             switch (operator) {

                 case 'Airtel':
                     option = 'AT';
                     break;
                 case 'ROBI':
                     option = 'RB';
                     break;
                 case 'GP':
                     option = 'GP';
                     break;
                 case 'Banglalink':
                     option = 'BL';
                     break;
                 case 'Teletalk':
                     option = 'TT';
                     break;
                 case 'Skitto':
                     option = 'GP ST';
                     break;
                 default:
                     option = '';
             }

             $('#operator').val(option);
             $('#amount').val(price);
             $('#view-plans').modal('hide');
         }

     </script>
 @endpush
