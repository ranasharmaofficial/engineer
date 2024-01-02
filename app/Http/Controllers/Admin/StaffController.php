<?php
namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use App\Models\User;
use App\Models\UserLogin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\StaffRepositoryInterface;

class StaffController extends Controller

{

    private $staffRepository;
    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(){

        $staffs =  $this->staffRepository->allStaffs();

        return view('admin.staffs.index', compact('staffs'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create(){

        $master_designation = $this->staffRepository->allmasterdesignation();
        $user_type_list = $this->staffRepository->allusertypes();
        return view('admin.staffs.create', ['master_designation'=>$master_designation, 'user_type_list'=>$user_type_list]);

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */



    public function addStaffRegister(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'status' => 'required',
            'user_type_id' => 'required',
            'user_designation_id' => 'required',
            'status' => 'required',
        ]);



        $us__id = User::where('user_type_id',  5)->orderBy('id', 'desc')->first();
            if($us__id){
                $center_code = substr($us__id->username, 3);
                $inc_id = $center_code+1;
                $username ='EST'.$inc_id.'';
            }else{
                $username = 'EST101';
            }




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
        $addEmployee->user_type_id = $request->user_type_id;
        $addEmployee->user_designation_id = $request->user_designation_id;
        $addEmployee->save();

        $user_login = UserLogin::create([
            'username' => $request->mobile,
            'email' => $request->_email,
            'password' => $request->password,
            'user_id' => $addEmployee->id,
            'user_type_id' => $request->user_type_id,
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



    /**

     * Display the specified resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function show($id){

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function edit($id){

        $staff = $this->staffRepository->findStaff($id);

        return view('admin.staffs.update', compact('staff'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id){

        $data = $request->validate([

            'user_type' => 'required',

            'f_name' => 'required',

            'l_name' => 'required',

            'email' => 'required',

            'phone' => 'required',

            'password' => 'nullable',

            'status' => 'required',

        ]);





        $this->staffRepository->updateStaff($data, $id);



        return redirect()->route('admin.staffs.index')->with(session()->flash('alert-success', 'Staff Updated Successfully'));

    }

    public function customerList(Request $request){
        $customer_list = $this->staffRepository->getCustomerList($request);
        return view('admin.customer-list.index', compact('customer_list', 'request'));
    }

    public function changeStatus(Request $request){
        $user = $this->staffRepository->setUserStatus($request);
        return response()->json($user);

    }

    public function staffExport(){
        return view('admin.engineer-list.staff_export');
    }

    public function customerExport(){
        return view('admin.customer-list.customer_export');
    }

}

