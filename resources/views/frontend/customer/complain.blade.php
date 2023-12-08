@extends('frontend.layouts.master')
@section('title') Complain  @endsection
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
                    <div class="widget-title d-flex align-items-center justify-content-between">
                        <h4>Complain</h4>
                        <a href="{{ route('customer.add_complain') }}"
                            class="fs-14 py-1 bg-primary2 rounded-pill px-4 text-white bt-hover">Add Complain</a>
                    </div>
                    <hr>
                    <div class="white_block mt-3">
                        <div class="table-responsive">
                            <table class="table mb-0 custom-table border">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Service Id </th>
                                        <th>Subject </th>
                                        <th>Complain</th>
                                        <th>Status </th>
                                        <th>Remarks </th>
                                        <th>Created On</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>EGMNE-ORD-00161 </td>
                                        <td>Speed is very slow </td>
                                        <td class="text-light-success">test </td>
                                        <td class="text-body"><span class="badge-success">Completed</span> </td>
                                        <td class="text-body">&nbsp; </td>
                                        <td class="text-body">Jun 20, 2023</td>
                                        <td><a href="javascript:void();"
                                                class="btn btn-view-all btn-primary2 rounded-pill"
                                                data-bs-toggle="modal" data-bs-target="#add-wallet">View More</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>EGMNE-ORD-00161 </td>
                                        <td>Speed is very slow </td>
                                        <td class="text-light-success">test </td>
                                        <td class="text-body"><span class="badge-danger">Cancel</span> </td>
                                        <td class="text-body">&nbsp; </td>
                                        <td class="text-body">Jun 20, 2023</td>
                                        <td><a href="javascript:void();"
                                                class="btn btn-view-all btn-primary2 rounded-pill"
                                                data-bs-toggle="modal" data-bs-target="#add-wallet">View More</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>EGMNE-ORD-00161 </td>
                                        <td>Speed is very slow </td>
                                        <td class="text-light-success">test </td>
                                        <td class="text-body"><span class="badge-success">Completed</span> </td>
                                        <td class="text-body">&nbsp; </td>
                                        <td class="text-body">Jun 20, 2023</td>
                                        <td><a href="javascript:void();"
                                                class="btn btn-view-all btn-primary2 rounded-pill"
                                                data-bs-toggle="modal" data-bs-target="#add-wallet">View More</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>EGMNE-ORD-00161 </td>
                                        <td>Speed is very slow </td>
                                        <td class="text-light-success">test </td>
                                        <td class="text-body"><span class="badge-danger">Cancel</span> </td>
                                        <td class="text-body">&nbsp; </td>
                                        <td class="text-body">Jun 20, 2023</td>
                                        <td><a href="javascript:void();"
                                                class="btn btn-view-all btn-primary2 rounded-pill"
                                                data-bs-toggle="modal" data-bs-target="#add-wallet">View More</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>EGMNE-ORD-00161 </td>
                                        <td>Speed is very slow </td>
                                        <td class="text-light-success">test </td>
                                        <td class="text-body"><span class="badge-success">Completed</span> </td>
                                        <td class="text-body">&nbsp; </td>
                                        <td class="text-body">Jun 20, 2023</td>
                                        <td><a href="javascript:void();"
                                                class="btn btn-view-all btn-primary2 rounded-pill"
                                                data-bs-toggle="modal" data-bs-target="#add-wallet">View More</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>EGMNE-ORD-00161 </td>
                                        <td>Speed is very slow </td>
                                        <td class="text-light-success">test </td>
                                        <td class="text-body"><span class="badge-danger">Cancel</span> </td>
                                        <td class="text-body">&nbsp; </td>
                                        <td class="text-body">Jun 20, 2023</td>
                                        <td><a href="javascript:void();"
                                                class="btn btn-view-all btn-primary2 rounded-pill"
                                                data-bs-toggle="modal" data-bs-target="#add-wallet">View More</a>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
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
                    <h5 class="modal-title">Complain Details</h5>
                    <button type="button" class="close-btn px-2 border-0 rounded-circle" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa fa-times"></i></button>
                </div>
                <hr>
                <div class="modal-body pt-0">
                    <table class="table w-100">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td><strong>Service ID</strong></td>
                                <td>
                                    <span>EGMNE-ORD-00161</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Subject</strong></td>
                                <td>Speed is very slow</td>
                            </tr>
                            <tr>
                                <td><strong>Complain</strong></td>
                                <td>Test</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>Pending</td>
                            </tr>
                            <tr>
                                <td><strong>Remarks</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Created On</strong></td>
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
    <!-- /Add Wallet -->
</div>

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
