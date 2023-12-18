@extends('frontend.layouts.master')
@section('title') Change-Password  @endsection
@section('content')
@include('frontend.customer.partials.dash_header')


<div class="main-wrapper">

    <div class="bg-img">
        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg1">
        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg2">
        <img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png')}}" alt="img" class="bgimg3">
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <!-- Customer Menu -->
                <div class="col-md-4 col-lg-3 theiaStickySidebar">
                    @include('frontend.customer.partials.left-sidebar')
                </div>
                <!-- /Customer Menu -->

                <div class="col-md-8 col-lg-9">


                    <div class="section-heading aos aos-init aos-animate text-start mt-0 mb-0" data-aos="fade-up">
                        <h2>Change <span>Password</span> </h2>
                        <p>Please enter your current password to change your password</p>

                    </div>
                    <div class="contact-queries1 text-center">
                        <form action="#">
                            <div class="log-form pt-3">

                                <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Current
                                        Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control  w-100"
                                            placeholder="*************" id="myInput">
                                        <span class="toggle-password feather-eye" onclick="myFunction()"><i
                                                class="fa fab fas fa-eye"></i></span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">New
                                        Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control  w-100"
                                            placeholder="*************" id="myInput1">
                                        <span class="toggle-password feather-eye " onclick="myFunction1()"><i
                                                class="fa fab fas fa-eye"></i></span>

                                    </div>
                                </div>
                                <div class="password-strength" id="passwordStrength">
                                    <span id="poor"></span>
                                    <span id="weak"></span>
                                    <span id="strong"></span>
                                    <span id="heavy"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="char-length text-start mt-3">
                                            <p class="fs-13">Use 8 or more characters with a mix of letters, numbers
                                                & symbols.
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Confirm New
                                        Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control  w-100"
                                            placeholder="*************" id="myInput2">
                                        <span class="toggle-password feather-eye " onclick="myFunction2()"><i
                                                class="fa fab fas fa-eye"></i></span>

                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button
                                    class="btn btn-dark w-auto bg-dark  text-center text-white d-block border-0 mx-2 login-btn"
                                    type="submit">Cancel</button>
                                <button
                                    class="btn btn-success w-auto  text-center text-white d-block border-0 mx-2 login-btn bt-hover"
                                    type="submit">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
