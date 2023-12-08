<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BookingInterface\BookingRepositoryInterface;
use App\Repositories\Interfaces\WebInterface\CommonRepositoryInterface;

use App\Models\OrderDetail;

class BookingController extends Controller
{
    private $bookingRepository;
    public function __construct(BookingRepositoryInterface $bookingRepository, CommonRepositoryInterface $webRepository)
    {
        $this->bookingRepository = $bookingRepository;
        $this->webRepository = $webRepository;
    }

    public function createBooking(){
        $service_categories = $this->webRepository->getServiceCategory();
        return view('frontend.customer.add_booking', compact('service_categories'));
    }

    public function indexBooking(){
        $user_id = Session('LoggedCustomer')->user_id;
        $all_service_booking  = $this->bookingRepository->getServiceBooking($user_id);
        $service_booking = OrderDetail::where('user_id', $user_id)->orderBy('id', 'DESC')->get();

        return view('frontend.customer.index_booking', compact('all_service_booking', 'service_booking'));
    }

    public function upComingBooking(){
        return view('frontend.customer.upComing_booking');
    }

    public function ongoingBooking(){
        return view('frontend.customer.ongoing');
    }

    public function completeBooking(){
        return view('frontend.customer.completed_booking');
    }

    public function cancellBooking(){
        return view('frontend.customer.cancelled_booking');
    }
}
