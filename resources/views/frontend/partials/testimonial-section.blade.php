<section class="customer-reviews-six-section">
    <div class="container">
        <div class="section-heading section-heading-six">
            <div class="row align-items-end">
                <div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
                    <div class="reason-six">
                        <img src="{{ static_asset('assets/assets_web/img/technology.png') }}" alt="tech-img"
                            style="height: 50px;">
                        <p>AFFORDABLE &amp; RELIABLE</p>
                    </div>
                    <h2>Customer <span>Reviews</span></h2>
                </div>
                <div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
                    <a href="{{ url('testimonial') }}" class="afford-btn">Explore All</a>
                </div>
            </div>
        </div>
        <div id="carouselExampleControls"class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="d-flex justify-content-around overflow-hidden" style="height: 400px;">
                            @if (count(testimonialList()) > 0)
                            @foreach (testimonialList() as $key => $item)
								<div class="py-3 col-sm-12 col-md-6 col-lg-4 mb-0">
									<div class="customer-review-main-six mb-0 card">
										<div class="customer-review-top">
											<img src="{{ static_asset($item->img) }}" alt="">
											<h5>{{ $item->name }}</h5>
											{!! $item->designation !!}
										</div>
										<div class="customer-review-bottom">
											<div class="rating">
												<i class="fa fa-star text-warning" aria-hidden="true"></i>
												<i class="fa fa-star text-warning" aria-hidden="true"></i>
												<i class="fa fa-star text-warning" aria-hidden="true"></i>
												<i class="fa fa-star text-warning" aria-hidden="true"></i>
												<i class="fa fa-star star-space" aria-hidden="true"></i>
											</div>
										</div>
										<div class="customer-review-quote">
											<img src="{{ static_asset('assets/assets_web/img/icons/reviews-quote.svg')}}" alt="">
										</div>
									</div>
								</div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev slider-button" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next slider-button" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>
</section>
