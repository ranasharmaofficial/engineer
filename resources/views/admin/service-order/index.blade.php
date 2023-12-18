@extends('admin.include.master')
@section('title', 'ServiceOder List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 mt-3">
            <div class="row align-items-center justify-conent-between">
                <div class="col">
                    <div class="breadcrumb  "><a href="index.php">
                            <i class="fa fa-home" aria-hidden="true"></i> Dashboard</a> / Service
                    </div>
                </div>
                <div class=" col">
                    <a href="{{ route('admin.service-order.create') }}" class="btn btn-info float-right veiwbutton"><i class="fa fa-plus"
                            aria-hidden="true"></i> Add New Service</a>
                </div>

            </div>
        </div>
        <hr>
        <div class="main-panel card-header ">
            <div class="row">
                  <div class="col-lg-12 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                           <form class="pb-0" id="sort_blogs" action="" method="GET">
                              <div class="row gutters-5 align-items-center">
                                 <div class="col pr-0">
                                    <h5 class="mb-md-0 h6">All Order</h5>
                                 </div>
                                 <div class="col text-right">
                                    
                                   <a href="image/engineeringservice.png" class="btn btn-circle btn-info h-35" download >
                                    <span>Export in Excel</span>
                                    </a>
                                 </div>
                              </div>
                              <hr>
                              <div class="row gutters-5 align-items-center justify-content-between">
                                 <div class="col-md-2">
                                    <input type="text" name="ord_unique_id" class="form-control" placeholder="Order Id">
                                    <input type="hidden" name="_token" value="">
                                 </div>
                                 <div class="col-md-2">
                                    <input type="text" name="cus_name" class="form-control" placeholder="Customer Name" value="">
                                 </div>
                                 <div class="col-md-2">
                                    <input type="text" name="cus_email" class="form-control" placeholder="Customer Email">
                                 </div>
                                 <div class="col-md-2">
                                    <input type="text" name="emp_email" class="form-control" placeholder="Engineer Email">
                                 </div>
                                 <div class="col-md-2">
                                    <input type="text" name="emp_mobileno" class="form-control" placeholder="Engineer Mobile">
                                 </div>
                                 <div class="col-md-1 pl-0 text-right">
                                    <button type="submit" class="btn btn-danger btn-icon-text h-35">
                                    <i class="ti-file btn-icon-prepend"></i>
                                    Search
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <div class="table-responsive">
                              <table class="table table-striped">
                                 <thead>
                                    <tr>
                                       <th>
                                          Order Id
                                       </th>
                                       <th>
                                          Service Date
                                       </th>
                                       <th>
                                          Order Date
                                       </th>
                                       <th>
                                          Payment Status
                                       </th>
                                       <th>
                                          Order Status
                                       </th>
                                      <th>
                                          Action
                                       </th>
                                       <th>
                                          Option
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
								@if(count($service_order_list)>0)
									@foreach($service_order_list as $key => $item)
                                    <tr>
                                       <td class="py-1" onclick="">
									   {{ $item->service_order_id }}
                                       </td>
									   @if($item->engineer_id!=null)
										   @php
												$engineer_details = \App\Models\User::where('id', $item->engineer_id)->first();
											@endphp
										   <td class="py-1">
										   <b>Assigned to {{ $engineer_details->first_name.' '.$engineer_details->last_name}}</b>
										   </td>
									   @else
										   <td class="py-1">
											  Not Assigned Yet
										   </td>
									   @endif
                                       <td class="py-1">
                                          {{ date("d-M-Y", strtotime($item->created_at)) }}
                                       </td>
                                       <td>
                                          <select name="cars" id="cars" class="border-0 bg-danger text-white rounded-pill px-1">
                                             <option value="volvo">Cancelled</option>
                                             <option value="saab">Paid</option>
                                             <option value="saab">Unpaid</option>
                                          </select>
                                       </td>
                                       <td>
                                          <select name="cars" id="cars" class="border-0 bg-warning text-white rounded-pill px-1">
                                             <option value="volvo">Completed</option>
                                             <option value="saab">Upcoming</option> 
                                             <option value="saab">Pending</option> 
                                             <option value="saab">Active</option> 
                                             <option value="saab">Cancelled</option> 
                                          </select>
                                       </td>
                                       <td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$key+1}}">
												Assign Engineer
											</button>
                                       </td>
                                       <td class="text-center">
                                          <div class="dropdown dropdown-action"> 
                                             <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                             <div class="dropdown-menu dropdown-menu-right"> 
                                                <a class="dropdown-item" href="order-view.php"><i class="fas fa-eye m-r-5"></i> View Order</a> 
                                                <a class="dropdown-item" href="image/invoice.png" download ><i class="fas fa-download m-r-5"></i> Download Invoice</a> 
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Inactive_asset"><i class="fas fa-trash m-r-5"></i> Delete Order</a> 
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
			

	  
									@endforeach
								@endif
                                    
									
									@if(count($service_order_list)>0)
									@foreach($service_order_list as $key => $item)			
									<!-- Modal Start -->
      <div class="modal fade" id="staticBackdrop{{$key+1}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
				<form method="post" action="{{ route('admin.assignServicetoEngineer') }}">
					@csrf
				   <div class="modal-header">
					  <h5 class="modal-title" id="staticBackdropLabel">Assign Engineer   {{ $item->service_order_id }}</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					  </button>
				   </div>
				   <input type="hidden" name="order_id" value="{{ $item->service_order_id }}">
				   <div class="modal-body">
					  <div class="form-group">
						 <!--<div class="row mt-3">
							<div class="col-md-12">
							   <select class="form-control" name="service_cat_id" id="service_cat_id" >
								  <option value="">Select Domain</option>
								  <option value="2"> Backup</option>
								  <option value="3">Database</option>
								  <option value="3">Firewall</option>
							   </select>
							</div>
						 </div>
						 <div class="row mt-3">
							<div class="col-md-12">
							   <select class="form-control" name="service_cat_id" id="service_cat_id" >
								  <option value="">Select Sub Domain</option>
							   </select>
							</div>
						 </div>-->
						 <div class="row mt-3">
							<div class="col-md-12">
							   <select class="form-control" name="engineer_id" id="engineer_id" >
								  <option value="">Select Engineer</option>
								  @foreach($engineer_list as $item)
									<option value="{{ $item->id }}">{{ $item->first_name.' '.$item->last_name }}</option>
								  @endforeach
								  
							   </select>
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="modal-footer">
					  <button type="submit" class="btn btn-primary">Assign</button>
					  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				   </div>
				</form>
            </div>
         </div>
      </div>
      <!-- Modal End -->
	  @endforeach
	@endif
	
	
                                 </tbody>
                              </table>
                           </div>
                           <div class="aiz-pagination mt-3 w-100 ">
                              <div class="row justify-content-between">
                                 <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status" aria-live="polite">Showing 1 to 7 of 7 entries</div>
                                 </div>
                                 <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="geniustable_paginate">
                                       <ul class="pagination justify-content-end">
                                          <li class="paginate_button page-item previous disabled" id="geniustable_previous">
                                             <a href="#" aria-controls="geniustable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                          </li>
                                          <li class="paginate_button page-item active"><a href="#" aria-controls="geniustable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                          <li class="paginate_button page-item "><a href="#" aria-controls="geniustable" data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
                                          <li class="paginate_button page-item "><a href="#" aria-controls="geniustable" data-dt-idx="1" tabindex="0" class="page-link">3</a></li>
                                          <li class="paginate_button page-item next disabled" id="geniustable_next"><a href="#" aria-controls="geniustable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> 
             
        </div>
    </div>
</div>

@endsection

