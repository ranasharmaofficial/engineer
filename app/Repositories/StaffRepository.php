<?php
namespace App\Repositories;

use App\Models\MasterDesignation;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Models\Staff;
use App\Models\User;

class StaffRepository implements StaffRepositoryInterface
{
    public function allStaffs(){
        $staffs = User::select(['users.*','master_designations.name as roleName'])->latest()
        ->leftjoin('master_designations', 'master_designations.id', '=', 'users.role');
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
        // $staff->designation = $data['designation'];
        // if($data['profile_pic']){
        //     $staff->profile_pic = $data['profile_pic'];
        // }
        // $staff->facebook_id = $data['facebook_id'];
        // $staff->twitter_id = $data['twitter_id'];
        // $staff->linkedin_id = $data['linkedin_id'];
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

    public function allmasteruser(){
        return MasterDesignation::get();
    }


}
