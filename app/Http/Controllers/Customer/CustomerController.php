<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CustomerInterface\CustomerRepositoryInterface;
use App\Models\UserLogin;
use App\Models\User;

class CustomerController extends Controller
{
    private $customerRepository;
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function customerDashboard()
    {
        return view('frontend.customer.customer-dashboard');
    }

    public function customerProfile(){
        $user_id = Session('LoggedCustomer')->user_id;
        $profile = $this->customerRepository->getProfile($user_id);
        return view('frontend.customer.profile', compact('profile'));
    }

    public function customerProfileEdit(){
        $user_id = Session('LoggedCustomer')->user_id;
        $profile = $this->customerRepository->findProfile($user_id);
        return view('frontend.customer.update_profile', compact('profile'));
    }

    public function updateProfileDetails(Request $request){
        // dd($request->all());
        $user_id = Session('LoggedCustomer')->user_id;
        $data = $request->validate([
            'company_name' =>'required',
            'email' =>'required',
            'gst' =>'required',
            'address' =>'required',
            'alt_phone' =>'required',
            'country' =>'required',
            'state' =>'required',
            'city' =>'required',
            'pincode' =>'required',
        ]);
        $data['updated_by'] = session('LoggedCustomer')->user_id;
        $this->customerRepository->updateProfileDetails($data, $user_id);
        return redirect()->route('customer.profile')->with(session()->flash('alert-success', 'Profile Updated Successfully'));
    }

    public function customerChangepassword(){
        return view('frontend.customer.change-password');
    }

    public function customerFeedback(){
        return view('frontend.customer.feedback');
    }

    public function customerComplain(){
        return view('frontend.customer.complain');
    }

    public function customerAddComplain(){
        return view('frontend.customer.add_complain');
    }

    // public function resetPassword()
    // {
    //     $data = $this->customerRepository->dashboardDataCount();
    //     return view('admin.dashboard.reset_password', compact('data'));
    // }
    // UserLogin
    // public function updateAdminPassword(Request $request){
    //     $request->validate([
    //         'old_password' => 'required',
    //         'new_password' => 'required|confirmed',
    //     ]);
    //     $user_details = UserLogin::findOrFail(1);
    //     // dd($user_details);
    //      #Match The Old Password
    //     if($request->old_password==$user_details->password){
    //         UserLogin::where('id', 1)->update([
    //             'password' => $request->new_password,
    //         ]);
    //         return back()->with(session()->flash('alert-success', 'Updated Successfully'));
    //     }else{
    //         return back()->with(session()->flash('alert-danger', 'Wrong Old Password'));
    //     }

    // }

    /** Update Profile Picture */
    public function update_profile_picture (Request $request){
        $img_name = 'img_'.time().'.'.$request->profile->getClientOriginalExtension();
        $request->profile->move(public_path('uploads/customer/'), $img_name);
        $imagePath = 'img/'.$img_name;
        $data = [
            'profile_pic'=>$imagePath,
        ];
        $update = User::find($request->user_id)->update($data);
        if($update){
            $response['success'] = true;
            $response['message'] = 'Success! Record Updated Successfully.';
        }else{
            $response['success'] = false;
            $response['message'] = 'Error! Record Not Updated.';
        }
        return $response;
    }

}
