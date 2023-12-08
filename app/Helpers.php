<?php
    use App\Models\BusinessSetting;
    use App\Models\Certificate;
    use App\Models\MasterProduct;
    use App\Models\Gallery;
    use App\Models\Testimonial;
    use App\Models\Pricing;
    use App\Models\PricingType;
    use App\Models\Blog;
    use App\Models\MasterService;
    use App\Models\FaqCategory;
    use App\Models\Staff;
    use App\Models\Video;
    use App\Models\MasterPartner;
    use App\Models\IndustryCmsPage;
    use App\Models\MasterSolution;
    use App\Models\ServiceCategory;
    use App\Models\Country;
    // use Intervention\Image\Facades\Image;
    // use BenMajor\ImageResize;


    /** Change DateTime format to any date/datetime format */
    if (!function_exists('convert_datetime_to_date_format')) {
        function convert_datetime_to_date_format($date, $format){
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);
        }
    }

    /** highlights the selected navigation on admin panel */
    if (!function_exists('areActiveRoutes')) {
        function areActiveRoutes(array $routes, $output = "active")
        {
            foreach ($routes as $route) {
                if (Route::currentRouteName() == $route) return $output;
            }
        }
    }

   /** return file uploaded via uploader */
    if (!function_exists('upload_asset')) {
        function upload_asset($file_name, $folder_name="all", $type="webp_conversion"){
            if ($type == "webp_conversion") {
                $img = \Image::make($file_name)->encode('webp', 90);
                $height = $img->height();
                $width = $img->width();
                // if($width > $height && $width > 1200){
                //     $img->resize(1200, null, function ($constraint) {
                //         $constraint->aspectRatio();
                //     });
                // }elseif ($height > 500) {
                //     $img->resize(null, 500, function ($constraint) {
                //         $constraint->aspectRatio();
                //     });
                // }
                $filename = $folder_name. '-' . date('YmdHis') . '-' .rand(1,10000). '.webp';
                $file_path = 'uploads/'.$folder_name.'/'. $filename;
                $img->save(base_path('public/').$file_path);
                return $file_path;
            }

            if ($type == "local") {
                $extenstion = $file_name->getClientOriginalExtension();
                $filename = $folder_name. '-' . date('YmdHis') . '-' .rand(1,10000). '.' . $extenstion;
                $file_name->move(public_path('uploads/'.$folder_name), $filename);
                $file_path = 'uploads/'.$folder_name.'/'. $filename;
                return $file_path;
            }

            if($type == "cloudinary"){
                $uploadedFileUrl = cloudinary()->upload($file_name->getRealPath())->getSecurePath();
                return $uploadedFileUrl;
            }
        }
    }

     /** Generate an asset path for the application */
    if (!function_exists('static_asset')) {
        function static_asset($path, $secure = null)
        {
            return app('url')->asset('public/' . $path, $secure);
        }
    }

    /** Fetch value by type and field_name from business setting */
    if (!function_exists('fetch_business_setting_value')) {
        function fetch_business_setting_value($type, $field_name)
        {
            return BusinessSetting::where('type', $type)->where('field_name', $field_name)->pluck('value')->first();
        }
    }

    if (!function_exists('fetch_business_setting_data')) {
        function fetch_business_setting_data($type)
        {
            return BusinessSetting::select('field_name', 'value')->where('type', $type)->first();
        }
    }


    if (!function_exists('get_business_single_cache_value')) {
        function get_business_single_cache_value($var_name, $type, $field_name = null){
            return Cache::rememberForever($var_name, function () use ($type, $field_name) {
                $output = DB::table('business_settings')
                    ->where('type', $type);
                    if($field_name != null){
                        $output = $output->where('field_name', $field_name)
                        ->select('value')->first();

                        return $output->value;
                    }else{
                        $output = $output->select('field_name', 'value')->first();

                        return $output;
                    }
                });
        }
    }

    if (!function_exists('get_business_multiple_cache_value')) {
        function get_business_multiple_cache_value($var_name, $type){
            return Cache::rememberForever($var_name, function () use ($type) {
                return DB::table('business_settings')->select('field_name', 'value')
                    ->where('type', $type)
                    ->get();
                });
        }
    }

    if (!function_exists('get_section_wise_data')) {
        function get_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
            //return Cache::rememberForever($var_name, function () use ($section_id, $limit_start, $limit_end) {
                $output = DB::table('section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                    ->where('page_id', $page_id)
                    ->where('section_id', $section_id)
                    ->where('status', 1)
                    ->where('deleted_at', NULL)
                    ->orderBy('order_number', 'ASC');
                    if($limit_start >= 0 && $limit_end > 0){
                        $output->skip($limit_start)->take($limit_end);
                    }
                    if($limit_start > 0 && $limit_end = 0){
                        $output->limit($limit_start);
                    }
                    $output = $output->get();
                    return $output;
            }
        // );
        // }
    }

    if (!function_exists('get_product_section_wise_data')) {
        function get_product_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
            //return Cache::rememberForever($var_name, function () use ($section_id, $limit_start, $limit_end) {
                $output = DB::table('product_section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                    ->where('page_id', $page_id)
                    ->where('section_id', $section_id)
                    ->where('status', 1)
                    ->where('deleted_at', NULL)
                    ->orderBy('order_number', 'ASC');
                    if($limit_start >= 0 && $limit_end > 0){
                        $output->skip($limit_start)->take($limit_end);
                    }
                    if($limit_start > 0 && $limit_end = 0){
                        $output->limit($limit_start);
                    }
                    $output = $output->get();
                    return $output;
            }
        // );
        // }
    }

    if (!function_exists('get_service_section_wise_data')) {
        function get_service_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
            $output = DB::table('service_section_datas')
                ->select('page_id', 'section_id', 'title', 'description', 'img', 'order_number')
                ->where('page_id', $page_id)
                ->where('section_id', $section_id)
                ->where('status', 1)
                ->where('deleted_at', NULL)
                ->orderBy('order_number', 'ASC');
                if($limit_start >= 0 && $limit_end > 0){
                    $output->skip($limit_start)->take($limit_end);
                }
                if($limit_start > 0 && $limit_end = 0){
                    $output->limit($limit_start);
                }
                $output = $output->get();
            return $output;
        }
    }

    if (!function_exists('get_industry_section_wise_data')) {
        function get_industry_section_wise_data($section_id, $limit_start=0, $limit_end=0){
            $output = DB::table('industry_section_datas')->select('section_id', 'title', 'description', 'img', 'order_number', 'other')
                ->where('section_id', $section_id)
                ->where('status', 1)
                ->where('deleted_at', NULL)
                ->orderBy('order_number', 'ASC');
                if($limit_start >= 0 && $limit_end > 0){
                    $output->skip($limit_start)->take($limit_end);
                }
                if($limit_start > 0 && $limit_end = 0){
                    $output->limit($limit_start);
                }
                $output = $output->get();

            return $output;
        }
    }

    // certificate list
if (!function_exists('certificate_list')){
    function certificate_list()
    {
        return Certificate::get();
    }
}

    // master_product_list list
    if (!function_exists('master_product_list')){
        function master_product_list()
        {
            return MasterProduct::orderBy('order_no', 'ASC')->where('parent_id', 0)->where('status', 1)->get();
        }
    }

     // get_img_client_list list
    if (!function_exists('get_img_affiliations_list')){
        function get_img_affiliations_list()
        {
            return Gallery::where('category_id', 5)->where('status', 1)->get();
        }
    }

     // get_img_partner__list list
     if (!function_exists('get_img_partner__list')){
        function get_img_partner__list()
        {
            return Gallery::where('category_id', 4)->where('status', 1)->get();
        }
    }

    // get_img_client_list list
    if (!function_exists('get_img_client_list')){
        function get_img_client_list()
        {
            return Gallery::where('category_id', 3)->where('status', 1)->get();
        }
    }

    // Testimonial list
    if (!function_exists('testimonialList')){
        function testimonialList(){
            return Testimonial::latest()->where('status', 1)->get();
        }
    }

    // Video Testimonial list
    if (!function_exists('videoTestimonialList')){
        function videoTestimonialList(){
            return Video::latest()->where('status', 1)->get();
        }
    }

    //pricing list for all
    if(!function_exists('pricingList')){
        function pricingList($product_id){
            return Pricing::where('product_id', $product_id)->where('status', 1)->latest()->get();
        }
    }

     //pricing list for all
     if(!function_exists('pricingType')){
        function pricingType($product_id){
            return Pricing::select('master_products.id','master_products.title')
                        ->leftJoin('master_products','pricings.type_id', '=', 'master_products.id')
                        ->where('pricings.product_id', $product_id)
                        ->where('master_products.status', 1)
                        ->distinct()
                        ->get();
        }
    }

    // latestPostList list
    if (!function_exists('latestPostList')){
        function latestPostList(){
            return Blog::latest()->where('blogs.status',1)->where('blogs.type', 'blog')
            ->leftJoin('categories', 'categories.id', '=', 'blogs.category_id')
            ->select(['categories.title as categoryTitle', 'blogs.*'])
            ->paginate(10);
         }
    }

  // master_product_list list
  if (!function_exists('master_service_list')){
    function master_service_list()
    {
        return MasterService::where('parent_id', 0)->where('status', 1)->get();
    }
}

     //pricing list for all
     if(!function_exists('FaqCategory')){
        function FaqCategory(){
            return FaqCategory::where('type',1 )
                    ->get();
        }
    }

    if(!function_exists('commonFaqCategory')){
        function commonFaqCategory(){
            return FaqCategory::where('status', 1)->get();
        }
    }
    // where('type', 0)->

       // Team list
       if (!function_exists('ourTeamList')){
        function ourTeamList(){
           $staff_list = Staff::latest()->where('status', 1)->where('type', 'Main Staff')
            ->get();
            return $staff_list;
        }
    }

     // get table field list
    if (!function_exists('get_table_field_lists')){
        function get_table_field_lists($product_id)
        {
            return MasterProduct::select('table_fields')->where('id', $product_id)->where('status', 1)->first();
        }
    }

    // footer master service list
    if (!function_exists('footer_master_service')){
        function footer_master_service()
        {
            return MasterService::where('parent_id', 0)->where('status', 1)->limit(8)->get();
        }
    }

    // footer master service list
    if (!function_exists('footer_master_products')){
        function footer_master_products()
        {
            return MasterProduct::orderBy('order_no', 'ASC')->where('parent_id', 0)->where('status', 1)->limit(10)->get();
        }
    }

        // master_partner_list list
        if (!function_exists('master_partner_list')){
            function master_partner_list()
            {
                return MasterPartner::where('parent_id', 0)->where('status', 1)->get();
            }
        }

        if (!function_exists('get_partner_section_wise_data')) {
            function get_partner_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
                //return Cache::rememberForever($var_name, function () use ($section_id, $limit_start, $limit_end) {
                    $output = DB::table('partner_section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                        ->where('page_id', $page_id)
                        ->where('section_id', $section_id)
                        ->where('status', 1)
                        ->where('deleted_at', NULL)
                        ->orderBy('order_number', 'ASC');
                        if($limit_start >= 0 && $limit_end > 0){
                            $output->skip($limit_start)->take($limit_end);
                        }
                        if($limit_start > 0 && $limit_end = 0){
                            $output->limit($limit_start);
                        }
                        $output = $output->get();
                        return $output;
                }
            // );
            // }
        }

        // master_industry_page list
        if (!function_exists('master_industry_page')){
            function master_industry_page()
            {
                return IndustryCmsPage::where('parent_id', 0)->where('status', 1)->get();
            }
        }

        if (!function_exists('get_indusry_section_wise_data')) {
            function get_indusry_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
                //return Cache::rememberForever($var_name, function () use ($section_id, $limit_start, $limit_end) {
                    $output = DB::table('industry_section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                        ->where('page_id', $page_id)
                        ->where('section_id', $section_id)
                        ->where('status', 1)
                        ->where('deleted_at', NULL)
                        ->orderBy('order_number', 'ASC');
                        if($limit_start >= 0 && $limit_end > 0){
                            $output->skip($limit_start)->take($limit_end);
                        }
                        if($limit_start > 0 && $limit_end = 0){
                            $output->limit($limit_start);
                        }
                        $output = $output->get();
                        return $output;
                }
            // );
            // }
        }

        // master_industry_page list
        if (!function_exists('master_solution_list')){
            function master_solution_list()
            {
                return MasterSolution::where('parent_id', 0)->where('status', 1)->get();
            }
        }

        if (!function_exists('get_solution_section_wise_data')) {
            function get_solution_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
                //return Cache::rememberForever($var_name, function () use ($section_id, $limit_start, $limit_end) {
                    $output = DB::table('solution_section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                        ->where('page_id', $page_id)
                        ->where('section_id', $section_id)
                        ->where('status', 1)
                        ->where('deleted_at', NULL)
                        ->orderBy('order_number', 'ASC');
                        if($limit_start >= 0 && $limit_end > 0){
                            $output->skip($limit_start)->take($limit_end);
                        }
                        if($limit_start > 0 && $limit_end = 0){
                            $output->limit($limit_start);
                        }
                        $output = $output->get();
                        return $output;
                }
            // );
            // }
        }


        if(!function_exists('serviceCategoryList')){
            function serviceCategoryList(){
                return ServiceCategory::where('status', 1)->get();
            }
        }

        if(!function_exists('getCountryList')){
            function getCountryList(){
                return Country::where('status', 1)->get();
            }
        }
?>
