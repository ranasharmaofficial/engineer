@extends('frontend.layouts.master')
@section('title') Revenue Earned  @endsection
@section('content')

@include('frontend.engineer.partials.engineer_dash_header')

@php
			$engineer_profile_details = \App\Models\User::findOrFail(Session('LoggedEngineer')->user_id);
        @endphp

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

						 @include('frontend.engineer.partials.engineer-left-sidebar')
					</div>
					<!-- /Customer Menu -->
					
					<div class="col-md-8 col-lg-9">
                  <div class="widget-title d-flex align-items-center justify-content-between">
                     <h4 class="fw-bold">Revenue Earned</h4>
                  </div>
                  <hr>
                  <div class="white_block mt-3">
                     <div class="table-responsive">
                        <table class="table mb-0 custom-table border">
                           <thead class="thead-light">
                              <tr>
                                 <th>Order Id </th>
                                 <th>Job Amount </th>
                                 <th>Job Date</th>
                                 <th>Job Completed Date </th>
                                 <th>Job Revenue </th>
                                 <th>Job</th>
                              </tr>
                           </thead>
                           <tbody>
						   
						@if(count($service_booking)>0)
							@foreach($service_booking as $key => $val)
								<tr>
									 <td class="text-light-success">
										<a href="javascript:void();" data-bs-toggle="modal" data-bs-target="#add-wallet">
										   {{ $val->service_order_id }}
										</a>
									 </td>
									 <td class="text-light-success">{{ number_format($val->total_amount) }}</td>
									 <td class="text-light-success">{{ date('d-M-Y', strtotime($val->service_date )) }}</td>
									 <td class="text-light-success">{{ date('d-M-Y', strtotime($val->completed_date )) }}</td>
									 <td style="text-transform:uppercase" class="text-light-success">
										{{ number_format($val->earned_revenue) }}
									</td>
									 <td style="text-transform:uppercase" class="text-light-success">
										{{ $val->status }}
									 </td>
								</tr>
							@endforeach
						@endif

                               
                           </tbody>
                        </table>
                        <nav aria-label="Page navigation">
                           <ul class="pagination fs-13 mt-3">
                              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>

					 
                

				</div>

			</div>
		</div>
		 
	</div>
	
	
<div class="modal fade" id="engJobStartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="" id="start-job-form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="display:none;" id="show-form-error" class="alert alert-danger">
                        <ul>
                            <div class="errorMsgntainer"></div>
                        </ul>
                    </div>
					
					 
					<div class="col-sm-12  my-3">
						<center><label style="font-weight:bold;">Are you sure this job has been completed?</label></center>
					</div>

					<div class="col-sm-offset-2 col-sm-10  my-3">
						<input type="hidden" name="engId" id="engId">
						<input type="hidden" name="id" id="jobId" >
						<input type="hidden" name="order_id" id="orderId" >
						<button style="float:right;" type="button" class="btn btn-primary mb-3 start_job_button">Yes </button>
						
					</div>
				</div>
			</form>
        </div>

    </div>

</div>

<div class="modal fade" id="engineerJobActionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="" id="update-engineer-job-status">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="display:none;" id="show-form-error" class="alert alert-danger">
                        <ul>
                            <div class="errorMsgntainer"></div>
                        </ul>
                    </div>
					
					<div class="col-sm-12  my-3">
						<label style="font-weight:bold;">Select Action</label>
						<select name="job_accept" id="job_accept" class="form-control" required="">
							<option value="accept"> Accept </option>
							<option value="decline"> Decline </option>
						</select>
					</div>
					<div class="col-sm-12  my-3">
						<label style="font-weight:bold;">Enter Remarks</label>
						<input style="visibility:show !important;" type="text" required name="remarks" id="editor" class="form-control" required="" placeholder="Please enter reason here." />
					</div>

					<div class="col-sm-offset-2 col-sm-10  my-3">
						<input type="hidden" name="engId" id="engId">
						<input type="hidden" name="id" id="jobId" >
						 
						<button type="button" class="btn btn-primary update_job_status_status">Update </button>
					</div>
				</div>
			</form>
        </div>

    </div>

</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
  

</script>

@endsection
