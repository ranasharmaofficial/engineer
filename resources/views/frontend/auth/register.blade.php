@extends('frontend.layouts.master')
@section('title') Register @endsection

@section('content')
@include('frontend.includes.header')
 <div class="bg-img">
         <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg1">
         <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg2">
         <img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png')}}" alt="img" class="bgimg3">
      </div>
      <!-- /Breadcrumb -->
      <div class="section-heading aos aos-init aos-animate text-center mt-5 mb-0" data-aos="fade-up">
         <h2>Sign <span>Up</span> </h2>
         <p>Please Select Your Sign up option.</p>
      </div>
      <div class="content pt-3 pb-5 mb-3">
         <div class="container">
            <!-- /Switch Pannel Section Start -->
            <!-- <div class="row">
               <div class="col-md-5 mx-auto text-center">
                  <div class="contact-queries shadow-none text-center">

                     <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                           aria-labelledby="ex1-tab-1">
                           <div class="row">

                              <div class="col-md-6 d-flex">
                                 <div class="choose-signup flex-fill border p-3 rounded-3">
                                    <h6>Engineer</h6>
                                    <div class="choose-img">
                                       <img src="assets/img/provider.png" alt="">
                                    </div>
                                    <a href="engineer-signup.php"
                                       class="btn btn-secondary d-block text-center w-75 mx-auto mt-3 text-white border-none border-0">Sign
                                       Up<i class="feather-arrow-right-circle ms-1"></i></a>
                                 </div>
                              </div>

                              <div class="col-md-6 d-flex">
                                 <div class="choose-signup flex-fill mb-0 border p-3 rounded-3">
                                    <h6>Customer</h6>
                                    <div class="choose-img">
                                       <img src="assets/img/user.png" alt="">
                                    </div>
                                    <a href="customer-signup.php"
                                       class="btn btn-secondary d-block text-center w-75 mt-3 mx-auto text-white border-none border-0">Sign
                                       Up<i class="feather-arrow-right-circle ms-1"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div> -->
            <!-- /Switch Panner Section End -->

            <div class="row">
               <div class="col-md-5 mx-auto text-center">
                  <ul class="nav bg-light nav-tabs mb0 align-items-center justify-content-center" id="ex1"
                     role="tablist">
                     <li class="nav-item mx-1" role="presentation">
                        <a class="nav-link px-1" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1" role="tab"
                           aria-controls="ex1-tabs-1" aria-selected="true">Engineer
                        </a>
                     </li>
                     <li class="nav-item mx-1" role="presentation">
                        <a class="nav-link active px-1" id="ex1-tab-2" data-bs-toggle="tab" href="#ex1-tabs-2"
                           role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Customer
                        </a>
                     </li>
                  </ul>
                  <div class="contact-queries1 text-center">
                     <!-- Tabs navs -->
                     <!-- Engineer Tabs content start-->
                     <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show" id="ex1-tabs-1" role="tabpanel"
                           aria-labelledby="ex1-tab-1">
                           <form action="#">
                              <div class="log-form pt-3">
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">First Name</label>
                                    <input type="text" class="form-control " id="name" name="name"
                                       placeholder="Enter First Name" autocomplete="off" data-intl-tel-input-id="0">
                                 </div>
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Last Name</label>
                                    <input type="text" class="form-control " id="name" name="name"
                                       placeholder="Enter Last Name" autocomplete="off" data-intl-tel-input-id="0">
                                 </div>
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Email Id</label>
                                    <div class="input-group">
                                       <input type="email" class="form-control" id="emails" name="email"
                                          placeholder="admin@gmail.com" autocomplete="off" data-intl-tel-input-id="0">
                                       <button class="btn btn-primary rounded-pill position-absolute end-0 me-1" type="button" id="button-addon2" style="width:100px; margin-top:0.5%;" onclick=sendOtp()>Send OTP</button>
                                    </div>
                                 </div>
                                 <div class="form-group" id="emailotp" style="display:none;">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Email OTP</label>
                                    <div class="input-group">
                                       <input type="text" class="form-control" id="email-otp" placeholder="Type Your Mobile OTP Here">
                                       <button class="btn btn-primary rounded-pill position-absolute end-0 me-1" type="button" id="button-addon2" style="width:100px; margin-top:0.5%;">Submit OTP</button>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Phone Number</label>
                                    <div class="input-group position-relative">
                                       <input type="number" class="form-control " id="phone" name="phone"
                                          placeholder="(+91) 9876543210" autocomplete="off" data-intl-tel-input-id="0">
                                       <button class="btn btn-primary rounded-pill position-absolute end-0 me-1" type="button" onclick="mobOtp()" id="button-addon2" style="width:100px; margin-top:0.5%;">Send OTP</button>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label class="col-form-label text-start d-block fs-14 fw-bold">Password</label>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="char-length text-start">
                                             <p class="fs-13">Must be 6 Characters at Least</p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="pass-group">
                                       <input type="password" class="form-control  w-100" placeholder="*************" id="myInput">
                                       <span class="toggle-password feather-eye " onclick="myFunction()"><i class="fa fab fas fa-eye"></i></span>
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <div class="col-6">
                                       <label class="custom_check fs-14 text-start d-flex align-items-center justify-content-start">
                                          <input type="checkbox" name="rememberme" class="rememberme me-2">
                                          <span class="checkmark"></span>Remember Me
                                       </label>
                                    </div>
                                    <div class="col-6 text-end">
                                       <label class="custom_check text-end fs-14 d-flex align-items-center justify-content-end">
                                          <input type="checkbox" name="loginotp" class="loginotp me-2">
                                          <span class="checkmark"></span>Login with OTP
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <button
                                 class="btn btn-primary w-100 mx-auto text-center text-white d-block border-0 login-btn bt-hover"
                                 type="button">Submit</button>
                              <hr>
                              <p class="no-acc mb-0">Already have an account
                                 <a href="login.php" class="text-primary2 fw-bold">Sign in</a>
                              </p>
                           </form>
                        </div>
                     </div>
                     <!-- Engineer Tabs content End-->

                     <!-- Customer Tabs content start-->
                     <div class="tab-content" id="ex2-content">
                        <div class="tab-pane fade show active" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                           <form id="customer-registration" method="post"  autocomplete="off">
                            @csrf
							
                            <div class="col-md-12">
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								<div style="display:none;" id="show-form-error" class="alert alert-danger">
									<ul>
										<div class="errorMsgntainer"></div>
									</ul>
								</div>
							
							 
							
                                <div class="log-form pt-3">
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Company Name</label>
                                    <input type="text" class="form-control " id="compName" name="company_name"
                                       placeholder="Enter Your Company Name" autocomplete="off" data-intl-tel-input-id="0">
									   @if ($errors->has('company_name'))
										<span class="text-danger">{{ $errors->first('company_name') }}</span>
									   @endif
                                 </div>
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">First Name</label>
                                    <input type="text" class="form-control " id="name" name="first_name"
                                       placeholder="Enter First Name" autocomplete="off" data-intl-tel-input-id="0">
									    @if ($errors->has('first_name'))
                                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                  @endif
                                 </div>
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Last Name</label>
                                    <input type="text" class="form-control " id="name" name="last_name"
                                       placeholder="Enter Last Name" autocomplete="off" data-intl-tel-input-id="0">
									   @if ($errors->has('last_name'))
                                      <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                  @endif
                                 </div>
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">GST Number</label>
                                    <input type="text" class="form-control" id="gstNumber" name="gst_number"
                                       placeholder="Enter Your GST Number" autocomplete="off" data-intl-tel-input-id="0" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);">
									   <span class="form-text text-danger" id="gst_number_error"></span>
                                 </div>

								<div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Email Id</label>
                                    <div class="input-group">
                                       <input type="email" class="form-control" id="email" name="email"
                                          placeholder="Your Email" autocomplete="off" data-intl-tel-input-id="0">
                                       <button onclick="getEmailOTP()" class="btn btn-primary rounded-pill position-absolute end-0 me-1" type="button" id="send-email-otp" style="width:100px; margin-top:0.5%;" >Send OTP</button>
									    @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                                    </div>
                                 </div>

								<div class="form-group col-md-12" id="emailtakent" style="display: none;">
									<span class="form-text text-danger" id="emailtaken"></span>
								</div>


                                <div class="form-group" id="show-email-otp-input" style="display:none;">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Email OTP</label>
                                    <div class="input-group">
                                       <input type="text" class="form-control" name="email_otp" id="email_otp" placeholder="Type Your Email OTP Here">
                                       <button onclick="checkEmailOtp()" class="btn btn-primary rounded-pill position-absolute end-0 me-1" type="button" id="email-otp-check-button" style="width:100px; margin-top:0.5%;">Submit OTP</button>
                                    </div>
                                </div>
                                {{--
                                 <div class="row" id="email-otp-time" style="display: none;">
                                    <div class="col-6">
                                        @if(Session::has('email_otp') && Session::has('email_otp_exp_time'))
                                            <p>Time Remaining <span id="emailtime"></span></p>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="bg-transparent border-0" onclick="resendEmailOTP()">Resend OTP</button>
                                    </div>
                                </div> --}}

								<div class="form-group col-md-12" id="email-otp-verify" style="display: none;">
									<span class="form-text text-success" id="email_otp_verify"></span>
									<span class="form-text text-danger" id="email_otp_verify_error"></span>
								</div>


                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Phone Number</label>
                                    <div class="input-group position-relative">
                                       <input type="number" class="form-control " id="mobile" name="mobile" placeholder="(+91) 9876543210" autocomplete="off" data-intl-tel-input-id="0">
                                       <button class="btn btn-primary rounded-pill position-absolute end-0 me-1" type="button" onclick="getMobileOTP()" id="send-mobile-otp" style="width:100px; margin-top:0.5%;">Send OTP</button>
                                    </div>
                                 </div>

								 <div class="form-group"  style="display: none;" id="show-mobile-otp-input">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Enter Mobile OTP</label>
                                    <div class="input-group">
                                       <input type="text" class="form-control" id="mobile_otp" name="mobile_otp"placeholder="Type Your Mobile OTP Here">
                                       <button class="btn btn-primary border-0 rounded-pill position-absolute end-0 me-1" onclick="checkMobileOtp()" type="button" id="mobile-otp-check-button" style="width:100px; margin-top:0.5%;">Submit OTP</button>
                                    </div>
                                 </div>

								  <div class="form-group col-md-12" id="mobile-otp-verify" style="display: none;">
									<span class="form-text text-success" id="mobile_otp_verify"></span>
									<span class="form-text text-danger" id="mobile_otp_verify_error"></span>
									</div>

								<div class="form-group col-md-12" id="mobiletakent" style="display: none;">
									<span class="form-text text-danger" id="mobtaken"></span>
								</div>

                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label class="col-form-label text-start d-block fs-14 fw-bold">Password</label>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="char-length text-start">
                                             <p class="fs-13">Must be 6 Characters at Least</p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="pass-group">
                                       <input type="password" name="password" class="form-control  w-100" placeholder="*************" id="myInput2">
                                       <span class="toggle-password feather-eye " onclick="myFunction2()"><i class="fa fab fas fa-eye"></i></span>
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <div class="col-6">
                                       <label class="custom_check fs-14 text-start d-flex align-items-center justify-content-start">
                                          <input type="checkbox" name="rememberme" class="rememberme me-2">
                                          <span class="checkmark"></span>Remember Me
                                       </label>
                                    </div>
                                    <div class="col-6 text-end d-none">
                                       <label class="custom_check text-end fs-14 d-flex align-items-center justify-content-end">
                                          <input type="checkbox" name="loginotp" class="loginotp me-2">
                                          <span class="checkmark"></span>Login with OTP
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <button id="customer-save" disabled class="btn btn-primary w-100 mx-auto text-center text-white d-block border-0 login-btn customer-save"
                                 type="button">Register</button>
                              <hr>
                              <p class="no-acc mb-0">Already have an account
                                 <a href="{{ url('login') }}" class="text-danger fw-bold">Sign in</a>
                              </p>
                           </form>
                        </div>
                     </div>
                     <!-- Customer Tabs content End-->
                  </div>
               </div>
            </div>

         </div>
      </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	 <script type="text/javascript">

$(document).on('click','.customer-save',function(e) {
	// alert('button clicked!');
	e.preventDefault();
	
  var clk_btn = $("#customer-save");
      clk_btn.prop('disabled',true);
	
	// var formData = new FormData(this); 
	var formData = new FormData(document.getElementById("customer-registration"));
	console.log(formData);
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
  $.ajax({
    type: "POST",
    url: "{{ route('saveCustomerRegistration') }}",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON", 
    success: function(data) { 
		 toastr.success('Registration Successfull.');
		setTimeout(function(){ 
		window.location = "{{ url('login') }}" },1000);
      
    },error:function(err){
		
		document.getElementById('show-form-error').style="display: block";
		let error = err.responseJSON;
		console.log(error);
		$.each(error.errors, function (index, value) {
			$('.errorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
		});
	}
	
  });
});


 $('#gstNumber').on('change', function () {
            var statecode = $(this).val().substring(0, 2);
            var pancarno = $(this).val().substring(2, 12);
            var entityNumber = $(this).val().substring(12, 13);
            var defaultZvalue = $(this).val().substring(13, 14);
            var checksumdigit = $(this).val().substring(14, 15);
            if ($(this).val().length != 15) {
                // alert('GST Number is invalid');
				document.getElementById('gst_number_error').innerHTML='GST Number is invalid';
                $(this).focus();
                return false;
            }
            if (pancarno.length != 10) {
                // alert('GST number is invalid ');
				document.getElementById('gst_number_error').innerHTML='GST number is invalid';
                $(this).focus();
                return false;
            }
            if (defaultZvalue !== 'Z') {
                // alert('GST Number is invalid Z not in Entered Gst Number');
				document.getElementById('gst_number_error').innerHTML='GST Number is invalid Z not Entered in Gst Number';
                $(this).focus();
            }

            if ($.isNumeric(statecode)) {
                $('#gst_state_code').val(statecode).trigger('change');
            } else {
                // alert('Please Enter Valid State Code');
				document.getElementById('gst_number_error').innerHTML='Please Enter Valid State Code';
                $(this).focus();
            }

            if ($.isNumeric(checksumdigit)) {
                return true;
				document.getElementById('gst_number_error').style="display: none";
            } else {
                // alert('GST number is invalid last character must be digit');
				document.getElementById('gst_number_error').innerHTML='GST number is invalid last character must be digit';
                $(this).focus();

            }

        });
		
		
		
	 
	
	
	 function getEmailOTP(){
        let email = document.getElementById('email').value;
        $.ajax({
            url: '{{ url('get-email-otp' )}}',
            method: 'POST',
            data: 'email='+email+'&_token={{csrf_token()}}',
            success:function(response){
                console.log(response);
                document.getElementById('send-email-otp').style="display: none";
                // document.getElementById('email-otp-time').style="display: block";
                // document.getElementById('otpget').style="display: none";
                // document.getElementById('otpinput').style="display: block";
                // document.getElementById('registerButton').style="display: block";
                // document.getElementById('password').style="display: block";
                // document.getElementById('cpassword').style="display: block";
                document.getElementById('emailtakent').style="display: none";
				document.getElementById('show-email-otp-input').style="display: block";
            },
            error:function(errlog){
                let mss = JSON.parse(errlog.responseText);
                console.log(mss.errors.email[0]);
                document.getElementById('show-email-otp-input').style="display: none";
                // document.getElementById('otpinput').style="display: none";
                // document.getElementById('registerButton').style="display: none";
                // document.getElementById('password').style="display: none";
                // document.getElementById('cpassword').style="display: none";
                document.getElementById('emailtakent').style="display: block";
                document.getElementById('emailtaken').innerHTML = mss.errors.email[0];
            }
        });
    }

    function resendEmailOTP(){
        let email = document.getElementById('email').value;
        $.ajax({
            url: '{{ url('resend-email-otp' )}}',
            method: 'POST',
            data: 'email='+email+'&_token={{csrf_token()}}',
            success:function(response){
                console.log(response);
                document.getElementById('send-email-otp').style="display: none";
                // document.getElementById('email-otp-time').style="display: block";
                // document.getElementById('otpget').style="display: none";
                // document.getElementById('otpinput').style="display: block";
                // document.getElementById('registerButton').style="display: block";
                // document.getElementById('password').style="display: block";
                // document.getElementById('cpassword').style="display: block";
                document.getElementById('emailtakent').style="display: none";
				document.getElementById('show-email-otp-input').style="display: block";
            },
            error:function(errlog){
                let mss = JSON.parse(errlog.responseText);
                console.log(mss.errors.email[0]);
                document.getElementById('show-email-otp-input').style="display: none";
                // document.getElementById('otpinput').style="display: none";
                // document.getElementById('registerButton').style="display: none";
                // document.getElementById('password').style="display: none";
                // document.getElementById('cpassword').style="display: none";
                document.getElementById('emailtakent').style="display: block";
                document.getElementById('emailtaken').innerHTML = mss.errors.email[0];
            }
        });
    }

	function checkEmailOtp(){
		let email_otp = document.getElementById('email_otp').value;
        $.ajax({
            url: '{{ url('check-email-otp' )}}',
            method: 'POST',
            data: 'email_otp='+email_otp+'&_token={{csrf_token()}}',
            success:function(response){
                console.log('message '+response.message);
                if(response.status=='success')
				{
					document.getElementById('email-otp-verify').style="display: block";
					document.getElementById('email_otp_verify').innerHTML=response.message;
					document.getElementById('email_otp_verify_error').style="display: none";
					document.getElementById('email-otp-check-button').style="display: none";
					document.getElementById('send-email-otp').style="display: none";
				}else{
					document.getElementById('email-otp-verify').style="display: block";
					document.getElementById('email_otp_verify_error').innerHTML=response.message;
				}
            },
            error:function(errlog){

			}
        });
	}

	function getMobileOTP(){
        let mob = document.getElementById('mobile').value;
        $.ajax({
            url: '{{ url('get-mobile-otp' )}}',
            method: 'POST',
            data: 'mobile='+mob+'&_token={{csrf_token()}}',
            success:function(response){
                // console.log(response);
                document.getElementById('mobiletakent').style="display: none";
				document.getElementById('show-mobile-otp-input').style="display: block";
            },
            error:function(errlog){
                let mss = JSON.parse(errlog.responseText);
                console.log(mss.errors.mobile[0]);
                document.getElementById('show-mobile-otp-input').style="display: none";
                document.getElementById('mobiletakent').style="display: block";
                document.getElementById('mobtaken').innerHTML = mss.errors.mobile[0];
            }
        });
    }

	function checkMobileOtp(){
		let mobile_otp = document.getElementById('mobile_otp').value;
		let mobile_number = document.getElementById('mobile').value;
        $.ajax({
            url: '{{ url('check-mobile-otp' )}}',
            method: 'POST',
            data: 'mobile_number='+mobile_number+'&mobile_otp='+mobile_otp+'&_token={{csrf_token()}}',
            success:function(response){
                console.log('message '+response.message);
                if(response.status=='success')
				{
					document.getElementById('mobile-otp-verify').style="display: block";
					document.getElementById('mobile_otp_verify').innerHTML=response.message;
					document.getElementById('mobile_otp_verify_error').style="display: none";
					document.getElementById('mobile-otp-check-button').style="display: none";
					document.getElementById('send-mobile-otp').style="display: none";
					// document.getElementById('customer-save').removeAttr('disabled');
					var save_btn = $("#customer-save");
					save_btn.prop('disabled',false);
				}else{
					document.getElementById('mobile-otp-verify').style="display: block";
					document.getElementById('mobile_otp_verify_error').innerHTML=response.message;
					document.getElementById('customer-save').removeAttr('disabled');
					// $("#customer-save").removeAttr('disabled');
				}
            },
            error:function(errlog){

			}
        });
	}


      function myFunction() {
         var x = document.getElementById("myInput");
         if (x.type === "password") {
            x.type = "text";
         } else {
            x.type = "password";
         }
      }
      function sendOtp(){
         let sendOtp = document.getElementById('emailotp');
         if(sendOtp.style.display=="none"){
            sendOtp.style.display="block";
         }
      }

      function mobOtp(){
         let mobOtp = document.querySelector("#mobOtp");
         if(mobOtp.style.display=="none"){
            mobOtp.style.display="block";
         }
      }

      function myFunction2() {
         var x = document.getElementById("myInput2");
         if (x.type === "password") {
            x.type = "text";
         } else {
            x.type = "password";
         }
      }
        function sendOtp2(){
            let sendOtp2 = document.getElementById('emailotp2');
            if(sendOtp2.style.display=="none"){
                sendOtp2.style.display="block";
            }
        }
      // function mobOtp2(){
         // let mobOtp2 = document.querySelector("#mobOtp2");
         // if(mobOtp2.style.display=="none"){
            // mobOtp2.style.display="block";
         // }
      // }
   </script>
{{-- @if (Session::has('email_otp') && Session::has('email_otp_exp_time'))
   <script>
	// alert('rana');
    console.log("Session not working");
        var emailexptime = new Date("{{Session::get('email_otp_exp_time')}}").getTime();
        console.log(emailexptime);
        var countdowninterval = setInterval( function(){
            var emailtimenow = new Date().getTime();
            var distance = emailexptime - emailtimenow;
            console.log(distance);
            if (distance <= 0) {
                clearInterval(countdowninterval);
                console.log("Email OTP Time Expired. dddd");
            }else{
                var minutes = Math.floor((distance % (1000*60*60))/(1000*60));
                var seconds = Math.floor((distance % (1000*60))/1000);
                console.log(minutes + "minutes");
                console.log(seconds + "seconds");
                document.getElementById("emailtime").innerHTML= minutes + "m" + seconds + "s";
            }
        }, 1000);
    </script>
@endif --}}
@endsection
