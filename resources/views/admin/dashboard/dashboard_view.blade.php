@extends('admin.include.master')
@section('title', 'Dashboard')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
			<div class="page-header mb-0 pt-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="breadcrumb "><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a> </div>
                        </div>
                        <div class="col"> </div>
                    </div>
                </div>
                <hr> 
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1 card_border_12">
							<div class="small-box bg-info px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<div><h3 class="text-white">13</h3></div>
									<div><i class="bi-people text-white fx-4"></i></div>
								</div>
									<p class="text-white">Registered Client</p>
								</div>
							 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1 card_border_12">
						<div class="small-box bg-warning  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<div><h3 class="text-white">150</h3></div>
									<div bg-light><i class="bi-box text-white fs-4"></i></div>

									</div>
									<p class="text-white">Registered Engineers</p>
								</div>
								 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1">
								<div class="small-box bg-danger  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">3</h3>
									<i class="bi-briefcase-fill text-white fs-4"></i>
									</div>
									<p class="text-white">Current Jobs</p>
								</div>
								 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1">
						<div class="small-box bg-success  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">111</h3>
									<i class="bi-chevron-compact-right text-white fs-4"></i>
								</div>
									<p class="text-white">Upcoming Jobs</p>
								</div>
							 

							</div>
						</div>
					</div>
 
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box mt-1 ">
								<div class="small-box bg-danger  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">39</h3>
									<i class="bi-award-fill text-white fs-4"></i>
								</div>
									<p class="text-white">Completed Jobs</p>
								</div>
							 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box mt-1  ">
						<div class="small-box bg-primary  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">150</h3>
									<i class="bi-bag-fill text-white fs-4"></i>
</div>
									<p class="text-white">Total Orders</p>
								</div>
								 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1">
						<div class="small-box bg-info  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">77</h3>
									<i class="bi-bag-x-fill text-white fs-4"></i>
								</div>
									<p class="text-white">Total Pending Order</p>
								</div>
								 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1">
						<div class="small-box bg-warning  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">150</h3>
									<i class="bi-bag-plus-fill text-white fs-4"></i>
</div>
									<p class="text-white">Total Complete Order</p>
								</div>
								  
							</div>
						</div>
					</div>
				</div>

<!-- 
				<div class="row">
					<div class="col-md-12 col-lg-6">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Visitors</h5> 
							</div>
							<div class="card-body">
								<div id="line-chart"></div>
							</div>
						</div>
					</div>

					<div class="col-md-12 col-lg-6">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Service </h5> 
							</div>
							<div class="card-body">
								<div id="donut-chart"></div>
							</div>
						</div>
					</div>
				</div> -->

				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Ongoing Jobs</h5> 
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Customer</th>
												<th>Customer&nbsp;contact</th>
												<th>Engineer</th>
												<th>Engineer&nbsp;contact</th>
												<th>Order&nbsp;date</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Ashu & CO</td>
												<td>74584375347</td>
												<td>Nitya Pandey</td>
												<td>08760854149</td>
												<td>08/02/2023</td>

											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card card-chart">
							<div class="card-header">
								<h5 class="mb-md-0 h6">Upcoming job</h5>  
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Customer</th>
												<th>Customer&nbsp;contact</th>
												<th>Engineer</th>
												<th>Engineer&nbsp;contact</th>
												<th>Order&nbsp;date</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Recently Completed Jobs</h5>   
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Customer</th>
												<th>Customer&nbsp;contact</th>
												<th>Engineer</th>
												<th>Engineer&nbsp;contact</th>
												<th>Order&nbsp;date</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Ashu & CO</td>
												<td>74584375347</td>
												<td>Nitya Pandey</td>
												<td>08760854149</td>
												<td>08/02/2023</td>
											</tr>

											<tr>
												<td>Ashu & CO</td>
												<td>74584375347</td>
												<td>Nitya Pandey</td>
												<td>08760854149</td>
												<td>08/02/2023</td>
											</tr>

											<tr>
												<td>Ashu & CO</td>
												<td>74584375347</td>
												<td>Nitya Pandey</td>
												<td>08760854149</td>
												<td>08/02/2023</td>
											</tr>

											<tr>
												<td>Ashu & CO</td>
												<td>74584375347</td>
												<td>Nitya Pandey</td>
												<td>08760854149</td>
												<td>08/02/2023</td>
											</tr>

											<tr>
												<td>Ashu & CO</td>
												<td>74584375347</td>
												<td>Nitya Pandey</td>
												<td>08760854149</td>
												<td>08/02/2023</td>
											</tr>
											<tr>
												<td>Ashu & CO</td>
												<td>74584375347</td>
												<td>Nitya Pandey</td>
												<td>08760854149</td>
												<td>08/02/2023</td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
				
				<?php // include('include/topfoot.php') ?>

			</div>
		</div>
@endsection
