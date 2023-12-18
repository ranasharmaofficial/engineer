@extends('admin.include.master')
@section('title', 'Engineer List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb "><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard</a> / Engineer List</div>
                </div>
                <div class="col">
                    <a href="add_engineer_list.php" class="btn btn-info float-right veiwbutton"><i
                            class="fa fa-plus" aria-hidden="true"></i> Add New Engineer List</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="main-panel card-header ">
            <div class="row gutters-5 align-items-center">
                <div class="col">
                    <h5 class="mb-md-0 h6">Engineer List</h5>
                </div>
                <div class="col text-right">
                    <a href="image/incomplete_orders.xlsx" class="btn btn-circle btn-info h-35" download>
                        <span>Export in Excel</span>
                    </a>
                </div>
                <div class="col-md-3 ml-auto">
                    <ul class="nav nav-tabs border h-35 d-block">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Select engineer list</a>
                            <ul class="dropdown-menu  w-100">
                                <li><a class="dropdown-item" href="engineer_list.php">Engineer List</a></li>
                                <li><a class="dropdown-item" href="engineer_working_hr.php">Engineer Working Hrs
                                        List</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control form-control-sm h-35" id="search" name="search"
                            placeholder="Type & Enter">
                    </div>
                </div>
                <div class="col-md-1 pl-0 text-right">
                    <button type="submit" class="btn btn-danger btn-icon-text h-35">
                        <i class="ti-file btn-icon-prepend"></i>
                        Submit
                    </button>
                </div>
            </div>
            <hr>
            <form method="get" action="">
                <div class="input-group mb-3 search-filter">
                    <input type="hidden" name="_token" value="">
                    <input type="text" name="emp_id" class="form-control mr-1 rounded" placeholder="Engineer Id"
                        value="">
                    <input type="text" name="emp_mobileno" class="form-control mx-1 rounded"
                        placeholder="Mobile Number" value="">
                    <input type="text" name="emp_fname" class="form-control mx-1 rounded"
                        placeholder="  Email Id" value="">
                    <input type="text" name="emp_fname" class="form-control mx-1 rounded" placeholder="  Name"
                        value="">
                    <input type="text" name="emp_registration_start_date" class="form-control mx-1 rounded"
                        onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Start date"
                        value="">
                    <input type="text" name="emp_registration_end_date" class="form-control mx-1 rounded"
                        onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="End date"
                        value="">
                    <button type="submit" class="btn btn-primary btn-icon-text h-35">
                        <i class="ti-file btn-icon-prepend"></i>
                        Search
                    </button>
                </div>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped fs-13 lsp-5">
                    <thead>
                        <tr>
                            <th>
                                Engineer Id
                            </th>
                            <th>
                                First Name
                            </th>
                            <th>
                                last Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Mobile No.
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Employment Status
                            </th>
                            <th>
                                Registration Date
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($engineerList as $key => $item)
                        <tr>
                            <td class="py-1">
                                SPE000{{ $key+1 }}
                            </td>
                            <td class="py-1">
							{{ $item->first_name }}
                            </td>
                            <td>
                                {{ $item->last_name }}
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->mobile }}
                            </td>
                            <td>
                                <select name="cars" id="cars"
                                    class="border-0 bg-warning text-white rounded-pill px-1">
                                    <option value="volvo">Active</option>
                                    <option value="saab">Inactive</option>
                                </select>

                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-primary p-1 mr-1">Approved</span>
                                    <span class="badge badge-danger p-1 ml-1" data-toggle="modal"
                                        data-target="#exampleModal">Decline</span>
                                </div>
                            </td>
                            <td>
								{{ date('d-M-Y', strtotime($item->created_at)) }}
                            </td>
                            <td>
                                <form id="frm_2" class="d-flex" method="POST">
                                    <a class="btn btn-primary p-1 mx-1" href="edit_engineer_list.php">Edit</a>
                                    <input type="hidden" name="_token" value="1">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="button" class="btn btn-danger p-1">Delete</button>
                                </form>
                            </td>
                        </tr>
					@endforeach
                        
                    </tbody>
                </table>

            </div>
            <div class="aiz-pagination mt-3 w-100">
                <div class="row justify-content-between">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status"
                            aria-live="polite">Showing 1 to 7 of 7 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="geniustable_paginate">
                            <ul class="pagination justify-content-end">
                                <li class="paginate_button page-item previous disabled"
                                    id="geniustable_previous">
                                    <a href="#" aria-controls="geniustable" data-dt-idx="0" tabindex="0"
                                        class="page-link">Previous</a>
                                </li>
                                <li class="paginate_button page-item active"><a href="#"
                                        aria-controls="geniustable" data-dt-idx="1" tabindex="0"
                                        class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="geniustable"
                                        data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="geniustable"
                                        data-dt-idx="1" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item next disabled" id="geniustable_next"><a
                                        href="#" aria-controls="geniustable" data-dt-idx="2" tabindex="0"
                                        class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Employment Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select name="emp_employment_status" id="emp_employment_status" class="form-control"
                    required="">
                    <option value="2"> Approve </option>
                    <option value="3"> Reject </option>
                </select>
            </div>
            <div class="col-sm-12  my-3">
                <textarea type="text" name="reason" id="reason" class="form-control" required=""
                    placeholder="Please enter reason here."></textarea>
                <div class="error-msg" id="reason_err"></div>
            </div>
            <div class="col-sm-offset-2 col-sm-10  my-3">
                <input type="hidden" name="engId" id="engId" value="6">
                <input type="hidden" id="adminId" value="3">
                <button type="button" class="btn btn-primary" onclick="getAction()">Update
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
