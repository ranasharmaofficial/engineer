<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\EngineerRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLogin;
class EngineerController extends Controller
{
    private $engineerRepository;

    public function __construct(EngineerRepositoryInterface $engineerRepository)
    {
        $this->engineerRepository = $engineerRepository;
    }

    public function index(Request $request){
        $engineerList = $this->engineerRepository->getEngineerList($request);
        return view('admin.engineer-list.index', compact('engineerList', 'request'));
    }

    public function create(){

        return view('admin.engineer-list.create');
    }

    public function changeStatus(Request $request){
        $user = $this->engineerRepository->setUserStatus($request);
        return response()->json($user);

    }

    public function engineer_details(Request $request){
        $engineer = $this->engineerRepository->getEngineerDetails($request);
        return response()->json($engineer);
    }

    public function updateEmploymentStatus(Request $request){
        $request->validate([
            'employment_block_reason' => 'required',
        ]);
        $updateEmploymentStatus = User::where('id', $request->engId)->first();
        $updateEmploymentStatus->employment_status = 0;
        $updateEmploymentStatus->employment_block_reason = $request->reason;
        $updateEmploymentStatus->employment_block_by = Session('LoggedUser')->user_id;
        $updateEmploymentStatus->save();
        if (!$updateEmploymentStatus) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
             ]);

        }
    }

    public function editEngineer($id){
        $engineer_details = $this->engineerRepository->getEngineerFullDetails($id);
        if($engineer_details){
            return view('admin.engineer-list.update', compact('engineer_details'));
        }
    }

    public function updateEmployeeDetails(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);
        $updateEmploymentDetails = User::where('id', $request->engineer_id)->first();
        $updateEmploymentDetails->first_name = $request->first_name;
        $updateEmploymentDetails->last_name = $request->last_name;
        $updateEmploymentDetails->mobile = $request->mobile;
        $updateEmploymentDetails->email = $request->email;
        $updateEmploymentDetails->status = $request->emp_status;
        $updateEmploymentDetails->save();
        if (!$updateEmploymentDetails) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
             ]);

        }
    }

    public function addEmployeeDetails(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);

        $us__id = User::where('user_type_id',  4)->orderBy('id', 'desc')->first();

            $center_code = substr($us__id->username, 3);
            $inc_id = $center_code+1;
            $username ='SPE'.$inc_id.'';



        $addEmployee = new User;
        $addEmployee->username = $username;
        $addEmployee->first_name = $request->first_name;
        $addEmployee->last_name = $request->last_name;
        $addEmployee->mobile = $request->mobile;
        $addEmployee->email = $request->email;
        $addEmployee->status = $request->status;
        $addEmployee->email_verified_at = now();
        $addEmployee->mobile_verified_at = now();
        $addEmployee->is_verified = 1;
        $addEmployee->user_type_id = 4;
        $addEmployee->save();

        $user_login = UserLogin::create([
            'username' => $request->mobile,
            'email' => $request->_email,
            'password' => $request->password,
            'user_id' => $addEmployee->id,
            'user_type_id' => 4,
            'status' => 1,
        ]);

        if (!$user_login) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
             ]);

        }
    }





}
