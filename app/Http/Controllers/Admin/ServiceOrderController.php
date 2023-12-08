<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\ServiceOrderRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class ServiceOrderController extends Controller
{
    private $serviceOrderRepository;
    public function __construct(ServiceOrderRepositoryInterface $serviceOrderRepository){
        $this->serviceOrderRepository = $serviceOrderRepository;
    }

    public function index(){
        $service_order_list = Order::orderBy('created_at', 'desc')->paginate('15');
        $engineer_list = User::where('user_type_id', 4)->orderBy('created_at', 'desc')->get();
        // dd($service_orders);
        return view('admin.service-order.index', compact('service_order_list', 'engineer_list'));
    }

    public function create(){
        return view('admin.service-order.create');
    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    // Pending Service Controller

    public function pendingserviceIndex(){
        return view('admin.service-pending.index');
    }

    public function pendingserviceCreate(){
        return view('admin.service-pending.create');
    }

    // Complete Service Controller

    public function complteserviceIndex(){
        return view('admin.service-complete.index');
    }

    public function complteserviceCreate(){
        return view('admin.service-complete.create');
    }

    // Decline Service Controller

    public function declineserviceIndex(){
        return view('admin.service-decline.index');
    }

    public function declineserviceCreate(){
        return view('admin.service-decline.create');
    }
}
