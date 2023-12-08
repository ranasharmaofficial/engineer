@extends('admin.include.master')
@section('title', 'Website Footer')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb "><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard</a> / CMS</div>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <hr>
        <!-- Manage Footer Logo  -->
        <div class="card">
            <div class="card-header">
                <h6 class="fw-900 fw-bold mb-0">Footer Widget</h6>
            </div>
            <div class="card-body">
                <div class="row gutters-10">
                    <div class="col-lg-12">
                        <div class="card shadow-none  border">
                            <div class="card-header">
                                <h6 class="mb-0">About Widget</h6>
                            </div>
                            <div class="card-body">
                                <form action="#1" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="Su5">
                                    <div class="form-group">
                                        <label class="form-label" for="signinSrEmail">Footer Logo</label>
                                        <div class="input-group " data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div
                                                    class="input-group-text bg-soft-secondary font-weight-medium">
                                                    Browse</div>
                                            </div>
                                            <div class="form-control file-amount">1 File selected</div>
                                            <input type="hidden" name="types[]" value="footer_logo">
                                            <input type="hidden" name="footer_logo" class="selected-files"
                                                value="2">
                                        </div>
                                        <div class="file-preview ">
                                            <div class="d-flex justify-content-between align-items-center mt-2  d-flex file-preview-item"
                                                data-id="2" title="logo-foot.png">
                                                <div
                                                    class="align-items-center align-self-stretch d-flex justify-content-center thumb mb-0">
                                                    <img src="image/img1.png" class="img-fit w-50px">
                                                </div>
                                                <div class="col body d-flex align-items-center">
                                                    <h6 class="d-flex mb-0"><span
                                                            class="text-truncate title">logo-foot</span><span
                                                            class="ext flex-shrink-0">.png</span></h6>
                                                    <p class="mb-0">13 KB</p>
                                                </div>
                                                <div class="remove"><button
                                                        class="btn btn-sm btn-link remove-attachment"
                                                        type="button"><i class="la la-close"></i></button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>About description (Translatable)</label>
                                        <input type="hidden" name="types[][en]" value="about_us_description">
                                        <textarea class="form-control" name="cr_description" id="editor">
                      orrish is an Indian Consumer electronics retail brand.We are dedicated to provide best in class daily and specific electronics and appliances needs.
                    </textarea>


                                    </div>
                                    <div class="form-group">
                                        <label>Play Store Link</label>
                                        <input type="hidden" name="types[]" value="play_store_link">
                                        <input type="text" class="form-control" placeholder="http://"
                                            name="play_store_link" value="https://play.google.com/store">
                                    </div>
                                    <div class="form-group">
                                        <label>App Store Link</label>
                                        <input type="hidden" name="types[]" value="app_store_link">
                                        <input type="text" class="form-control" placeholder="http://"
                                            name="app_store_link" value="https://www.apple.com/in/app-store">
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">Contact Info Widget</h6>
                            </div>
                            <div class="card-body">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="OuLU">
                                    <div class="form-group">
                                        <label>Contact address (Translatable)</label>
                                        <input type="hidden" name="types[][en]" value="contact_address">
                                        <input type="text" class="form-control" placeholder="Address"
                                            name="contact_address" value="Demo Address">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact phone</label>
                                        <input type="hidden" name="types[]" value="contact_phone">
                                        <input type="text" class="form-control" placeholder="Phone"
                                            name="contact_phone" value="+91 9876543210">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact email</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder="Email"
                                            name="contact_email" value="contact@orrish.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Working Hours</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control"
                                            placeholder=" Monday To Saturday: 09.30am To 18.30pm | Sunday : Closed "
                                            name="contact_email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Corporate Address</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder="Gurgaon "
                                            name="contact_email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Corporate Address Phone</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder=" +91 568943755 "
                                            name="contact_email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Corporate Address Email</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder=" info@.com "
                                            name="contact_email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact email</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control"
                                            placeholder=" 1st Floor uttan nagar 1110059" name="contact_email"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Registered Address</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder=" +91-4583857432 "
                                            name="contact_email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Registered Address Phone</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder=" +91-4583857432"
                                            name="contact_email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Registered Address Email</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder=" support@.com "
                                            name="contact_email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Leads UK Address</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control"
                                            placeholder=" 1st Floor uttan nagar 1110059" name="contact_email"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Leads UK Phone</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder=" +91-4583857432"
                                            name="contact_email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Skype Id</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder="enginermind"
                                            name="contact_email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Telegram</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder="enginermind"
                                            name="contact_email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>WhatsApp</label>
                                        <input type="hidden" name="types[]" value="contact_email">
                                        <input type="text" class="form-control" placeholder=" +91-4583857432"
                                            name="contact_email" value="">
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Manage Widget One  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card shadow-none border">
                    <div class="card-header">
                        <h6 class="mb-0">Widget One Name</h6>
                    </div>
                    <div class="card-body booking_card">
                        <form method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="">
                            <div class="row">
                                <div class="form-group1 col-md-12 px-1">
                                    <div class=" px-0">
                                        <input type="hidden" class="form-control" name="widget_lable"
                                            value="widget_one_name" required>
                                        <input type="text" class="form-control" name="widget_name"
                                            value="ABOUT BUSSINESS ONLINE SERVICE">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="">
                            <div class="row formtype align-items-end px-0">

                                <input type="hidden" name="widget_type2" value="footer_widget_one_links">
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]"
                                            placeholder="Lable" value="Booking">
                                        <input type="text" class="form-control mx-1" name="widget_links[]"
                                            placeholder="Link" value="link 1">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger" id="DeleteRow" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]"
                                            placeholder="Lable" value="Lable 2">
                                        <input type="text" class="form-control mx-1" name="widget_links[]"
                                            placeholder="Link" value="Link 2">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger" id="DeleteRow" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="new_widget_one_input" class="w-100"></div>
                                <div class="w-100 d-block text-start px-1">
                                    <button id="widget_one_row_adder" type="button" class="btn btn-success">
                                        <span class="fa fa-plus-square"></span>
                                        Add Widget
                                    </button>
                                    <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Manage Widget Two  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card shadow-none border">
                    <div class="card-header">
                        <h6 class="mb-0">Widget Two Name</h6>
                    </div>
                    <div class="card-body booking_card">
                        <form method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="">
                            <div class="row">
                                <div class="form-group1 col-md-12 px-1">
                                    <div class=" px-0">
                                        <input type="hidden" class="form-control" name="widget_lable"
                                            value="widget_two_name" required>
                                        <input type="text" class="form-control" name="widget_name"
                                            value="Quick Links">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="">
                            <div class="row formtype align-items-end px-0">

                                <input type="hidden" name="widget_type2" value="footer_widget_two_links">
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]"
                                            placeholder="Lable" value="test lable">
                                        <input type="text" class="form-control mx-1" name="widget_links[]"
                                            placeholder="Link" value="test link">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger" id="DeleteRow" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="new_widget_two_input" class="w-100"></div>
                                <div class="w-100 d-block text-start px-1">
                                    <button id="widget_two_row_adder" type="button" class="btn btn-success">
                                        <span class="fa fa-plus-square"></span>
                                        Add Widget
                                    </button>
                                    <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 px-0">
            <div class="card shadow-none border">
                <div class="card-header">
                    <h6 class="mb-0">Widget Three Name</h6>
                </div>
                <div class="pb-4">
                    <div class="card-body booking_card">
                        <form method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="">
                            <div class="row">
                                <div class="form-group col-md-12 px-1">

                                    <div class=" px-0">
                                        <input type="hidden" class="form-control" name="widget_lable"
                                            value="widget_three_name" required="">
                                        <input type="text" class="form-control" name="widget_name"
                                            value="NAVIGATION">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" class="form-control" name="widget_type1"
                                    value="footer_widget_three_lable" required="">

                                <input type="hidden" name="widget_type2" value="footer_widget_three_links">
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]"
                                            placeholder="Lable" value="About Us">
                                        <input type="text" class="form-control mx-1" name="widget_links[]"
                                            placeholder="Link" value="#">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger" id="DeleteRow" type="button">
                                                <svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                    focusable="false" data-prefix="fas" data-icon="trash"
                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fa fa-trash"></i> Font Awesome fontawesome.com -->
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]"
                                            placeholder="Lable" value="Blog">
                                        <input type="text" class="form-control mx-1" name="widget_links[]"
                                            placeholder="Link" value="#">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger" id="DeleteRow" type="button">
                                                <svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                    focusable="false" data-prefix="fas" data-icon="trash"
                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fa fa-trash"></i> Font Awesome fontawesome.com -->
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]"
                                            placeholder="Lable" value="Contact Us">
                                        <input type="text" class="form-control mx-1" name="widget_links[]"
                                            placeholder="Link" value="#">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger" id="DeleteRow" type="button">
                                                <svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                    focusable="false" data-prefix="fas" data-icon="trash"
                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fa fa-trash"></i> Font Awesome fontawesome.com -->
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]"
                                            placeholder="Lable" value="Gallery">
                                        <input type="text" class="form-control mx-1" name="widget_links[]"
                                            placeholder="Link" value="#">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger" id="DeleteRow" type="button">
                                                <svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                    focusable="false" data-prefix="fas" data-icon="trash"
                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fa fa-trash"></i> Font Awesome fontawesome.com -->
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]"
                                            placeholder="Lable" value="News">
                                        <input type="text" class="form-control mx-1" name="widget_links[]"
                                            placeholder="Link" value="#">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger" id="DeleteRow" type="button">
                                                <svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                    focusable="false" data-prefix="fas" data-icon="trash"
                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fa fa-trash"></i> Font Awesome fontawesome.com -->
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]"
                                            placeholder="Lable" value="Testimonial">
                                        <input type="text" class="form-control mx-1" name="widget_links[]"
                                            placeholder="Link" value="#">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger" id="DeleteRow" type="button">
                                                <svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                    focusable="false" data-prefix="fas" data-icon="trash"
                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                    </path>
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="new_widget_three_input" class="w-100"></div>
                                <div class="w-100 d-flex justify-content-between pl-1">
                                    <button id="widget_three_row_adder" type="button" class="btn btn-success">
                                        <svg class="svg-inline--fa fa-square-plus" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="square-plus"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z">
                                            </path>
                                        </svg>
                                        Add Widget
                                    </button>
                                    <button type="submit"
                                        class="btn btn-primary buttonedit1 mr-4">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(false)
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Manage Website Footer</h4>
                    </div>
                </div>
            </div>
        </div>

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
        </div>

        <!-- Manage Footer Logo  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype">
                                <input type="hidden" class="form-control" name="type" value="footer_setup" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Footer Logo </strong></label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="footer_logo">
                                            @if(fetch_business_setting_value('footer_setup', 'footer_logo') != null)
                                                <img src="{{ asset(fetch_business_setting_value('footer_setup', 'footer_logo')) }}" height=100 width=100>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Footer Description</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="footer_description" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'footer_description') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Copyright Widget</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="copyright_widget" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('footer_setup', 'copyright_widget') }}" pattern="+91[7-9]{1}[0-9]{9}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Contact Info  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype">
                                <input type="hidden" class="form-control" name="type" value="footer_setup" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Contact Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_address" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'contact_address') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Contact Phone</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_phone" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('footer_setup', 'contact_phone') }}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Contact Email</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_email" required>
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('footer_setup', 'contact_email') }}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Working Hours</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_working_hr" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'contact_working_hr') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Corporate Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="corporate_address" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'corporate_address') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Corporate Address Phone</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="corporate_address_phone" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'corporate_address_phone') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Corporate Address Email</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="corporate_address_email" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'corporate_address_email') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Registered Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="registered_address" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'registered_address') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Registered Address Phone</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="registered_address_phone" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'registered_address_phone') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Registered Address Email</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="registered_address_email" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'registered_address_email') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Leads UK Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="leads_uk_address" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'leads_uk_address') }} </textarea>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Leads UK Phone</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="leads_uk_address_phone" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'leads_uk_address_phone') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Skype Id</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="skype" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'skype') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Telegram</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="telegram" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'telegram') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>WhatsApp</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="whatsapp" required>
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'whatsapp') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Widget One  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_widget') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype align-items-end">
                                <input type="hidden" class="form-control" name="widget_type1" value="footer_widget_one_lable" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Widget One Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="widget_lable" value="widget_one_name" required>
                                            <input type="text" class="form-control" name="widget_name" value="{{ fetch_business_setting_value('footer_widget_one_lable', 'widget_one_name') }}" >
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="widget_type2" value="footer_widget_one_links">
                                @php
                                    $widget_one_data = fetch_business_setting_data('footer_widget_one_links');
                                @endphp

                                @if($widget_one_data)
                                    @foreach(json_decode($widget_one_data->field_name) as $key=>$value)
                                        <div class="row w-100 my-2" id="row">
                                            <div class="col-md-12 d-flex">
                                                <input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable" value="{{$value}}">
                                                <input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link" value="{{json_decode($widget_one_data->value)[$key]}}">
                                                <div class="input-group-prepend mx-1">
                                                    <button class="btn btn-danger"
                                                        id="DeleteRow" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div id="new_widget_one_input" class="w-100"></div>

                                <div class="w-100 d-block text-start">
                                    <button id="widget_one_row_adder" type="button"
                                        class="btn btn-success">
                                        <span class="fa fa-plus-square"></span>
                                        Add Widget
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Widget Two  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_widget') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype align-items-end">
                                <input type="hidden" class="form-control" name="widget_type1" value="footer_widget_two_lable" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Widget Two Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="widget_lable" value="widget_two_name" required>
                                            <input type="text" class="form-control" name="widget_name" value="{{ fetch_business_setting_value('footer_widget_two_lable', 'widget_two_name') }}" >
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="widget_type2" value="footer_widget_two_links">
                                @php
                                    $widget_two_data = fetch_business_setting_data('footer_widget_two_links');
                                @endphp

                                @if($widget_two_data)
                                    @foreach(json_decode($widget_two_data->field_name) as $key=>$value)
                                        <div class="row w-100 my-2" id="row">
                                            <div class="col-md-12 d-flex">
                                                <input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable" value="{{$value}}">
                                                <input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link" value="{{json_decode($widget_two_data->value)[$key]}}">
                                                <div class="input-group-prepend mx-1">
                                                    <button class="btn btn-danger"
                                                        id="DeleteRow" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div id="new_widget_two_input" class="w-100"></div>

                                <div class="w-100 d-block text-start">
                                    <button id="widget_two_row_adder" type="button"
                                        class="btn btn-success">
                                        <span class="fa fa-plus-square"></span>
                                        Add Widget
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Widget Three  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_widget') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype align-items-end">
                                <input type="hidden" class="form-control" name="widget_type1" value="footer_widget_three_lable" required>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Widget Three Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="widget_lable" value="widget_three_name" required>
                                            <input type="text" class="form-control" name="widget_name" value="{{ fetch_business_setting_value('footer_widget_three_lable', 'widget_three_name') }}" >
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="widget_type2" value="footer_widget_three_links">
                                @php
                                    $widget_three_data = fetch_business_setting_data('footer_widget_three_links');
                                @endphp
                                @if($widget_three_data)
                                    @foreach(json_decode($widget_three_data->field_name) as $key=>$value)
                                        <div class="row w-100 my-2" id="row">
                                            <div class="col-md-12 d-flex">
                                                <input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable" value="{{$value}}">
                                                <input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link" value="{{json_decode($widget_three_data->value)[$key]}}">
                                                <div class="input-group-prepend mx-1">
                                                    <button class="btn btn-danger"
                                                        id="DeleteRow" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div id="new_widget_three_input" class="w-100"></div>

                                <div class="w-100 d-block text-start">
                                    <button id="widget_three_row_adder" type="button"
                                        class="btn btn-success">
                                        <span class="fa fa-plus-square"></span>
                                        Add Widget
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">

    function addNewRow(append_id){
        newRowAdd =
            '<div class="row my-2 w-100" id="row"><div class="col-md-12 d-flex">'+
            '<input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable">'+
            '<input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link">'+
            '<div class="input-group-prepend mx-1">'+
            '<button class="btn btn-danger" id="DeleteRow" type="button">'+
            '<i class="fa fa-trash"></i> </button>'+
            '</div></div></div>';

        $(append_id).append(newRowAdd);
    }

    $("#widget_one_row_adder").click(function () {
        addNewRow("#new_widget_one_input");
    });

    $("#widget_two_row_adder").click(function () {
        addNewRow("#new_widget_two_input");
    });

    $("#widget_three_row_adder").click(function () {
        addNewRow("#new_widget_three_input");
    });

    $("body").on("click", "#DeleteRow", function () {
        $(this).parents("#row").remove();
    })
</script>

@endif

@endsection
