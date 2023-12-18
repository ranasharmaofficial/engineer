<div class="settings-widget">
	<div class="settings-header">
		<div class="settings-img">
			<img src="{{ static_asset('assets/assets_web/img/profiles/avatar-02.jpg')}}" alt="user">
		</div>
		<h6>{{ Session('LoggedCustomer')->first_name.' '.Session('LoggedCustomer')->last_name }}</h6>
		<p>Member Since Sep 2021</p>
	</div>
	<div class="settings-menu">
		<ul>
			<li>
				<a href="{{ url('customer/customer-dashboard') }}" class="active">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('customer.profile') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span>My Profile</span>
				</a>
			</li>
			<li>
				<a href="{{ route('customer.change-password') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span> Change Password</span>
				</a>
			</li>
			<li>
				<div class="accordion bg-transparent border-none  border-0" id="accordionExample">
					<div class="accordion-item bg-transparent border-none  border-0">
						<h2 class="accordion-header bg-transparent" id="headingThree">
							<a href="#my-booking.php" class="collapsed dropdown-toggle" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<i class="fa fa-th-large" aria-hidden="true"></i> <span> My Bookings</span>
							</a>
						</h2>
						<div id="collapseThree" class="accordion-collapse collapse bg-transparent"
							aria-labelledby="headingThree" data-bs-parent="#accordionExample">
							<ul class="ps-4 py-3">
								<li>
									<a href="{{ route('customer.add_booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Book New Service</span>
									</a>
								</li>
								<li>
									<a href="{{ route('customer.index_booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>All Booking</span>
									</a>
								</li>
								<li>
									<a href="{{ route('customer.upComing_booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Up-coming Services</span>
									</a>
								</li>
								<li>
									<a href="{{ url('customer/ongoing-booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Ongoing Services</span>
									</a>
								</li>
								<li>
									<a href="{{ url('customer/completed-booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Completed Services</span>
									</a>
								</li>
								<li>
									<a href="{{ url('customer/pending-booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Pending Services</span>
									</a>
								</li>
								<li>
									<a href="{{ url('customer/cancelled-booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Cancelled Services</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</li>
			<li>
				<a href="{{ route('customer.feedback') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span>Feedback</span>
				</a>
			</li>
			<li>
				<a href="{{ route('customer.complain') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span>Complain</span>
				</a>
			</li>
			<li>
				<a href="{{ url('logout') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span>Logout</span>
				</a>
			</li>
		</ul>
	</div>
</div>
