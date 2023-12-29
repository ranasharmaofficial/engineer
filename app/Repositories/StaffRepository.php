<?php

namespace App\Repositories;
use App\Models\MasterDesignation;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Models\Staff;
use App\Models\User;
use App\Models\UserType;
use App\Models\UserLogin;



class StaffRepository implements StaffRepositoryInterface

{

    public function allStaffs(){

        $staffs = User::where('user_type_id',5)->select(['users.*','master_designations.name as roleName'])->latest()

        ->leftjoin('master_designations', 'master_designations.id', '=', 'users.user_designation_id');

        $staffs = $staffs->paginate(10);

        return $staffs;

    }



    public function storeStaff($data){

        $staff = new User();
        $staff->role = $data['user_type'];
        $staff->first_name = $data['f_name'];
        $staff->last_name = $data['l_name'];
        $staff->email = $data['email'];
        $staff->mobile = $data['phone'];
        $staff->password = $data['password'];
        $staff->status = $data['status'];
        $staff->created_by = $data['created_by'];
        $staff->save();

    }



    public function findStaff($id){

        return User::find($id);

    }



    public function updateStaff($data, $id){

        $staff = User::where('id', $id)->first();

        $staff->role = $data['user_type'];

        $staff->first_name = $data['f_name'];

        $staff->last_name = $data['l_name'];

        $staff->email = $data['email'];

        $staff->mobile = $data['phone'];

        $staff->password = $data['password'];

        // $staff->designation = $data['designation'];

        // if($data['profile_pic']){

        //     $staff->profile_pic = $data['profile_pic'];

        // }

        // $staff->facebook_id = $data['facebook_id'];

        // $staff->twitter_id = $data['twitter_id'];

        // $staff->linkedin_id = $data['linkedin_id'];

        $staff->status = $data['status'];

        $staff->save();

    }



    public function allmasterdesignation(){
        return MasterDesignation::get();
    }

    public function allusertypes(){
        return UserType::where('id', '!=', 1)->where('id', '!=', 2)->get();
    }

    public function getCustomerList($request){
        $data = User::where('users.user_type_id', 3)->where('users.is_verified', 1)
                ->select('users.*', 'co.name as countryName', 's.name as stateName', 'c.name as cityName',)
                ->leftJoin('countries as co', 'co.id', '=', 'users.country')
                ->leftJoin('states as s', 's.id', '=', 'users.state')
                ->leftJoin('cities as c', 'c.id', '=', 'users.city');
                if($request['username']){
                    $data = $data->where('users.username', $request['username']);
                }
                if($request['mobile']){
                    $data = $data->where('users.mobile',$request['mobile']);
                }
                if($request['email']){
                    $data = $data->where('users.email',$request['email']);
                }
                if($request['date_from']){
                    $data = $data->where('users.created_at', '>=', date('Y-m-d', strtotime($request['date_from'])))->where('created_at', '<=', date('Y-m-d', strtotime($request['date_to'])));
                }
                if($request['name']){
                    $data = $data->where('users.first_name','LIKE',"%{$request['name']}%");
                }
                $data = $data->latest()->paginate(20);
        return $data;
    }

    public function setUserStatus($user_data){

        $user = User::find($user_data->id);
        $user->status = $user_data->status;
        // $user->is_verified = $user_data->status;
        if($user->save()){
            $update_User_login = UserLogin::where('user_id', $user_data->id)->first();
            $update_User_login->status = $user_data->status;
            $update_User_login->save();
        }

    }





}

