@extends('admin.include.master')

@section('title', 'Add Engineer')

@section('content')



<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb ">
                        <a href="index.php">
                            <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Engineer
                    </div>
                </div>
                <div class="col">
                    <a href="{{ url('admin/engineer-list') }}" class="btn btn-info float-right veiwbutton ">Back </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="bg-white shadow p-3 rounded position-relative">
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active border rounded-top" data-toggle="tab" href="#indian_cuisine">Add Engineer</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont mt-1">
                <div class="tab-pane fade active show" id="indian_cuisine">
                    <h6 class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3"> Create Engineer's Profile </h6>
                    <form class="form-sample" id="add-employee-details" enctype="multipart/form-data" action="" method="post">
                        @csrf

                        <div class="row">

                            <div class="col-md-12">
                                <div style="display:none;" id="show-form-error" class="alert alert-danger form-group">
                                    <ul>
                                        <div class="errorMsgntainer"></div>
                                    </ul>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">First Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="first_name">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Last Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Mobile No.</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="mobile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Primary Skill</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="primary_skill" name="primary_skill" onchange="getService(this.value)">
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
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-icon-text add_employee_details"> <i class="ti-file btn-icon-prepend"></i> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



@section('script')
<script type="text/javascript">
    $(document).on('click', '.add_employee_details', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("add-employee-details"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST"
            , url: "{{ route('admin.addEmployeeDetails') }}"
            , data: formData
            , processData: false
            , contentType: false
            , dataType: "JSON"
            , success: function(data) {
                // console.log('status ' + data.status);
                if (data.status == true) {
                    toastr.success('Added Successfully.');
                    setTimeout(function() {
                        window.location = "{{ url('admin/engineer-list') }}"
                    }, 2000);
                } else {
                    toastr.error('Something went wrong.');
                }
            },

            error: function(err) {
                document.getElementById('show-form-error').style = "display: block";

                let error = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');

                });

            }



        });

    });

</script>
@endsection

