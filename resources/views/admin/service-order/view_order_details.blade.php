@extends('admin.include.master')

@section('title', 'ServiceOder List')

@section('content')


<div class="page-wrapper">
      <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
          <div class="row align-items-center">
            <div class="col">
              <div class="breadcrumb "><a href="{{ url('admin/service-order') }}"><i class="fa fa-home" aria-hidden="true"></i> Order</a>/ Order Details</div>
            </div>
            <div class="col">
              <a href="{{ url('admin/service-order') }}" class="btn btn-info float-right veiwbutton ">Back</a>
            </div>
          </div>
        </div>
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="card1">
              <div class="row gutters-5 align-items-center">
                <div class="col pr-0">
                  <h5 class="mb-md-0 h6">Order Detail</h5>
                </div>

                <div class="col">
                </div>
              </div>
            </div>
            <hr>
				@php
					if($service_order_details->country!=null)
					{
						$cust_country_name = \App\Models\Country::where('id', $service_order_details->country)->pluck('name')->first();
					}else{
						$cust_country_name = '';
					}
					
					if($service_order_details->state!=null)
					{
						$cust_state_name = \App\Models\State::where('id', $service_order_details->state)->pluck('name')->first();
					}else{
						$cust_state_name = '';
					}
					
					if($service_order_details->city!=null)
					{
						$cust_city_name = \App\Models\City::where('id', $service_order_details->city)->pluck('name')->first();
					}else{
						$cust_city_name = '';
					}
					
				@endphp
							
							
					
					
					
            <div class="card1">

              <div class="row mb-4">

                <div class="col-md-6 ">
                  <div class="img-header mb-3">
                    <h6>Order Info</h6>
                  </div>
                  <div class="table-responsive show-table">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th>Service</th>
                          <td>new installation and configuration</td>
                        </tr>
                        <tr>
                          <th>Service Date</th>
                          <td>{{ date('d-M-Y', strtotime($service_order_details->service_date )) }}</td>
                        </tr>

                        <tr>
                          <th>Order Date</th>
                          <td>{{ date('d-M-Y', strtotime($service_order_details->created_at)) }}</td>
                        </tr>
                        <tr>
                          <th>Service Location</th>
                          <td>{{ $service_order_details->address.', '.$cust_city_name.', '.$cust_state_name.', '.$cust_country_name.'-'.$service_order_details->pincode }}</td>
                        </tr>

                        <tr>
                          <th>Service Status</th>
                          <td>
								@if($service_order_details->status=='0')
									<p class="font-weight-bold text-danger">Pending</p>
								@elseif($service_order_details->status=='1')
									<p class="font-weight-bold text-primary">Assign to Engineer</p>
								@elseif($service_order_details->status=='2')
									<p class="font-weight-bold text-warning">Ongoing</p>
								@elseif($service_order_details->status=='3')
									<p class="font-weight-bold text-success">Completed</p>
								@elseif($service_order_details->status=='4')
									<p class="font-weight-bold text-danger">Declined</p>
								@elseif($service_order_details->status=='5')
									<p class="font-weight-bold text-danger">Cancelled</p>
								@elseif($service_order_details->status=='6')
									<p class="font-weight-bold text-info">Upcoming</p>
								@endif
						  </td>
                        </tr>
						<tr>
                          <th>Payment Status</th>
                          <td>{{ $service_order_details->payment_status }}</td>
                        </tr>
                        <tr>
                          <th>Payment reference No.</th>
                          <td></td>
                        </tr>
                        <tr>
                          <th>Payment Source</th>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="img-header mb-3">
                    <h6>Order Including Services</h6>
                  </div>
				@php
					$service_details_list = \App\Models\OrderDetail::where('order_id', $service_order_details->id)->get();
					// dd($service_details_list);
				@endphp
                  <ul class="list-unstyled fs-13">
					@if(count($service_details_list)>0)
						@foreach($service_details_list as $val)
					
					@php

							// $total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');
							// $total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');

							 
						$category = $val->category_id;
						$subcategory = $val->subcategory_id;
						$service = $val->service_id;
						$service_category = \App\Models\ServiceCategory::where('id', $category)->first();
						$service_subcategory = \App\Models\ServiceSubCategory::where('id', $subcategory)->first();
						$service_name = \App\Models\Service::where('id', $service)->first();
					@endphp
					
					
							<li class="mb-2">
							  <i class="fas fa-check"></i> {{ $service_subcategory->name }} , {{ $service_name->name }}
							</li>
						@endforeach
					@endif
                   
                  </ul>
                </div>
              </div>
			  
							
							
              <div class="row d-flex justify-content-between mt-5">
                <div class="col-md-6 ">
                  <h6 class="text-left">Customer Information</h6>
                  <div class="row d-flex justify-content-between">
                    <div class="col-md-4">
                      <div class="user-image">
                        <img class="mb-3" height="110" src="{{ static_asset('uploads/customer/'.$service_order_details->profile_pic) }}" onerror="this.onerror=null;this.src='https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg';"
                          alt="No Image">
                        <a class="mybtn1 btn btn-primary" data-email="seller@gmail.com" data-toggle="modal"
                          data-target="#vendorform" href="">Send Message</a>
                      </div>
                    </div>
                    <div class="col-md-8 ">
                      <div class="table-responsive show-table">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th>User Id</th>
                              <td>{{ $service_order_details->user_id }}</td>
                            </tr>
                            <tr>
                              <th>Username</th>
                              <td>{{ $service_order_details->username }}</td>
                            </tr>
                            <tr>
                              <th>User Contact</th>
                              <td>{{ $service_order_details->mobile }}</td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td>{{ $service_order_details->email }}</td>
                            </tr>
                            <tr>
                              <th>Address</th>
                              <td>{{ $service_order_details->address }}</td>
                            </tr>

                            <tr>
                              <th>Country</th>
                              <td>{{ $cust_country_name }}</td>
                            </tr>
							
							<tr>
                              <th>State</th>
                              <td>{{ $cust_state_name }}</td>
                            </tr>
							
							<tr>
                              <th>City</th>
                              <td>{{ $cust_city_name }}</td>
                            </tr>

                            <tr>
                              <th>Pin Code</th>
                              <td>{{ $service_order_details->pincode }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h6 class="text-left">Engineer Information</h6>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="user-image">
                        <img class="mb-3" style="height:130px;" src="{{ static_asset('uploads/customer/'.$service_order_details->eng_profile_pic) }}" onerror="this.onerror=null;this.src='https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg';" alt="No Image">
                        <a class="mybtn1 btn btn-primary" data-email="buyer@gmail.com" data-toggle="modal"
                          data-target="#vendorform" href="">Send Message</a>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="table-responsive show-table">
                        <table class="table">
							@php
								if($service_order_details->eng_country!=null)
								{
									$eng_country_name = \App\Models\Country::where('id', $service_order_details->eng_country)->pluck('name')->first();
								}else{
									$eng_country_name = '';
								}
								
								if($service_order_details->eng_state!=null)
								{
									$eng_state_name = \App\Models\State::where('id', $service_order_details->eng_state)->pluck('name')->first();
								}else{
									$eng_state_name = '';
								}
								
								if($service_order_details->eng_city!=null)
								{
									$eng_city_name = \App\Models\City::where('id', $service_order_details->eng_city)->pluck('name')->first();
								}else{
									$eng_city_name = '';
								}
								
							@endphp
                          <tbody>
                            <tr>
                              <th>Engineer Id</th>
                              <td>{{ $service_order_details->eng_username }}</td>
                            </tr>
                            <tr>
                              <th>Engineer Name</th>
                              <td>{{ $service_order_details->eng_first_name }} {{ $service_order_details->eng_last_name }}</td>
                            </tr>
                            <tr>
                              <th>Engineer Contact</th>
                              <td>{{ $service_order_details->eng_mobile }}</td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td>{{ $service_order_details->eng_email }}</td>
                            </tr>
                            <tr>
                              <th>Engineer Adhar No.</th>
                              <td>{{ $service_order_details->eng_aadhar }}</td>
                            </tr>
                            <tr>
                              <th>Address</th>
                              <td>{{ $service_order_details->eng_address }}</td>
                            </tr>

                            <tr>
                              <th>Country</th>
                              <td>{{ $eng_country_name }}</td>
                            </tr>
							<tr>
                              <th>State</th>
                              <td>{{ $eng_state_name }}</td>
                            </tr>
							<tr>
                              <th>City</th>
                              <td>{{ $eng_city_name }}</td>
                            </tr>

                            <tr>
                              <th>Pin Code</th>
                              <td>{{ $service_order_details->eng_pincode }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
		@include('admin.include.topfoot')
      </div>
    </div>
	  


@endsection

