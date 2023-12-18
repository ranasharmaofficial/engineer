
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
					<a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
				</li>
                <li class="submenu"> <a href="#"><i class="fa fa-wrench aiz-side-nav-icon"></i> <span>
                            Services Management</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ url('admin/service_category') }}">Service Category</a></li>
                        <li><a href="{{ url('admin/service-sub-category') }}">Service Sub Category</a></li>
                        <li><a href="{{ url('admin/service') }}">Service List</a></li>
                        <li><a href="{{ url('admin/sub-service') }}">Sub Service List</a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fa fa-user-tie aiz-side-nav-icon"></i> <span>
                            Staff </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('admin.engineer-list.index') }}">Engineer List</a></li>
                        <li><a href="engineer_working_hr.php">Engineer Working HR List</a></li>
                        <li><a href="{{  route('admin.staffs.index') }}">Manage Staff</a></li>
                        <li><a href="certified_by_engineer.php">Certified by Engineer</a></li>
                    </ul>
                </li>

                <!-- <li class="submenu"> <a href="#"><i class="fa fa-dolly-flatbed"></i> <span>
                           Service Area</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="service_state.php">State</a></li>
                        <li><a href="service_city.php">City</a></li>
                        <li><a href="service_area.php">Area</a></li>
                    </ul>
                </li> -->
                <li class="submenu"> <a href="#"><i class="fa fa-dolly-flatbed"></i> <span>
                            Service</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('admin.service-order.index') }}">All Services</a></li>
                        <li><a href="{{ route('admin.service-pending.index') }}">Pending Services</a></li>
                        <li><a href="{{ route('admin.service-complete.index') }}">Complete Service</a></li>
                        <li><a href="{{ route('admin.service-decline.index') }}">Declined Service</a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fa fa-dolly-flatbed"></i> <span>
                            Order</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="order_list.php">All Order List</a></li>
                        <li><a href="complete_order.php">Complete Order</a></li>
                        <li><a href="incomplete_order_list.php">Incomplete Order</a></li>
                        <li><a href="cancel_order_list.php">Cancelled Order</a></li>
                        <li><a href="decline_order_list.php">Decline Order</a></li>
                    </ul>
                </li>

                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Manage Customers</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="customer_list.php">Customer List</a></li>
                        <li><a href="client_list.php"> Our Client</a></li>

                        <!-- <li><a href="client_kyc_info.php">Customer KYC Info</a></li> -->
                        <!-- <li><a href="client_kyc_module.php">Customer KYC Module</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="transaction.php"><i class="fa fa-dharmachakra aiz-side-nav-icon"></i> <span>Transaction</span></a>
                </li>
                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Commissions</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="commission.php">Engineer Commissions</a></li>


                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Withdraws</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="withdraws.php">Withdraws Request</a></li>
                        <!-- <li><a href="withdraws-method.php">Withdraws Method</a></li> -->


                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Manage Blog</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="manage-blog-category.php">Category</a></li>
                        <li><a href="manage-blog-post.php">Post</a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Home Pages Manage </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="hero-section.php">Slider Section</a></li>
                        <li><a href="about-section.php">About Us Section</a></li>
                        <li><a href="about-counter.php">About Us Counter</a></li>
                        <li><a href="partner-section.php">Partners</a></li>
                        <li><a href="how_it_works.php">How It Works</a></li>
                        <li><a href="choose_us_section.php"> Why Choose Us</a></li>
                    </ul>
                </li>

                <li> <a href="deposits.php"><i class="fa fa-dharmachakra aiz-side-nav-icon"></i> <span>Deposits</span></a>
                </li>
                <li> <a href="#"><i class="fa fa-dharmachakra aiz-side-nav-icon"></i> <span>CMS Pages</span><span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ url('admin/pages') }}"> All Master Pages </a></li>
						<li><a href="{{ url('admin/page_sections') }}"> All Page Section </a></li>
						<li><a href="{{ url('admin/section_data') }}"> All Section Data </a></li>
						<li><a href="{{ url('admin/certificates') }}"> All Certificates </a></li>
                    </ul>
                </li>


                <li class="submenu"> <a href="#"><i class="fa fa-question aiz-side-nav-icon"></i> <span>
                            Enquiry </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="hire_requested.php">Hire Now Requestes</a></li>
                        <li><a href="enquiry_normal.php">Enquiry Normal</a></li>
                    </ul>
                </li>

                <li class="submenu"> <a href="#"><i class="fa fa-desktop aiz-side-nav-icon"></i> <span>
                            Website Setup</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ url('admin/website/header') }}">Header</a></li>
                        <li><a href="{{ url('admin/website/footer') }}">Footer</a></li>
                        <li><a href="{{ url('admin/website/social_media') }}">Social Media</a></li>
                        <li><a href="{{ route('admin.master-designation.index') }}">Master Designation</a></li>


                    </ul>
                </li>


                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Feedback / Complain</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">


                        <li><a href="customer_feedback.php">Customer Feedback List</a></li>
                        <li><a href="customer_complain.php">Customer Complain List</a></li>
                        <li><a href="feedback_admin.php">Feedback Admin List</a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Template</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="sms-template-list.php">SMS Template List</a></li>
                        <li><a href="email-template-list.php">Mailer Template List</a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span>
                            Package </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="package-listing.php"> Package Listing </a></li>
                    </ul>
                </li>

                <!-- <li> <a href="report.php"><i class="fa fa-file-alt aiz-side-nav-icon"></i> <span>Report</span></a> -->
                </li>

                <li> <a href="{{ url('admin/faqs') }}"><i class="fas fa-cg"></i> <span>FAQs</span></a>
                </li>

            </ul>
        </div>
    </div>
</div>
@if(false)
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li> <a target="_blank" href="{{ route('clear-cache') }}"><i class="fa fa-arrows-rotate"></i> <span>Clear Cache</span></a> </li>
				<li> <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
				<li> <a href="{{ route('admin.users.index') }}"><i class="fas fa-tachometer-alt"></i> <span>Users</span></a> </li>

				{{-- <li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Setup </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/designation') }}"> Designation </a></li>
					</ul>
				</li> --}}

				<li class="submenu"> <a href="#"><i class="fas fa fa-list-ul"></i> <span> Blogs </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/categories') }}"> Categories </a></li>
						<li><a href="{{ url('admin/blogs') }}"> All Blogs </a></li>
						<li><a href="{{ url('admin/blogs/create') }}"> Add New Blog </a></li>
					</ul>
				</li>

				<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Galleries </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/image_categories') }}"> All Image Category </a></li>
						<li><a href="{{ url('admin/galleries') }}"> All Galleries </a></li>
					</ul>
				</li>

                <li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Industry Sector </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ url('admin/industry_pages') }}"> All Industry Sector </a></li>
                        <li><a href="{{ url('admin/industry_page_sections') }}"> All Industry Section </a></li>
                        <li><a href="{{ url('admin/industry_section_data') }}"> All Industry Section Data</a></li>
                    </ul>
                </li>

				<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> CMS </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/pages') }}"> All Master Pages </a></li>
						<li><a href="{{ url('admin/page_sections') }}"> All Page Section </a></li>
						<li><a href="{{ url('admin/section_data') }}"> All Section Data </a></li>
						<li><a href="{{ url('admin/certificates') }}"> All Certificates </a></li>
					</ul>
				</li>

				<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Service </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/service') }}"> All Master Service </a></li>
						<li><a href="{{ url('admin/service_sections') }}"> All Service Section </a></li>
						<li><a href="{{ url('admin/service_section_data') }}"> All Service Section Data </a></li>

					</ul>
				</li>

				<li class="submenu"> <a class="{{ areActiveRoutes(['employee.index', 'employee.create', 'employee.edit'])}}" ><i class="fas fa-calculator"></i> <span> Product </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/product') }}"> All Master Product </a></li>
						<li><a href="{{ url('admin/product/create') }}"> Add Master Product </a></li>
						<li><a href="{{ url('admin/product_sections') }}"> All Product Section </a></li>
						<li><a href="{{ url('admin/product_sections/create') }}"> Add Product Section </a></li>
						<li><a href="{{ url('admin/product_section_data') }}"> All Product Section Data </a></li>
						<li><a href="{{ url('admin/product_section_data/create') }}"> Add Product Section Data </a></li>
					</ul>
				</li>

                <li class="submenu"> <a class="{{ areActiveRoutes(['employee.index', 'employee.create', 'employee.edit'])}}" ><i class="fas fa-calculator"></i> <span> Partner </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/partner') }}"> All Master Partner </a></li>
						<li><a href="{{ url('admin/partner/create') }}"> Add Master Partner </a></li>
						<li><a href="{{ url('admin/partner_sections') }}"> All Partner Section </a></li>
						<li><a href="{{ url('admin/partner_sections/create') }}"> Add Partner Section </a></li>
						<li><a href="{{ url('admin/partner_section_data') }}"> All Partner Section Data </a></li>
						<li><a href="{{ url('admin/partner_section_data/create') }}"> Add Partner Section Data </a></li>

					</ul>
				</li>

                <li class="submenu"> <a class="{{ areActiveRoutes(['employee.index', 'employee.create', 'employee.edit'])}}" ><i class="fas fa-calculator"></i> <span> Solution </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/solutions') }}"> All Master Solution </a></li>
						<li><a href="{{ url('admin/solutions/create') }}"> Add Master Solution </a></li>
						<li><a href="{{ url('admin/solution_page_sections') }}"> All Solution Section </a></li>
						<li><a href="{{ url('admin/solution_page_sections/create') }}"> Add Solution Section </a></li>
						<li><a href="{{ url('admin/solution_section_data') }}"> All Solution Section Data </a></li>
						<li><a href="{{ url('admin/solution_section_data/create') }}"> Add Solution Section Data </a></li>

					</ul>
				</li>

				<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Pricing  </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						{{-- <li><a href="{{ url('admin/pricing/price-type/list') }}"> Pricing Type </a></li> --}}
						<li><a href="{{ url('admin/pricing/list') }}"> Pricing List </a></li>
						<li><a href="{{ url('admin/pricing/add') }}"> Add Pricing </a></li>
					</ul>
				</li>

				<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Testimonials </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/testimonials') }}"> All Testimonials </a></li>
						<li><a href="{{ url('admin/testimonials/create') }}"> Add New Testimonial </a></li>
                        <li><a href="{{ url('admin/testimonial/videos') }}"> All Video Testimonials </a></li>
					</ul>
				</li>

				<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> FAQ </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/faq-category-list') }}"> All FAQ Category </a></li>
						<li><a href="{{ url('admin/faq-category') }}"> Add FAQ Category </a></li>
						<li><a href="{{ url('admin/faqs') }}"> All FAQ </a></li>
						<li><a href="{{ url('admin/faqs/create') }}"> Add New FAQ </a></li>
					</ul>
				</li>

				<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Staffs </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/staffs') }}"> All Staffs </a></li>
						<li><a href="{{ url('admin/staffs/create') }}"> Add New Staff </a></li>
					</ul>
				</li>

				<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> All Enquiries </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/customer/leads') }}"> All Customer Leads </a></li>
						<li><a href="{{ url('admin/career/enquiry') }}"> All Career Enquiry </a></li>
						<li><a href="{{ url('admin/hire_team/enquiry') }}"> All Hire Team </a></li>
						<li><a href="{{ url('admin/quotation-list') }}"> All Quotation List </a></li>
						<li><a href="{{ url('admin/schedule-meeting-list') }}"> Scheduled Meeting List </a></li>
						<li><a href="{{ url('admin/subscribers') }}"> All Subscribers </a></li>
						<li><a href="{{ url('admin/price/enquiry') }}"> All Price Enquiry </a></li>
					</ul>
				</li>

				<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Website Setup </span> <span class="menu-arrow"></span></a>
					<ul class="submenu_class" style="display: none;">
						<li><a href="{{ url('admin/website/header') }}"> Header </a></li>
						<li><a href="{{ url('admin/website/footer') }}"> Footer </a></li>
						<li><a href="{{ url('admin/website/social_media') }}"> Social Media </a></li>
						{{-- <li><a href="{{ url('admin/website/cms/contact') }}"> Contact Us </a></li> --}}
					</ul>
				</li>

			</ul>
		</div>
	</div>
</div>

@endif
