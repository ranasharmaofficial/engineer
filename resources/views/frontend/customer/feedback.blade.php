@extends('frontend.layouts.master')
@section('title') Feedback  @endsection
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
                    <div class="white_block fs-14 ">
                        <div class="widget-title">
                            <h4>User Feedback</h4>
                        </div>
                        <form novalidate="" class="ng-untouched forms-new">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="cus_city_id">Select Order:</label>
                                    <select name="cus_city_id" id="cus_city_id" class="form-control">
                                        <option value="">Select Order</option>
                                        <option value="">EGMNE-ORD-VIK-007</option>
                                        <option value="">EGMNE-ORD-VIK-006</option>
                                        <option value="">EGMNE-ORD-VIK-005</option>
                                        <option value="">EGMNE-ORD-VIK-004</option>
                                        <option value="">EGMNE-ORD-VIK-003</option>
                                        <option value="">EGMNE-ORD-VIK-002</option>
                                        <option value="">EGMNE-ORD-VIK-001</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="cus_state_id">Select Rating:</label>
                                    <select name="cus_state_id" id="cus_state_id" class="form-control">
                                        <option value="">Select Rating</option>
                                        <option value="">05-Excellent</option>
                                        <option value="">04-Above Average</option>
                                        <option value="">03-Average</option>
                                        <option value="">02-Below Average</option>
                                        <option value="">01-Poor</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label>Feedback:</label>
                                    <textarea rows="5" placeholder="Please enter your Feedback"
                                        class="form-control">
                          </textarea>
                                </div>

                            </div>
                            <div class="col-sm-12 mt-2">
                                <p>By submitting you agree to our <a href="#olicy" target="_blank">Privacy
                                        Policy</a> and
                                    <a href="#terms-and-conditions" target="_blank">T&amp;C </a>.
                                </p>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-center">
                                <!-- <button type="submit" class="btn login-butto1n btn-dark bg-dark text-white px-3 py-2 mx-2">
                          Cancel
                       </button> -->
                                <button type="submit"
                                    class="btn login-button btn-danger text-white px-3 py-2 bt-hover">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Wallet -->
    <div class="modal fade custom-modal" id="add-wallet">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 justify-content-between pb-0">
                    <h5 class="modal-title">Booked Service Detail</h5>
                    <button type="button" class="close-btn px-2 border-0 rounded-circle" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa fa-times"></i></button>
                </div>
                <hr>
                <div class="modal-body pt-0">
                    <table class="table w-100">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td><strong>Service</strong></td>
                                <td>
                                    <span> New Installtion &amp; Configuration, Operating System, Windows Cluster
                                        Configuration,
                                        Windows Server Edition<br></span>
                                    <!---->
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Service Date</strong></td>
                                <td>Feb 9, 2023</td>
                            </tr>
                            <tr>
                                <td><strong>Order Date</strong></td>
                                <td>Aug 23, 2023</td>
                            </tr>
                            <tr>
                                <td><strong>Service location</strong></td>
                                <td>Delhi, India</td>
                            </tr>
                            <tr>
                                <td><strong>Service Status</strong></td>
                                <td>Upcoming</td>
                            </tr>
                            <tr>
                                <td><strong>Engineer Id</strong></td>
                                <td>SPE0003</td>
                            </tr>
                            <tr>
                                <td><strong>Engineer Adhar No.</strong></td>
                                <td>23333333323233</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- /Add Wallet -->
    <script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>

@endsection
