@extends('frontend.layouts.master')
@section('title') Login @endsection



@section('content')
@include('frontend.includes.header')
    <div class="bg-img">
         <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg1">
         <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg2">
         <img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png')}}" alt="img" class="bgimg3">
      </div>
      <div class="section-heading aos aos-init aos-animate text-center mt-5 mb-0" data-aos="fade-up">
         <h2>Login to Your <span>Account</span> </h2>
         <p class="d-none">We'll send a confirmation code to your Phone.</p>
         <h6 class="text-dark">Login with <a href="{{ url('customer-email-login') }}" class="text-primary2">Email</a></h6>
		 <h6>Sign in with <a href="{{ url('login') }}" class="text-danger">Phone Number</a></h6>
      </div>

      <div class="content pt-3 pb-5 mb-3">
         <div class="container">
            <!-- Contact Details -->
            <!-- Get In Touch -->
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
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Phone Number</label>
                                    <input type="number" class="form-control " id="phone" name="phone"
                                       placeholder="(+91) 9876543210" autocomplete="off" data-intl-tel-input-id="0">
                                 </div>
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Password</label>
                                    <div class="pass-group">
                                       <input type="password" class="form-control w-100" placeholder="*************" id="myInput">
                                       <span class="toggle-password feather-eye" onclick="myFunction()">
                                          <i class="fa fab fas fa-eye"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="char-length text-start">
                                          <p class="fs-13">Must be 6 Characters at Least</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="text-md-end">
                                          <a class="forgot-link text-primary2 fw-bold border-bottom border-primary fs-13"
                                             href="password-recovery.php">Forgot password?
                                          </a>
                                       </div>
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
                              <a class="btn btn-primary w-100 mx-auto text-center text-white d-block border-0 login-btn"
                                 href="engineer-dashboard.php">Login
                              </a>
                              <hr>
                              <p class="no-acc fs-16 mb-0">Don't have an account ? <a href="choose-signup.php"
                                 class="text-primary2 fw-bold">Register</a>
                              </p>
                           </form>
                        </div>
                     </div>
                     <!-- Engineer Tabs content End-->

                     <!-- Customer Tabs content start-->
                     <div class="tab-content" id="ex2-content">
                        <div class="tab-pane fade show active" id="ex1-tabs-2" role="tabpanel"
                           aria-labelledby="ex1-tab-2">
                           <form id="customer-email-login" action="#">
						   @csrf
						   <div style="display:none;" id="show-form-error" class="alert alert-danger">
									<ul>
										<div class="errorMsgntainer"></div>
									</ul>
								</div>
                              <div class="log-form pt-3">
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Email Id</label>
                                    <input type="email" class="form-control " id="username" name="email"
                                       placeholder="Enter Email Id" autocomplete="off" data-intl-tel-input-id="0">
                                 </div>
                                 <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Password</label>
                                    <div class="pass-group">
                                       <input type="password" name="password" class="form-control w-100" placeholder="*************" id="myInput1">
                                       <span class="toggle-password feather-eye" onclick="myFunction1()">
                                          <i class="fa fab fas fa-eye"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="char-length text-start">
                                          <p class="fs-13">Must be 6 Characters at Least</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="text-md-end">
                                          <a class="forgot-link text-primary2 fw-bold border-bottom border-primary fs-13"
                                             href="javascript:void(0)">Forgot password?
                                          </a>
                                       </div>
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
                              <button id="customer-email-login" type="button" class="btn btn-primary w-100 mx-auto text-center text-white d-block border-0 customer-email-login login-btn"
                                >Login
                              </button>
                              <hr>
                              <p class="no-acc fs-16 mb-0">Don't have an account ? <a href="{{ url('register') }}"
                                 class="text-primary2 fw-bold">Register</a>
                              </p>
                           </form>
                        </div>
                     </div>
                     <!-- Customer Tabs content End-->
                  </div>
               </div>
            </div>
            <!-- /Get In Touch -->
         </div>
      </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">

$(document).on('click','.customer-email-login',function(e) {
	// alert('button clicked!');
	e.preventDefault();
	
  var clk_btn = $("#customer-email-login");
      clk_btn.prop('disabled',true);
	
	// var formData = new FormData(this); 
	var formData = new FormData(document.getElementById("customer-email-login"));
	console.log(formData);
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
  $.ajax({
    type: "POST",
    url: "{{ route('email.login') }}",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON", 
    success: function(data) {
			console.log('status '+data.status);
			if(data.status==true){
				toastr.success('Login Successfull.');
				setTimeout(function(){ 
				window.location = "{{ url('customer/customer-dashboard') }}" },1000);
			}else{
				toastr.error('Login Failed.');
			}
		 
      
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


</script>

@endsection
