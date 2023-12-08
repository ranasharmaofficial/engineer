<div class="settings-widget">
	<div class="settings-header">
		<div class="settings-img">
			<img src="{{ static_asset('assets/assets_web/img/profiles/avatar-02.jpg')}}" alt="user">
		</div>
		<h6>{{ Session('LoggedEngineer')->first_name.' '.Session('LoggedEngineer')->last_name }}</h6>
		<p>Member Since Oct 2022</p>
	</div>
	<div class="settings-menu">
		<ul>
			<li>
				<a href="engineer-dashboard.php" class="active">
					<i class="fa fa-th-large" aria-hidden="true"></i> <span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="engineer-profile.php">
					<i class="fa fa-th-large" aria-hidden="true"></i> <span> My Profile</span>
				</a>
			</li>
			<li>
				<a href="engineer-change-password.php">
					<i class="fa fa-th-large" aria-hidden="true"></i> <span> Change Password</span>
				</a>
			</li>
			<li>
				<a href="working-hour.php">
					<i class="fa fa-th-large" aria-hidden="true"></i> <span>Working Hour</span>
				</a>
			</li>
			<li>
				<div class="accordion bg-transparent border-none border-0" id="accordionExample">
					<div class="accordion-item bg-transparent border-none border-0">
						<h2 class="accordion-header bg-transparent" id="headingThree">
							<a href="#my-jobs.php" class="collapsed dropdown-toggle" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<i class="fa fa-th-large" aria-hidden="true"></i> <span> My Jobs</span>
							</a>
						</h2>
						<div id="collapseThree" class="accordion-collapse collapse bg-transparent"
							aria-labelledby="headingThree" data-bs-parent="#accordionExample">

							<ul class="ps-4 py-3">

								<li><a href="upcoming-jobs.php"><i class="fa fa-th-large" aria-hidden="true"></i> 
										<span> Up-Coming Jobs</span>
									</a>
								</li>
								<li><a href="ongoing-jobs.php"><i class="fa fa-th-large" aria-hidden="true"></i>
										<span> On-going Jobs</span>
									</a>
								</li>
								<li><a href="completed-jobs.php"><i class="fa fa-th-large" aria-hidden="true"></i>
										<span> Completed Jobs</span>
									</a>
								</li>
								<li><a href="declined-jobs.php"><i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Declined Jobs</span>
									</a>
								</li>
								<li><a href="earned-revenue.php"><i class="fa fa-th-large" aria-hidden="true"></i>
										<span> Earned Revenue</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</li>
			<li>
				<a href="{{ url('logout') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i> <span>Logout</span>
				</a>
			</li>
		</ul>
	</div>
</div>