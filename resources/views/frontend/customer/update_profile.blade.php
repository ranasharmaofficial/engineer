@extends('frontend.layouts.master')
@section('title') Profile  @endsection
@section('content')
@include('frontend.customer.partials.dash_header')


<div class="main-wrapper">

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
                    @include('frontend.customer.partials.left-sidebar')
                </div>
                <!-- /Customer Menu -->
                <div class="col-md-8 col-lg-9">
                    <div class="fomr-news">
                        <h6 class="user-title">Profile Picture</h6>
                        <div class="pro-picture">
                            <div class="pro-img">
                                <img src="{{ static_asset('assets/assets_web/img/profiles/avatar-02.jpg')}}" alt="user">
                            </div>
                            <div class="pro-info">
                                <div class="d-flex align-items-center justify-content-start">
									<input type="file" id="updateImage" hidden>
                                    <button class="btn btn-primary mt-3"><label for="updateImage">Update Image</label></button>
									
								{{-- <div class="img-upload w-50">
                                        <i class="fa fa-cloud-upload me-1"></i>Upload
                                        <input type="file" hidden id="updateImage" name="profile_pic">
                                    </div>
									 <button class="btn btn-primary mt-3"><label for="updateImage">Update
                                                Image</label></button> --}}
                                    <a href="#" class="btn-remove btn-light fs-14 px-3 border py-1 rounded">Remove</a>
                                </div>
                                <p class="mt-2">
                                    *image size should be at least 320px big,and less then 500kb. Allowed files .png and .jpg.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="white_block fs-14 ">
                        <div class="widget-title">
                            <h4>General Information</h4>
                        </div>
                        <form action="{{ route('customer.updateProfileDetails') }}" method="post" class="ng-untouched forms-new">
							@csrf
                            <div class="row">
							
								<div class="col-md-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
								
                                <div class="col-md-6">
                                    <label for="cus_cname">Company Name</label>
                                    <input name="company_name" type="text" value="{{ $profile->company_name }}"
                                        placeholder="Please enter your company name"
                                        class="form-control ng-untouched ng-pristine ng-valid">
                                </div>
								
								<div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" value="{{ $profile->email }}"
                                        class="form-control ng-untouched ng-pristine ng-valid">
                                </div>
                                <div class="col-md-6">
                                    <label for="cus_gst">GST number</label>
                                    <input name="gst" type="text" value="{{ $profile->gst_number }}" class="form-control ng-untouched ng-pristine ng-valid">
                                </div>
                                {{--<div class="col-md-6">
                                    <label for="cus_alt_email">Alternate Email</label>
                                    <input name="alt_email" type="email" value="{{ $profile->email }}" class="form-control">
                                </div>--}}
                                <div class="col-md-6">
                                    <label for="cus_address">Address:</label>
                                    <input name="address" value="{{ $profile->address }}" class="form-control">
									<small class="form-text text-danger">@error('address') {{ $message }} @enderror </small>
                                </div>
                                <div class="col-md-6">
                                    <label for="cus_phone">Phone Number</label>
                                    <input readonly type="number" value="{{ $profile->mobile }}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="cus_alt_phone">Alternate Phone Number</label>
                                    <input name="alt_phone" type="number" value="{{ $profile->alt_phone }}" pattern="[6789][0-9]{9}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="cus_country">Country:</label>
                                    <select name="country" id="country_id" class="form-control">
                                        <option value="">Select Country</option>
										@foreach(getCountryList() as $item)
											<option value="{{ $item->id }}"> {{ $item->name }} </option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="cus_state">State</label>
                                    <select name="state" id="state_id" class="select form-control ">
                                        <option value="">Select State</option>
                                         
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="cus_city">City</label>
                                    <select name="city" id="city-dropdown" class="select form-control ">
                                        <option value="">Select City</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="cus_zipcode">Pin Code</label>
                                    <input name="pincode"  type="number" value="{{ $profile->pincode }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <p>
                                    By submitting you agree to our <a href="#olicy" target="_blank">Privacy Policy</a> and <a href="#terms-and-conditions" target="_blank">T&amp;C </a>.
                                </p>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn login-butto1n btn-dark bg-dark text-white px-3 py-2 mx-2">Cancel</button>
                                <button type="submit" class="btn login-button btn-danger text-white px-3 py-2">Save
                                    Change</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<script>

		

</script>
