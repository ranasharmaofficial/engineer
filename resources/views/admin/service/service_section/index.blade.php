@extends('admin.include.master')
@section('title', 'Service Section List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{ url('admin/service_sections/create') }}">Add New Service Section</a>
                    <div class="breadcrumb mt-3 border-bottom pb-2">
                        <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Service Section
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title float-left mt-2">Service Section List</h4>
                            </div>
                        </div>

                        <form method="GET" class="form">
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-control" name="page_id">
                                        <option value="">Select Page</option>
                                        @foreach($cms_pages as $page)
                                            <option value="{{$page->id}}" @if($request->page_id == $page->id) selected @endif>{{$page->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-3">
                                    <select class="form-control" name="section">
                                        <option value="">---Select Section---</option>
                                        <option value="about_section" @if($request->section == "about_section") selected @endif>About Us Section</option>
                                        <option value="key_points_section" @if($request->section == "key_points_section") selected @endif>Key Point Section (Black Background)</option>
                                        <option value="feature_section" @if($request->section == "feature_section") selected @endif>Feature Section</option>
                                        <option value="choose_section" @if($request->section == "choose_section") selected @endif>Choose Us Section (Black Background)</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="search" placeholder="Search Title" value="@isset($request->search){{$request->search}}@endisset">
                                </div>
                                
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-danger"> Search </button>
                                    <a href="{{ url('admin/service_sections') }}" class="btn btn-warning"> Reset </a>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Page Name</th>
                                        <th>Section Name</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service_sections as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->page_title }}</td>
                                        <td>{{ $value->section_name }}</td>
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            <div class="actions"> @if($value->status == 1) <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a class="text-primary" href="{{ route('admin.service_sections.edit',$value->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                <a class="text-danger" onclick="return confirm('Are you sure, you want to delete this?')" href="{{route('admin.service_sections.delete',$value->id)}}"><i class="fas fa-trash-alt m-r-5"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {{ $service_sections->appends(request()->input())->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

