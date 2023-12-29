@extends('frontend.layouts.master')
@section('title') Completed Job  @endsection
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
                     <h4 class="fw-bold">Completed Job</h4>
                  </div>
                  <hr>
                  <div class="white_block mt-3">
                     <div class="table-responsive">
                        <table class="table mb-0 custom-table border">
                           <thead class="thead-light">
                              <tr>
                                 <th>Order Id </th>
                                 <th>Customer Name </th>
                                 <th>Contact No</th>
                                 <th>Service Date </th>
                                 <th>Action Status </th>
                                 <th>Job</th>
                              </tr>
                           </thead>
                           <tbody>
						   
						@if(count($service_booking)>0)
							@foreach($service_booking as $key => $val)

								@php

									$total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');
									$total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');

									$service_order = \App\Models\Order::where('user_id', $val->user_id)->where('id', $val->order_id)->first();

									$category = $val->category_id;
									$subcategory = $val->subcategory_id;
									$service = $val->service_id;
									$service_category = \App\Models\ServiceCategory::where('id', $category)->first();
									$service_subcategory = \App\Models\ServiceSubCategory::where('id', $subcategory)->first();
									$service_name = \App\Models\Service::where('id', $service)->first();
								@endphp
					
					
								<tr>
									 <td class="text-light-success">
										<a href="javascript:void();" data-bs-toggle="modal" data-bs-target="#add-wallet{{$key+1}}">
										   {{ $val->service_order_id }}
										</a>
									 </td>
									 <td class="text-light-success">{{ $val->first_name.' '.$val->last_name }}</td>
									 <td class="text-light-success">{{ $val->mobile }}</td>
									 <td class="text-light-success">{{ date('d-M-Y', strtotime($val->service_date )) }}</td>
									 <td class="text-light-success">
									 @if($val->status=='0')
															<p class="font-weight-bold text-danger">Pending</p>
														@elseif($val->status=='1')
															<p class="font-weight-bold text-primary">Assign to Engineer</p>
														@elseif($val->status=='2')
															<p class="font-weight-bold text-warning">Ongoing</p>
														@elseif($val->status=='3')
															<p class="font-weight-bold text-success">Completed</p>
														@elseif($val->status=='4')
															<p class="font-weight-bold text-danger">Declined</p>
														@elseif($val->status=='5')
															<p class="font-weight-bold text-danger">Cancelled</p>
														@elseif($val->status=='6')
															<p class="font-weight-bold text-info">Upcoming</p>
														@endif
														
												<select name="status" data-orderid="{{$val->id}}" class="rounded-pill p-2 bg-primary2 text-white border borer-0 change_status">
													{{--<option @if($val->status=='0') selected @endif value="0">Pending</option>
													<option @if($val->status=='1') selected @endif value="1">Assign to Engineer</option>--}}
													<option @if($val->status=='2') selected @endif value="2">Ongoing</option>
													<option @if($val->status=='3') selected @endif value="3">Completed</option>
													<option @if($val->status=='4') selected @endif value="4">Declined</option>
													<option @if($val->status=='5') selected @endif value="5">Cancelled</option>
													<option @if($val->status=='6') selected @endif value="6">Upcoming</option>
												</select>
									 </td>
									 <td class="text-light-success">Service</td>
								</tr>
							@endforeach
						@endif

                               
                           </tbody>
                        </table>
                        <nav class="pagination fs-13 mt-3" aria-label="Page navigation">
						{{--<ul class="pagination fs-13 mt-3">
                              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
                           </ul>--}}
						   {{ $service_booking->appends(request()->input())->links() }}
                        </nav>
                     </div>
                  </div>
               </div>

		@if(count($service_booking)>0)
			@foreach($service_booking as $key => $val)	
				@php	
					if($val->country!=null)
					{
						$cust_country_name = \App\Models\Country::where('id', $val->country)->pluck('name')->first();
					}else{
						$cust_country_name = '';
					}
					
					if($val->state!=null)
					{
						$cust_state_name = \App\Models\State::where('id', $val->state)->pluck('name')->first();
					}else{
						$cust_state_name = '';
					}
					
					if($val->city!=null)
					{
						$cust_city_name = \App\Models\City::where('id', $val->city)->pluck('name')->first();
					}else{
						$cust_city_name = '';
					}
					
				@endphp		
				<div class="modal fade custom-modal" id="add-wallet{{$key+1}}">
				  <div class="modal-dialog modal-dialog-centered modal-lg">
					 <div class="modal-content">
						<div class="modal-header border-bottom-0 justify-content-between pb-0">
						   <h3 class="modal-title">Booked Service Detail</h3>
						   <button type="button" class="close-btn px-2 py-1 border-0 rounded-circle" data-bs-dismiss="modal"
							  aria-label="Close"><i class="fa fa-times fs-5"></i>
						   </button>
						</div>
						<hr>
						<div class="modal-body pt-0">
						   <table class="table w-100">
							  <thead></thead>
							  <tbody>
								 <tr>
									<td><strong>Order ID</strong></td>
									<td>{{ $val->service_order_id }}</td>
								 </tr>
								 <tr>
									<td><strong>Service</strong></td>
									<td>
									   Hardware Replacement, Installation & Configuration, Server
									</td>
								 </tr>
								 <tr>
									<td><strong>Service Date</strong></td>
									<td>{{ date('d-M-Y', strtotime($val->service_date )) }}</td>
								 </tr>
								 <tr>
									<td><strong>Order Date</strong></td>
									<td>{{ date('d-M-Y', strtotime($val->created_at )) }}</td>
								 </tr>
								 <tr>
									<td><strong>Service location</strong></td>
									<td>{{ $val->address.', '.$cust_city_name.', '.$cust_state_name.', '.$cust_country_name.'-'.$val->pincode }}</td>
								 </tr>
								 <tr>
									<td><strong>Service Status</strong></td>
									<td>Completed</td>
								 </tr>
								 <tr>
									<td><strong>Engineer Id</strong></td>
									<td>SPE0030</td>
								 </tr>
								 <tr>
									<td><strong>Engineer Adhar No.</strong></td>
									<td>626387663896</td>
								 </tr>
							  </tbody>
						   </table>
						</div>
					 </div>
				  </div>
				</div>   <!-- /Pop Up Modal End -->					
            @endforeach
		@endif
				</div>

			</div>
		</div>
		 
	</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
		$(".change_status").change(function (event) {
			event.preventDefault();
			var orderId = $(this).data("orderid");
			var status = $(this).val();
			changeStatus(orderId, status);
			// alert(orderid);
		});



        function changeStatus(orderid, status){
			$.ajax({
				url: "{{ route('engineer.updateOrderStatus') }}",
				type: "GET",
				data: {
					id: orderid,
					status: status,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
					toastr.success("Status Updated Successfully.");
				}
			});
		}

</script>

@endsection
