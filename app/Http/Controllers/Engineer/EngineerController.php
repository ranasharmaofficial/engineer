<?php

namespace App\Http\Controllers\Engineer;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\FrontEngInterface\FrontEngRepositoryInterface;
use App\Models\UserLogin;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\EngineerEducation;
use App\Models\EngineerSkill;

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
        return view('frontend.engineer.edit_profile', compact('profile'));
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

    public function upComingBooking(){
        $user_id = Session('LoggedEngineer')->user_id;
        $service_booking = OrderDetail::where('engineer_id', $user_id)->where('status', 6)->orderBy('id', 'DESC')->get();
        return view('frontend.engineer.upComing_booking', compact('service_booking'));
    }

    public function ongoingBooking(){
        $user_id = Session('LoggedEngineer')->user_id;
        $service_booking = OrderDetail::where('engineer_id', $user_id)->where('status', 2)->orderBy('id', 'DESC')->get();
        return view('frontend.engineer.ongoing', compact('service_booking'));
    }

    public function completeBooking(){
        $user_id = Session('LoggedEngineer')->user_id;
        $service_booking = OrderDetail::where('engineer_id', $user_id)->where('status', 3)->orderBy('id', 'DESC')->get();
        return view('frontend.engineer.completed_booking', compact('service_booking'));
    }

    public function cancellBooking(){
        $user_id = Session('LoggedEngineer')->user_id;
        $service_booking = OrderDetail::where('engineer_id', $user_id)->where('status', 5)->orderBy('id', 'DESC')->get();
        return view('frontend.engineer.cancelled_booking', compact('service_booking'));
    }

    public function pendingBooking(){
        $user_id = Session('LoggedEngineer')->user_id;
        $service_booking = OrderDetail::where('engineer_id', $user_id)->where('status', 0)->orderBy('id', 'DESC')->get();
        return view('frontend.engineer.pending_booking', compact('service_booking'));
    }

    public function update_enginner_profile_details(Request $request){
        // dd($request->all());


        $user_id = Session('LoggedEngineer')->user_id;

        $img_name = 'img_'.time().'.'.$request->primary_skill_certificate1->getClientOriginalExtension();
        $request->primary_skill_certificate1->move(public_path('uploads/customer/'), $img_name);
        $primary_skill_certificate1 = $img_name;

        $img_name2 = 'img_'.time().'.'.$request->primary_skill_certificate2->getClientOriginalExtension();
        $request->primary_skill_certificate2->move(public_path('uploads/customer/'), $img_name2);
        $primary_skill_certificate2 = $img_name2;

        $img_name3 = 'img_'.time().'.'.$request->organization_certificate->getClientOriginalExtension();
        $request->organization_certificate->move(public_path('uploads/customer/'), $img_name3);
        $organization_certificate = $img_name3;

        $img_name4 = 'img_'.time().'.'.$request->graduation_support_doc->getClientOriginalExtension();
        $request->graduation_support_doc->move(public_path('uploads/customer/'), $img_name4);
        $graduation_support_doc = $img_name4;

        $img_name5 = 'img_'.time().'.'.$request->pos_support_doc->getClientOriginalExtension();
        $request->pos_support_doc->move(public_path('uploads/customer/'), $img_name5);
        $pos_support_doc = $img_name5;


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
        $update_profile->save();

        $engineer_education = new EngineerEducation;
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


        $engineer_skill = new EngineerSkill;
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
         $engineer_skill->secondary_skill_certificate = $request->secondary_skill_certificate;

         $engineer_skill->organization_exp = $request->organization_exp;
         $engineer_skill->organization_name = $request->organization_name;
         $engineer_skill->organization_designation = $request->organization_designation;
         $engineer_skill->organization_start_date = $request->organization_start_date;
         $engineer_skill->organization_end_date = $request->organization_end_date;
         $engineer_skill->organization_certificate = $organization_certificate;
         $engineer_skill->save();




        if($engineer_skill){
            $response['status'] = true;
            $response['message'] = 'Success! Record Updated Successfully.';
        }else{
            $response['status'] = false;
            $response['message'] = 'Error! Record Not Updated.';
        }
        return $response;
    }





}
