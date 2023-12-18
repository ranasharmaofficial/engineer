<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
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
        $master_user = $this->staffRepository->allmasteruser();
        return view('admin.staffs.create', ['master_user'=>$master_user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $data = $request->validate([
            'user_type' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'nullable',
            'status' => 'required',
        ]);


        $data['created_by'] = session('LoggedUser')->id;
        $this->staffRepository->storeStaff($data);

        return redirect()->route('admin.staffs.index')->with(session()->flash('alert-success', 'Staff Created Successfully'));
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


}
