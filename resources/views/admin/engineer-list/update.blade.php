@extends('admin.include.master')
@section('title', 'Engineer List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard</a> / Service List</div>
                </div>
                <div class="col">
                    <a href="engineer_list.php" class="btn btn-info float-right veiwbutton">Back</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="bg-white shadow p-3 rounded position-relative">
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item"> <a class="nav-link active border rounded-top" data-toggle="tab"
                            href="#indian_cuisine">Edit Engineer's Profile</a> </li>

                </ul>
            </div>
            <div class="tab-content profile-tab-cont mt-1">
                <div class="tab-pane fade active show" id="indian_cuisine">
                    <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Edit Engineer's Profile
                    </h6>
                    <form class="form-sample" enctype="multipart/form-data" action="" method="post">
                        <input type="hidden" name="_token" value="">
                        <p class="card-description"> </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">First Name</label>

                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="emp_fname" value="Nitin">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Last Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="emp_lname" value="Sharma">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="emp_email"
                                            value="admin@gmail.com">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Mobile No.</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="emp_mobileno"
                                            value="9876543210">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Primary Skill</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="primary_skill" name="primary_skill"
                                            onchange="getService(this.value)">
                                            <option value="">Please Select Domain</option>

                                            <option value="13">Device Remote Access Support</option>
                                            <option value="14">Preventive Maintenance</option>
                                            <option value="15">Site Survay</option>
                                            <option value="16">Rack Mounting</option>
                                            <option value="18">Operating System</option>
                                            <option value="19">Database</option>
                                            <option value="21">Virtualization</option>
                                            <option value="23">Router</option>
                                            <option value="24">Switch</option>
                                            <option value="25">Firewall</option>
                                            <option value="30">Backup</option>
                                            <option value="32">Hardware Replacement</option>
                                            <option value="33">Cablining &amp; Connectivity</option>
                                        </select>
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Secondary Skill</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="cat" name="secondary_skill">
                                            <option value="">Please Select Sub Domain</option>
                                        </select>
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="emp_status">

                                            <option value="1">Active</option>

                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Employment Status</label>
                                    <div class="col-sm-12">

                                        <select class="form-control" name="emp_employment_status">

                                            <option value="1">Pending</option>

                                            <option value="2">Approved</option>

                                            <option value="3">Rejected</option>
                                        </select>
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-icon-text">
                            <i class="ti-file btn-icon-prepend"></i>
                            Submit
                        </button>
                    </form>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
