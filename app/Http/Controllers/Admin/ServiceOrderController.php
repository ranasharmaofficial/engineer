<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\ServiceOrderRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\ServiceSubCategory;

class ServiceOrderController extends Controller
{
    private $serviceOrderRepository;
    public function __construct(ServiceOrderRepositoryInterface $serviceOrderRepository){
        $this->serviceOrderRepository = $serviceOrderRepository;
    }

    public function index(Request $request){
        $service_order_list = $this->serviceOrderRepository->getServiceOrderList($request);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.index', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function viewOrderDetails($id){
        $service_order_details = $this->serviceOrderRepository->serviceOrderDetails($id);
        if($service_order_details){
            return view('admin.service-order.view_order_details', compact('service_order_details'));
        }
    }

   // Pending Service Controller

    public function pendingOrder(Request $request){
        $status = 0;
        $service_order_list = $this->serviceOrderRepository->getServiceOrder($request, $status);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.pending_order', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function ongoingOrder(Request $request){
        $status = 2;
        $service_order_list = $this->serviceOrderRepository->getServiceOrder($request, $status);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.ongoing_order', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function completedOrder(Request $request){
        $status = 3;
        $service_order_list = $this->serviceOrderRepository->getServiceOrder($request, $status);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.completed_order', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function declinedOrder(Request $request){
        $status = 4;
        $service_order_list = $this->serviceOrderRepository->getServiceOrder($request, $status);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.declined_order', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function cancelledOrder(Request $request){
        $status = 5;
        $service_order_list = $this->serviceOrderRepository->getServiceOrder($request, $status);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.cancelled_order', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
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

    public function assignServicetoEngineer(Request $request){
        $request->validate([
            'service_date' => 'required',
            'engineer_id' => 'required',
        ]);
        $assignEngineer = Order::where('id', $request->order_id)->first();
        $assignEngineer->engineer_id = $request->engineer_id;
        $assignEngineer->service_date = $request->service_date;
        $assignEngineer->status = 1;
        $assignEngineer->save();

        $order_details = OrderDetail::where('order_id', $request->order_id)
            ->update([
                      'engineer_id' => $request->engineer_id,
                      'status' => 1,
                ]);

        if (!$assignEngineer) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
             ]);

        }
        // return redirect()->back()->with(session()->flash('alert-success', 'Assigned Successfully'));
    }

    public function order_details(Request $request){
        $orderDetails = $this->serviceOrderRepository->getOrderDetails($request);
        return response()->json($orderDetails);
    }

    public function updateOrderStatus(Request $request){
        // dd($request->all());
        $order = Order::where('id', $request->id)->first();
        $order->status = $request->status;
        $order->save();

        $order_details = OrderDetail::where('order_id', $request->id)
            ->update([
                      'status' => $request->status,
                ]);
        return response()->json($order_details);
    }

    public function updatePaymentStatus(Request $request){
        $order_pay = Order::where('id', $request->id)->first();
        $order_pay->payment_status = $request->payment_status;
        $order_pay->save();
        return response()->json($order_pay);
    }
}
