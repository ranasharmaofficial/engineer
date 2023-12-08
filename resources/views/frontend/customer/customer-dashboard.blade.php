@extends('frontend.layouts.master')
@section('title') Customer Dashboard  @endsection
@section('content')
@include('frontend.customer.partials.dash_header')
<div class="main-wrapper">
    <!-- /Header -->
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
                    <div class="widget-title">
                        <h4>Welcome to User Dashboard</h4>
                    </div>
                    <!-- Dashboard Widget -->
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="dash-widget">
                                <div class="dash-img">
                                    <span class="dash-icon bg-yellow">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="dash-info">
                                    <div class="dash-order">
                                        <h5>2</h5>
                                        <h6>Inprogress Services</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="dash-widget">
                                <div class="dash-img">
                                    <span class="dash-icon bg-yellow">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="dash-info">
                                    <div class="dash-order">
                                        <h5>5</h5>
                                        <h6>Upcoming Services</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="dash-widget">
                                <div class="dash-img">
                                    <span class="dash-icon bg-yellow">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="dash-info">
                                    <div class="dash-order">
                                        <h5>10</h5>
                                        <h6>Completed Services</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="dash-widget">
                                <div class="dash-img">
                                    <span class="dash-icon bg-yellow">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="dash-info">
                                    <div class="dash-order">
                                        <h5>20</h5>
                                        <h6>Total <br>Services</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Dashboard Widget -->
                    <div class="row">
                        <!-- Recent Booking -->
                        <div class="col-lg-6 d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="user-title">Ongoing Services</h6>
                                <a href="ongoing-service.php"
                                    class="btn btn-light-danger border my-1 h-auto lh-base rounded-pill py-3 text-white me-3">
                                    View All <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="table-responsive recent-booking flex-fill scrollbar-width">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">New Installtion & Configuration...
                                                        <span><i class="feather-calendar"></i> 22 Sep 2022</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#add-wallet">
                                                    View More
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">New Installtion & Configuration...
                                                        <span><i class="feather-calendar"></i> 22 Sep 2022</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#add-wallet">
                                                    View More
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">New Installtion & Configuration...
                                                        <span><i class="feather-calendar"></i> 22 Sep 2022</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#add-wallet">
                                                    View More
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">New Installtion & Configuration...
                                                        <span><i class="feather-calendar"></i> 22 Sep 2022</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#add-wallet">
                                                    View More
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">New Installtion & Configuration...
                                                        <span><i class="feather-calendar"></i> 22 Sep 2022</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#add-wallet">
                                                    View More
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /Recent Booking -->

                        <!-- Upcoming Services -->
                        <div class="col-lg-6 d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="user-title">Upcoming Services</h6>
                                <a href="upcoming-service.php"
                                    class="btn btn-view-all btn-primary2 rounded-pill lh-base py-3 text-white me-3">
                                    View All <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="table-responsive transaction-table flex-fill scrollbar-width">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">New Installtion & Configuration...
                                                        <span><i class="feather-calendar"></i> 22 Sep 2022</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#upcoming-service">
                                                    View More
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">New Installtion & Configuration...
                                                        <span><i class="feather-calendar"></i> 22 Sep 2022</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();"
                                                    class="btn btn-view btn-primary2 rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#upcoming-service">
                                                    View More
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">New Installtion & Configuration...
                                                        <span><i class="feather-calendar"></i> 22 Sep 2022</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#upcoming-service">
                                                    View More
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">New Installtion & Configuration...
                                                        <span><i class="feather-calendar"></i> 22 Sep 2022</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#upcoming-service">
                                                    View More
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">New Installtion & Configuration...
                                                        <span><i class="feather-calendar"></i> 22 Sep 2022</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#upcoming-service">
                                                    View More
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /Recent Transaction -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /Cursor -->
</div>
@endsection
