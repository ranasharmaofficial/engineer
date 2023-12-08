@extends('admin.include.master')
@section('title', 'Add New Service Sub Category')
@section('content')


<div class="page-wrapper">
         <div class="content container-fluid">
            <div class="page-header border-bottom pb-2">
               <div class="row align-items-center">
                  <div class="col d-flex justify-content-between">
                     <div class="breadcrumb mt-3  pb-2">
                        <a href="{{ url('admin/dashboard') }}">
                           <i class="fa fa-home" aria-hidden="true"></i>
                           Dashboard
                        </a> / Service Sub Category
                     </div>
                     <div class="mt-2">
                        <a href="{{ url('admin/service-sub-category') }}" class="btn btn-info float-right veiwbutton">Back</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-white shadow p-3 mb-4 rounded position-relative">
               <div class="profile-menu">
                  <ul class="nav nav-tabs nav-tabs-solid">
                     <li class="nav-item"> <a class="nav-link active border rounded-top" data-toggle="tab"
                        href="#indian_cuisine">Add Service Sub Category</a>
                     </li>
                  </ul>
               </div>
               <div class="tab-content profile-tab-cont mt-1">
                  <div class="tab-pane fade active show" id="indian_cuisine">
                     <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Add New Service Sub Category</h6>
                     <form class="form-sample p-2" action="{{ route('admin.service.store') }}" method="post">
					  @csrf
                        <div class="row align-items-center justify-content-between">

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

                            <div class="col-md-6">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Select Category</label>
								    <div class="col-sm-12">
										<select class="form-control" id="category_id" name="category_id">
											<option value="">Select Category</option>
											@foreach($service_categories as $item)
												<option value="{{ $item->id }}">{{ $item->name }}</option>
											@endforeach
										</select>

								    </div>
								</div>
                            </div>

							<div class="col-md-6">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Select Category</label>
								    <div class="col-sm-12">
										<select class="form-control" id="subcategory_id" name="subcategory_id">
											<option value="">Select Category</option>

										</select>

								    </div>
								</div>
                            </div>

							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Enter Service Name</label>
								    <div class="col-sm-12">
										<input class="form-control" name="name" placeholder="Enter Service Name">
									</div>
								</div>
                            </div>

							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Enter Service Description</label>
								    <div class="col-sm-12">
										<textarea class="form-control" name="description" placeholder="Enter Service Description"></textarea>
									</div>
								</div>
                            </div>

							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Status</label>
								    <div class="col-sm-12">
										<select class="form-control" name="status">
											 <option selected value="1">Active</option>
											 <option value="2">Inactive</option>
										  </select>
									</div>
								</div>
                            </div>

							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <div class="col-sm-12">
										<button type="submit" class="btn btn-primary btn-icon-text">
											 <i class="ti-file btn-icon-prepend"></i> Submit
										 </button>
									</div>
								</div>
                            </div>


                        </div>
                     </form>
                  </div>
               </div>
            </div>
				@include('admin.include.topfoot')
         </div>
      </div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    $(document).ready(function() {

        $('#category_id').on('change', function() {
            var category_id = this.value;
            // $("#block_id").html('');
            $.ajax({
                url: "{{ url('admin/get-subcategory-list') }}",
                type: "POST",
                data: {
                    category_id: category_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#subcategory_id').html('<option value="">Select Subcategory</option>');
                    $.each(result.subcategories, function(key, value) {
                        $("#subcategory_id").append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                }
            });
        });

	});



    </script>


@endsection


