<?php

namespace App\Http\Controllers\Engineer;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\FrontEngInterface\FrontEngRepositoryInterface;
use App\Models\UserLogin;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\EngineerEducation;
use App\Models\EngineerSkill;
use App\Models\ServiceSubCategory;
use App\Models\Service;
use App\Models\EngineerWorkingHour;

class EngineerController extends Controller
{
    private $frontEngineerRepository;

    public function __construct(FrontEngRepositoryInterface $frontEngineerRepository)
    {
        $this->frontEngineerRepository = $frontEngineerRepository;
    }

    public function engineerDashboard(){
        $engineer_id = Session('LoggedEngineer')->user_id;
        // dd($engineer_id);
        $countUpcomingService = OrderDetail::where('engineer_id', $engineer_id)->where('status', 6)->count();
        $datas = [
            'countUpcomingService' => OrderDetail::where('engineer_id', $engineer_id)->where('status', 6)->count(),
            'inProgressService' => OrderDetail::where('engineer_id', $engineer_id)->where('status', 2)->count(),
            'completedService' => OrderDetail::where('engineer_id', $engineer_id)->where('status', 3)->count(),
            'totalService' => OrderDetail::where('engineer_id', $engineer_id)->count(),
            'UpcomingServiceList' => OrderDetail::where('engineer_id', $engineer_id)->where('status', 6)->get(),
            'ongoingServiceList' => OrderDetail::where('engineer_id', $engineer_id)->where('status', 2)->get(),
        ];
        return view('frontend.engineer.engineer-dashboard', $datas);
    }

    public function engineerProfile(){
        $engineer_id = Session('LoggedEngineer')->user_id;

        $profile = $this->frontEngineerRepository->getProfile($engineer_id);

        return view('frontend.engineer.profile', compact('profile'));
    }

    public function engineerEditProfile(){
        $engineer_id = Session('LoggedEngineer')->user_id;
        $profile = $this->frontEngineerRepository->getProfile($engineer_id);
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('frontend.engineer.edit_profile', compact('profile', 'service_subcategory_list'));
    }

    public function engineerChangepassword(){
        return view('frontend.engineer.change-password');
    }

    // UserLogin
    public function update_engineer_password(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        $user_id = Session('LoggedEngineer')->user_id;
        $user_details = UserLogin::where('user_id', $user_id)->first();

         #Match The Old Password
        if($request->old_password==$user_details->password){
            UserLogin::where('user_id', $user_id)->update([
                'password' => $request->new_password,
            ]);
            $response['status'] = true;
            $response['message'] = 'Success! Record Updated Successfully.';
        }else{
            $response['status'] = false;
            $response['message'] = 'Error! Record Not Updated.';
        }
        return $response;
    }

     /** Update Profile Picture */
     public function update_profile_picture (Request $request){
        // dd($request->all());
        $img_name = 'img_'.time().'.'.$request->profile->getClientOriginalExtension();
        $request->profile->move(public_path('uploads/customer/'), $img_name);
        $imagePath = $img_name;
        // dd($imagePath);
        $data = [
            'profile_pic'=>$imagePath,
        ];
        $update = User::where('id', $request->user_id)->first();
        $update->profile_pic = $imagePath;
        $update->save();
        if($update){
            $response['status'] = true;
            $response['message'] = 'Success! Record Updated Successfully.';
        }else{
            $response['status'] = false;
            $response['message'] = 'Error! Record Not Updated.';
        }
        return $response;
    }

    public function upComingBooking(Request $request){
        $user_id = Session('LoggedEngineer')->user_id;
        // $service_booking = OrderDetail::where('engineer_id', $user_id)->where('status', 6)->orderBy('id', 'DESC')->get();
        // $service_booking = Order::where('orders.engineer_id', $user_id)
        // ->leftJoin('users as u', 'u.id', '=', 'orders.user_id')
        // ->leftJoin('users as e', 'e.id', '=', 'orders.engineer_id')
        // ->select('orders.*', 'u.first_name', 'u.last_name', 'u.mobile', 'u.address', 'u.state',
        //         'u.city','u.country','u.email','u.pincode','u.pincode',
        //         'u.username', 'u.profile_pic'
        //         ,'e.first_name as eng_first_name', 'e.last_name as eng_last_name',
        //         'e.mobile as eng_mobile', 'e.email as eng_email','e.aadhar as eng_aadhar',
        //         'e.country as eng_country', 'e.state as eng_state','e.city as eng_city','e.address as eng_address',
        //         'e.pincode as eng_pincode', 'e.username as eng_username', 'e.profile_pic as eng_profile_pic')
        // ->paginate(20);
        $status = 2;
        $service_booking = $this->frontEngineerRepository->getServiceOrder($request, $status, $user_id);
        return view('frontend.engineer.upComing_booking', compact('service_booking'));
    }

    public function ongoingBooking(Request $request){
        $user_id = Session('LoggedEngineer')->user_id;
        $status = 2;
        $service_booking = $this->frontEngineerRepository->getServiceOrder($request, $status, $user_id);
        return view('frontend.engineer.ongoing', compact('service_booking'));
    }

    public function completeBooking(Request $request){
        $user_id = Session('LoggedEngineer')->user_id;
        $status = 3;
        $service_booking = $this->frontEngineerRepository->getServiceOrder($request, $status, $user_id);
        return view('frontend.engineer.completed_booking', compact('service_booking'));
    }

    public function cancellBooking(Request $request){
        $user_id = Session('LoggedEngineer')->user_id;
        $status = 5;
        $service_booking = $this->frontEngineerRepository->getServiceOrder($request, $status, $user_id);
        return view('frontend.engineer.cancelled_booking', compact('service_booking'));
    }

    public function pendingBooking(Request $request){
        $user_id = Session('LoggedEngineer')->user_id;
        $status = 0;
        $service_booking = $this->frontEngineerRepository->getServiceOrder($request, $status, $user_id);
        return view('frontend.engineer.pending_booking', compact('service_booking'));
    }

    public function update_enginner_profile_details(Request $request){
        // dd($request->all());


        $user_id = Session('LoggedEngineer')->user_id;

        if($request->primary_skill_certificate1!=null){
            $img_name = 'img_'.time().'.'.$request->primary_skill_certificate1->getClientOriginalExtension();
            $request->primary_skill_certificate1->move(public_path('uploads/customer/'), $img_name);
            $primary_skill_certificate1 = $img_name;
        }else{
            $primary_skill_certificate1 = NULL;
        }

        if($request->primary_skill_certificate2!=null){
            $img_name2 = 'img_'.time().'.'.$request->primary_skill_certificate2->getClientOriginalExtension();
            $request->primary_skill_certificate2->move(public_path('uploads/customer/'), $img_name2);
            $primary_skill_certificate2 = $img_name2;
        }else{
            $primary_skill_certificate2 = NULL;
        }

        if($request->organization_certificate!=null){
            $img_name3 = 'img_'.time().'.'.$request->organization_certificate->getClientOriginalExtension();
            $request->organization_certificate->move(public_path('uploads/customer/'), $img_name3);
            $organization_certificate = $img_name3;
        }else{
            $organization_certificate = NULL;
        }

        if($request->graduation_support_doc!=null){
            $img_name4 = 'img_'.time().'.'.$request->graduation_support_doc->getClientOriginalExtension();
            $request->graduation_support_doc->move(public_path('uploads/customer/'), $img_name4);
            $graduation_support_doc = $img_name4;
        }else{
            $graduation_support_doc = NULL;
        }

        if($request->pos_support_doc!=null){
            $img_name5 = 'img_'.time().'.'.$request->pos_support_doc->getClientOriginalExtension();
            $request->pos_support_doc->move(public_path('uploads/customer/'), $img_name5);
            $pos_support_doc = $img_name5;
        }else{
            $pos_support_doc = NULL;
        }



        if($request->secondary_skill_certificate!=null){
            $img_name6 = 'img_'.time().'.'.$request->secondary_skill_certificate->getClientOriginalExtension();
            $request->secondary_skill_certificate->move(public_path('uploads/customer/'), $img_name6);
            $secondary_skill_certificate = $img_name6;
        }else{
            $secondary_skill_certificate = NULL;
        }

        if($request->address_document!=null){
            $img_name7 = 'img_'.time().'.'.$request->address_document->getClientOriginalExtension();
            $request->address_document->move(public_path('uploads/customer/'), $img_name7);
            $address_document = $img_name7;
        }else{
            $address_document = NULL;
        }



        $update_profile = User::where('id', $user_id)->first();
        $update_profile->first_name = $request->first_name;
        $update_profile->last_name = $request->last_name;
        $update_profile->dob = $request->dob;
        $update_profile->aadhar = $request->eng_aadhar_number;
        $update_profile->country = $request->country;
        $update_profile->state = $request->state;
        $update_profile->city = $request->city;
        $update_profile->address = $request->address;
        $update_profile->pincode = $request->pincode;
        $update_profile->gender = $request->gender;
        $update_profile->address_proof = $request->address_proof;
        if($request->address_document!=null){
            $update_profile->address_documents = $address_document;
        }

        $update_profile->save();

        $check_engineer_education = EngineerEducation::where('user_id',  $user_id)->count();

        if($check_engineer_education==0){
            $engineer_education = new EngineerEducation;
            $engineer_education->user_id = $user_id;
            $engineer_education->eng_graduation = $request->eng_graduation;
            $engineer_education->graduation_field_of_study = $request->graduation_field_of_study;
            $engineer_education->graduation_start_date = $request->graduation_start_date;
            $engineer_education->engraduation_end_date = $request->engraduation_end_date;
            $engineer_education->graduation_support_doc = $graduation_support_doc;
            $engineer_education->pos_pgraduation = $request->pos_pgraduation;
            $engineer_education->pos_field_of_study = $request->pos_field_of_study;
            $engineer_education->pos_start_date = $request->pos_start_date;
            $engineer_education->pos_end_date = $request->pos_end_date;
            $engineer_education->pos_support_doc = $pos_support_doc;
            $engineer_education->save();
        }else{
            $engineer_education = EngineerEducation::where('user_id', $user_id)->first();
            $engineer_education->user_id = $user_id;
            $engineer_education->eng_graduation = $request->eng_graduation;
            $engineer_education->graduation_field_of_study = $request->graduation_field_of_study;
            $engineer_education->graduation_start_date = $request->graduation_start_date;
            $engineer_education->engraduation_end_date = $request->engraduation_end_date;

            if($request->graduation_support_doc!=null){
                $engineer_education->graduation_support_doc = $graduation_support_doc;
            }

            $engineer_education->pos_pgraduation = $request->pos_pgraduation;
            $engineer_education->pos_field_of_study = $request->pos_field_of_study;
            $engineer_education->pos_start_date = $request->pos_start_date;
            $engineer_education->pos_end_date = $request->pos_end_date;
            if($request->pos_support_doc!=null){
                $engineer_education->pos_support_doc = $pos_support_doc;
            }
            $engineer_education->save();
        }


        $check_engineer_skill = EngineerSkill::where('user_id',  $user_id)->count();

        if($check_engineer_skill==0){
            $engineer_skill = new EngineerSkill;
            $engineer_skill->user_id = $user_id;
            $engineer_skill->primary_skills1  = $request->primary_skills1;
            $engineer_skill->primary_subskills1 = $request->primary_subskills1;
            $engineer_skill->primary_skill_exp1 = $request->primary_skill_exp1;
            $engineer_skill->primary_skills2 = $request->primary_skills2;
            $engineer_skill->primary_subskills2 = $request->primary_subskills2;
            $engineer_skill->primary_skill_exp2 = $request->primary_skill_exp2;
            $engineer_skill->primary_skill_certificate1 = $primary_skill_certificate1;
            $engineer_skill->primary_skill_certificate2 = $primary_skill_certificate2;

            $engineer_skill->secondary_skill = $request->secondary_skill;
            $engineer_skill->secondary_skill_exp = $request->secondary_skill_exp;
            $engineer_skill->secondary_skill_certificate = $secondary_skill_certificate;

            $engineer_skill->organization_exp = $request->organization_exp;
            $engineer_skill->organization_name = $request->organization_name;
            $engineer_skill->organization_designation = $request->organization_designation;
            $engineer_skill->organization_start_date = $request->organization_start_date;
            $engineer_skill->organization_end_date = $request->organization_end_date;
            $engineer_skill->organization_certificate = $organization_certificate;
            $engineer_skill->save();

            if ($engineer_skill) {
                return response()->json([
                    "status" => true,
                ]);
            } else  {
                return response()->json([
                    "status" => false,

                ]);

            }


        }else{
            $engineer_skill = EngineerSkill::where('user_id',  $user_id)->first();
            $engineer_skill->user_id = $user_id;
            $engineer_skill->primary_skills1  = $request->primary_skills1;
            $engineer_skill->primary_subskills1 = $request->primary_subskills1;
            $engineer_skill->primary_skill_exp1 = $request->primary_skill_exp1;
            $engineer_skill->primary_skills2 = $request->primary_skills2;
            $engineer_skill->primary_subskills2 = $request->primary_subskills2;
            $engineer_skill->primary_skill_exp2 = $request->primary_skill_exp2;

            if($request->primary_skill_certificate1!=null){
                $engineer_skill->primary_skill_certificate1 = $primary_skill_certificate1;
            }

            if($request->primary_skill_certificate2!=null){
                $engineer_skill->primary_skill_certificate2 = $primary_skill_certificate2;
            }

            $engineer_skill->secondary_skill = $request->secondary_skill;
            $engineer_skill->secondary_skill_exp = $request->secondary_skill_exp;

            if($request->secondary_skill_certificate!=null){
                $engineer_skill->secondary_skill_certificate = $secondary_skill_certificate;
            }

            $engineer_skill->organization_exp = $request->organization_exp;
            $engineer_skill->organization_name = $request->organization_name;
            $engineer_skill->organization_designation = $request->organization_designation;
            $engineer_skill->organization_start_date = $request->organization_start_date;
            $engineer_skill->organization_end_date = $request->organization_end_date;
            if($request->organization_certificate!=null){
                $engineer_skill->organization_certificate = $organization_certificate;
            }


            $engineer_skill->save();

            if ($engineer_skill) {
                return response()->json([
                    "status" => true,
                ]);
            } else  {
                return response()->json([
                    "status" => false,

                ]);

            }
        }

    }

    public function getServiceList(Request $request){
        $data['serviceList'] = Service::where("subcategory_id",$request->subcategory_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }

    public function addWorkingHour(){
        $engineer_id = Session('LoggedEngineer')->user_id;
        $profile = $this->frontEngineerRepository->getProfile($engineer_id);
        $working_hour = $this->frontEngineerRepository->getWorkingHour($engineer_id);
        if($profile){
            return view('frontend.engineer.add_working_hour', compact('profile', 'working_hour'));
        }
    }

    public function addEngineerWorkingHour(Request $request){

        $request->validate([
            'working_type' => 'required',
        ]);

        $checkWorkingTypeInserted = EngineerWorkingHour::where('user_id',  $request->engineer_id)->count();

        // dd($checkWorkingTypeInserted);

        if($checkWorkingTypeInserted==0){
            $add_working_hour = new EngineerWorkingHour;
            $add_working_hour->user_id = $request->engineer_id;
            $add_working_hour->working_type = $request->working_type;
            $add_working_hour->start_date = $request->start_date;
            $add_working_hour->start_time = $request->start_time;
            $add_working_hour->end_date = $request->end_date;
            $add_working_hour->end_time = $request->end_time;
            $add_working_hour->save();

            if ($add_working_hour) {
                return response()->json([
                    "status" => true,
                ]);
            } else  {
                return response()->json([
                    "status" => false,

                ]);

            }

        }else{
            $update_working_hour = EngineerWorkingHour::where('user_id', $request->engineer_id)->first();
            $update_working_hour->user_id = $request->engineer_id;
            $update_working_hour->working_type = $request->working_type;
            $update_working_hour->start_date = $request->start_date;
            $update_working_hour->start_time = $request->start_time;
            $update_working_hour->end_date = $request->end_date;
            $update_working_hour->end_time = $request->end_time;
            $update_working_hour->save();

            if ($update_working_hour ) {
                return response()->json([
                    "status" => true,
                ]);
            } else  {
                return response()->json([
                    "status" => false,

                ]);

            }
        }


    }

    public function updateOrderStatus(Request $request){
        $order = Order::where('id', $request->id)->first();
        $order->status = $request->status;
        $order->save();

        $order_details = OrderDetail::where('order_id', $request->id)
            ->update([
                      'status' => $request->status,
                ]);
        return response()->json($order_details);
    }





}
