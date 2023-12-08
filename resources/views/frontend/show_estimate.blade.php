@extends('frontend.layouts.master')
@section('title') Show Estimate @endsection



@section('content')
    
	 
		@include('frontend.includes.header')
	
	<section class="blog-banner">
         <div class="container">
            <div class="blog-about">
               <h2 class="breadcrumbs-custom-title text-white">Cost Estimate</h2>
               <ul class="breadcrumbs-custom-path">
                  <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
                  <li class="active" style="color:#ff008a;">Cost Estimate</li>
               </ul>
            </div>
         </div>
      </section>
      <div class="container mt-4">
         <div class="row">
            <div class="col-12">
               <p class="p-4 text-center bg-secondary bg-opacity-10 rounded border fs-5 fw-bold">
                  Pick the kind of service you'r looking for. Give us a few detail about your requirement. Hit
                  calculate. You'r done.<br>
                  Your service estimate is ready, even before you walk out of the door.
               </p>
            </div>
         </div>
		@if(count(serviceCategoryList())>0)
			@foreach(serviceCategoryList() as $row)
				@php
					// dd($temp_order_details);
					// $tempOrderDetails = \App\Models\TempOrderDetail::where('category_id', $row->id)->where('temp_order_id', $temp_order_id)->where('status', 1)->get();
					
			$tempOrderDetails = \App\Models\TempOrderDetail::select('temp_order_details.*', 'subcat.name as subcategory_name', 's.name as service_name')
				->leftJoin('service_subcategories as subcat', 'subcat.id', '=', 'temp_order_details.subcategory_id')
				->leftJoin('services as s', 's.id', '=', 'temp_order_details.service_id')
				->where('temp_order_details.category_id', $row->id)
				->where('temp_order_id', $temp_order_id)
				->where('temp_order_details.status', 1)
				->latest()->get();
			
				@endphp
				@if(count($tempOrderDetails)>0)
					<div>
						 <h3 class="text-pink-dark mb-4"> {{ $row->name }} Service Cost </h3>
						 <!--<hr>-->
						 <div cellpadding="4" class="table-responsive">
							<table class="table ">
							   <thead>
								  <tr style="padding-top: .5em; padding-bottom: .5em; width: 2%;">
									 <th style="width: 20%; font-size:16px;">Domain Name</th>
									 <th style="width: 20%; font-size:16px;">Subdomain Name</th>
									 <th style="width: 20%; font-size:16px;">Activity</th>
									 <th style="width: 20%; font-size:16px;">Model</th>
									 <th style="width: 20%; font-size:16px;">Qty</th>
									 <th class="text-end" style="width: 20%; font-size:16px;">Price (INR)</th>
								  </tr>
							   </thead>
							   <tbody>
								@foreach($tempOrderDetails as $item)
								  <tr class="borderless">
									 <td>{{ $item->subcategory_name }}</td>
									 <td>{{ $item->service_name }}</td>
									 <td>{{ $item->activity_type }}</td>
									 <td>{{ $item->model }}</td>
									 <td>{{ $item->qty }}</td>
									 <td class="text-end">{{ $item->total_price }}</td>
								  </tr>
								 @endforeach
								   
							   </tbody>
							</table>
						 </div>
					</div>
				@endif
			@endforeach
		@endif
		 
         <div id="service_cost_focus" class="well well-sm d-flex justify-content-between">
            Total Spare Parts (Including All Taxes) 
            <span class="text-end"><b><span class="total_spare_parts">2480</span></b></span>
         </div>
         <div class="well well-sm d-flex justify-content-between">
            Cumulative Charges for Service Cost 
            <span class="text-end"><b><span class="cumulative_charges">2480</span></b></span>
         </div>
         <div class="row mt-3">
            <div class="col-md-4 mt-2">
               <a href="#r" target="_blank"
                  class="locate-dealer btn btn-default btn-info btn-block btn-sm bg-pink w-100 fs-5" style="height:44px;">RESET</a>
            </div>
            <div class="col-md-4 mt-2">
               <a onclick="printPdf(1); return false;"
                  class="btn btn-default btn-info btn-block btn-sm print-btn bg-pink w-100 fs-5" style="height:44px;">VIEW &amp; PRINT PDF</a>
            </div>
            <div class="col-md-4 mt-2">
               <a href="{{ url('service-booking-first/'.$temp_order_id) }}" class="book-service btn btn-default btn-info btn-block btn-sm bg-pink w-100 fs-5" style="height:44px;">BOOK A SERVICE</a>
            </div>

         </div>
         <div class="row my-3">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group text-left">
               <h4><strong>* Disclaimer:-</strong></h4>
               <ol class="disclaimer p-0 m-0" style="display: block;">
                  <li>This webpage doesn’t show information on parts availability For availability of parts and spares,
                     please contact nearest Ford authorized Dealer.</li>
                  <li>Periodic Maintenance Service Cost ('Service Cost') means the cost of labour, maximum retail price
                     of listed parts and consumables, including all national taxes. Local taxes like Kerala Flood CESS
                     will be charged extra,</li>
                  <li>Any additional items that are not included in the Service Cost but needed as per Periodic
                     Maintenance schedule, will be charged extra. For more details, contact Ford authorized Dealer.</li>
                  <li>The cost of Wheel Balancing &amp; Alignment are additional</li>
                  <li>For the models where the Service Cost is not shown, contact Ford authorized Dealer.</li>
                  <li>The Service Costs indicated are applicable only for base version variant.</li>
                  <li>The cost of Windscreen Wash Fluid is additional.</li>
                  <li>The Service Cost is based on the vehicle model, service interval and mileage selected by you.
                     Please select the correct details.</li>
                  <li>Brake Fluid is replaced every 2years for vehicles launched before the year 2017 and to be replaced
                     every 3 years for vehicles launched after the year 2017.</li>
               </ol>
            </div>
         </div>
      </div>
	
	
	 
@endsection

