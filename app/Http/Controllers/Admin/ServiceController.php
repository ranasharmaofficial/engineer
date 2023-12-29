<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ServiceRepositoryInterface;
use App\Models\ServiceSubCategory;
use App\Models\ServiceSection;
use App\Models\Service;
use App\Models\EngineerSkill;

class ServiceController extends Controller
{
    private $serviceRepository;
    public function __construct(ServiceRepositoryInterface $serviceRepository){
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request){
        $pages =  $this->serviceRepository->allServices($request);
        return view('admin.service.service_category.index', compact('pages', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create(){
        $categories =  $this->serviceRepository->getServiceList();
        return view('admin.service.service_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:300|unique:service_categories,name',
            'page_url' => 'nullable',
            'status' => 'required',
        ]);

        // if($request->has('icon')){
        //     $data['icon'] = upload_asset($request->icon, "cms");
        // }else{
        //     $data['icon'] = NULL;
        // }

        $data['created_by'] = session('LoggedUser')->id;
        $this->serviceRepository->storeService($request, $data);
        return redirect()->back()->with(session()->flash('alert-success', 'Service Category Created Successfully'));
        // return redirect()->route('admin.service.index')->with(session()->flash('alert-success', 'Service Category Created Successfully'));
    }

    public function generateSlug(){
        $this->slug = SlugService::createSlug(ServiceCategory::class, 'slug', $this->name);
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
        $page = $this->serviceRepository->findService($id);
        if($page){
            $menus =  $this->serviceRepository->getServiceList();
            return view('admin.service.service_category.update', compact('page', 'menus'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',
        ]);
        $data['updated_by'] = session('LoggedUser')->id;
        $this->serviceRepository->updateService($data, $id);
        return redirect()->route('admin.service_category.index')->with(session()->flash('alert-success', 'Service Category Updated Updated Successfully'));
    }

    public function delete($id){
        $this->serviceRepository->deleteService($id);
        return redirect()->route('admin.service_category.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
    }

    /** Service SubCategory */

    public function ServiceSubCategory(Request $request){
        $service_categories =  $this->serviceRepository->getServiceList();
        // $cms_pages =  $this->serviceRepository->getServiceList();
        $service_subcategories =  $this->serviceRepository->allServiceSubcategories($request);
        return view('admin.service.service_subcategory.index', compact('service_categories', 'service_subcategories', 'request'));
    }

    public function ServiceSubCategoryCreate(){
        $service_categories =  $this->serviceRepository->getServiceList();
        return view('admin.service.service_subcategory.create', compact('service_categories'));
    }

    public function ServiceSubCategoryStore(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:300|unique:service_sub_categories,name',
            'category_id' => 'required',
            'page_url' => 'nullable',
            'status' => 'required',
        ]);
        $data['created_by'] = session('LoggedUser')->id;
        $this->serviceRepository->storeServiceSubCategory($request, $data);
        return redirect()->back()->with(session()->flash('alert-success', 'Service SubCategory Created Successfully'));
        // return redirect()->route('admin.service.index')->with(session()->flash('alert-success', 'Service Category Created Successfully'));
    }

    public function ServiceSubCategoryEdit($id){
        $service_subcategory_details = $this->serviceRepository->findServiceSubCategory($id);
        if($service_subcategory_details){
            $service_categories =  $this->serviceRepository->getServiceList();
            return view('admin.service.service_subcategory.update', compact('service_subcategory_details', 'service_categories'));
        }else{
            return redirect()->back()->with(session()->flase('alert-danger', 'Does Not Exist!'));
        }
    }

    public function ServiceSubCategoryUpdate(Request $request, $id){
        $data = $request->validate([
            'name' => 'required|string|max:300',
            'category_id' => 'required',
            'status' => 'required',
        ]);
        $data['id'] = $request->id;
        $data['created_by'] = session('LoggedUser')->id;
        $this->serviceRepository->updateServiceSubCategory($data);
        return redirect()->route('admin.ServiceSubCategory.index')->with(session()->flash('alert-success', 'Service Subcategory Updated Successfully'));
    }

    // public function deleteServiceSubCategory(){
    //     $this->serviceRepository->deleteCmsSectionData($id);
    //     return redirect()->route('admin.section_data.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
    // }

    /** Service  */

    public function getSubcategoryList(Request $request){
        $data['subcategories'] = ServiceSubCategory::where("category_id",$request->category_id)
        ->get(["name","id"]);
        return response()->json($data);
    }

    public function serviceList(Request $request){
        $service_categories =  $this->serviceRepository->getServiceList();
        // $cms_pages =  $this->serviceRepository->getServiceList();
        $allservices =  $this->serviceRepository->allMainServices($request);
        return view('admin.service.service.index', compact('service_categories', 'allservices', 'request'));
    }

    public function serviceCreate(){
        $service_categories =  $this->serviceRepository->getServiceList();
        return view('admin.service.service.create', compact('service_categories'));
    }

    public function serviceStore(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:300|unique:services,name',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $data['created_by'] = session('LoggedUser')->id;
        $this->serviceRepository->storeMainService($request, $data);
        return redirect()->back()->with(session()->flash('alert-success', 'Service SubCategory Created Successfully'));
        // return redirect()->route('admin.service.index')->with(session()->flash('alert-success', 'Service Category Created Successfully'));
    }

    public function serviceEdit($id){
        $service_subcategory_details = $this->serviceRepository->findServiceSubCategory($id);
        if($service_subcategory_details){
            $service_categories =  $this->serviceRepository->getServiceList();
            return view('admin.service.service_subcategory.update', compact('service_subcategory_details', 'service_categories'));
        }else{
            return redirect()->back()->with(session()->flase('alert-danger', 'Does Not Exist!'));
        }
    }

    public function serviceUpdate(Request $request, $id){
        $data = $request->validate([
            'name' => 'required|string|max:300',
            'category_id' => 'required',
            'status' => 'required',
        ]);
        $data['id'] = $request->id;
        $data['created_by'] = session('LoggedUser')->id;
        $this->serviceRepository->updateServiceSubCategory($data);
        return redirect()->route('admin.ServiceSubCategory.index')->with(session()->flash('alert-success', 'Service Subcategory Updated Successfully'));
    }

    /** Sub Service  */

    // public function getMainServiceList(Request $request){
    //     $data['subcategories'] = S::where("category_id",$request->category_id)
    //     ->get(["name","id"]);
    //     return response()->json($data);
    // }

    public function subServiceList(Request $request){
        $main_services =  $this->serviceRepository->getMainServiceList();
        $allSubservices =  $this->serviceRepository->allMainSubServices($request);
        return view('admin.service.subservice.index', compact('main_services', 'allSubservices', 'request'));
    }

    public function subServiceCreate(){
        $main_services =  $this->serviceRepository->getMainServiceList();
        return view('admin.service.subservice.create', compact('main_services'));
    }

    public function subServiceStore(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:300|unique:sub_services,name',
            'service_id' => 'required',
            'onsite_price' => 'required',
            'offsite_price' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $data['created_by'] = session('LoggedUser')->id;
        $this->serviceRepository->storeSubService($request, $data);
        return redirect()->back()->with(session()->flash('alert-success', 'Sub Service Created Successfully'));
        // return redirect()->route('admin.service.index')->with(session()->flash('alert-success', 'Service Category Created Successfully'));
    }

    public function subServiceEdit($id){
        $service_subcategory_details = $this->serviceRepository->findServiceSubCategory($id);
        if($service_subcategory_details){
            $service_categories =  $this->serviceRepository->getServiceList();
            return view('admin.service.service_subcategory.update', compact('service_subcategory_details', 'service_categories'));
        }else{
            return redirect()->back()->with(session()->flase('alert-danger', 'Does Not Exist!'));
        }
    }

    public function subServiceUpdate(Request $request, $id){
        $data = $request->validate([
            'name' => 'required|string|max:300',
            'category_id' => 'required',
            'status' => 'required',
        ]);
        $data['id'] = $request->id;
        $data['created_by'] = session('LoggedUser')->id;
        $this->serviceRepository->updateServiceSubCategory($data);
        return redirect()->route('admin.ServiceSubCategory.index')->with(session()->flash('alert-success', 'Service Subcategory Updated Successfully'));
    }

    /** Page Section CRUD Start */
        public function serviceSectionIndex(Request $request){
            $service_sections =  $this->serviceRepository->allServiceSectionList($request);
            $cms_pages =  $this->serviceRepository->getServiceList();
            return view('admin.service.service_section.index', compact('service_sections', 'cms_pages', 'request'));
        }

        public function serviceSectionCreate(){
            $cms_pages =  $this->serviceRepository->getServiceList();
            return view('admin.service.service_section.create', compact('cms_pages'));
        }

        public function serviceSectionStore(Request $request){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_name' => 'required',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'status' => 'required',
            ]);

            if($request->has('image')){
                $data['image'] = upload_asset($request->image, "cms");
            }else{
                $data['image'] = NULL;
            }

            $data['created_by'] = session('LoggedUser')->id;
            $checkSectionAdded = ServiceSection::where('page_id', $request->page_id)->where('section_name', $request->section_name)->count();
            if($checkSectionAdded==0){
                $this->serviceRepository->storeServiceSection($data, 'store');
                return redirect()->route('admin.service_sections.index')->with(session()->flash('alert-success', 'Page Section Created Successfully'));
            }else{
                return redirect()->route('admin.service_sections.index')->with(session()->flash('alert-danger', 'Already Exist!'));
            }

        }

        public function serviceSectionEdit($id){
            $page_section = $this->serviceRepository->findServiceSection($id);
            if($page_section){
                $cms_pages =  $this->serviceRepository->getServiceList();
                return view('admin.service.service_section.update', compact('page_section', 'cms_pages'));
            }
        }

        public function serviceSectionUpdate(Request $request, $id){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                // 'section_name' => 'required|unique:page_sections,section_name,'.$id,
                'section_name' => 'required|',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'status' => 'required',
            ]);

            if($request->has('image')){
                $data['image'] = upload_asset($request->image, "cms");
            }else{
                $data['image'] = NULL;
            }

            $data['id'] = $request->id;
            $data['created_by'] = session('LoggedUser')->id;
            $this->serviceRepository->storeServiceSection($data, 'update');
            return redirect()->route('admin.service_sections.index')->with(session()->flash('alert-success', 'Page Section Updated Successfully'));
        }

        public function deleteServiceSection($id){
            $this->serviceRepository->deleteServiceSection($id);
            return redirect()->route('admin.service_sections.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
        }
    /** Page Section CRUD End */

    /** Section Data CRUD Start */
        public function servicesectionDataIndex(Request $request){
            $page_sections =  $this->serviceRepository->allServiceSectionDataList($request);
            $cms_pages =  $this->serviceRepository->getServiceList();
            return view('admin.service.service_section_data.index', compact('page_sections', 'cms_pages', 'request'));
        }

        public function servicefetchSection(Request $request){
            $data['sections'] = $this->serviceRepository->getServiceSectionList($request->page_id);
            return response()->json($data);
        }

        public function servicesectionDataCreate(){
            $cms_pages =  $this->serviceRepository->getServiceList();
            return view('admin.service.service_section_data.create', compact('cms_pages'));
        }

        public function servicesectionDataStore(Request $request){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_id' => 'required|numeric',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'order_number' => 'required|numeric',
                'other' => 'nullable',
                'status' => 'required|numeric',
            ]);

            if($request->has('img')){
                $data['img'] = upload_asset($request->img, "cms");
            }else{
                $data['img'] = NULL;
            }

            if($request->has('other')){
                $data['other'] = upload_asset($request->other, "cms");
            }else{
                $data['other'] = NULL;
            }

            $data['created_by'] = session('LoggedUser')->id;
            $this->serviceRepository->storeServiceSectionData($data, 'store');
            return redirect()->route('admin.servicesection_data.index')->with(session()->flash('alert-success', 'Section Data Created Successfully'));
        }

        public function servicesectionDataEdit($id){
            $section_data = $this->serviceRepository->findServiceSectionData($id);
            if($section_data){
                $cms_pages =  $this->serviceRepository->getServiceList();
                $page_sections =  $this->serviceRepository->getServiceSectionList($section_data->page_id);
                return view('admin.service.service_section_data.update', compact('section_data', 'cms_pages', 'page_sections'));
            }
        }

        public function servicesectionDataUpdate(Request $request, $id){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_id' => 'required|numeric',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'order_number' => 'required|numeric',
                // 'other' => 'nullable',
                'status' => 'required|numeric',
            ]);
            // dd($request->all());
            if($request->has('img')){
                $data['img'] = upload_asset($request->img, "cms");
            }else{
                $data['img'] = NULL;
            }

            if($request->has('other')){
                $data['other'] = upload_asset($request->other, "cms");
            }else{
                $data['other'] = NULL;
            }

            $data['id'] = $request->id;
            $data['updated_by'] = session('LoggedUser')->id;
            $this->serviceRepository->storeServiceSectionData($data, 'update');
            return redirect()->route('admin.servicesection_data.index')->with(session()->flash('alert-success', 'Page Section Updated Successfully'));
        }

        public function deleteServiceSectionData($id){
            $this->serviceRepository->deleteServiceSectionData($id);
            return redirect()->route('admin.servicesection_data.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
        }
    /** Section Data CRUD End */

    public function getServiceList(Request $request){
        $data['serviceList'] = Service::where("subcategory_id",$request->subcategory_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }

    public function getEngineerList(Request $request){
        // dd($request->all());
        $data['engineerList'] = EngineerSkill::where("primary_skills1",$request->subcategory_id)
                ->where("primary_subskills1",$request->service_id)
                ->leftJoin('users as u', 'u.id', '=', 'engineer_skills.user_id')
                ->select('engineer_skills.*', 'u.first_name', 'u.last_name', 'u.id',)
                ->get();

        return response()->json($data);
    }




}
