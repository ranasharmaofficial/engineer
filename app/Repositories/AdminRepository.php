<?php
namespace App\Repositories;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Models\Category;
use App\Models\User;
use App\Models\Blog;
use App\Models\OrderDetail;

class AdminRepository implements AdminRepositoryInterface
{
    public function dashboardDataCount(){
        $user_count = User::where(['user_type_id' => 3, 'status' => 1])->count();
        $category_count = Category::where('parent_id', 0)->where('status', 1)->count();
        $subcategory_count = Category::where('parent_id', '!=', 0)->where('status', 1)->count();
        $blog_count = Blog::where('status', 1)->count();
        $blog_like_count = Blog::where('status', 1)->sum('total_like');
        $blog_comment_count = Blog::where('status', 1)->sum('total_comment');
        $blog_view_count = Blog::sum('total_view');

        $countUpcomingServiceOrder = OrderDetail::where('status', 6)->count();
        $inProgressServiceOrder = OrderDetail::where('status', 2)->count();
        $completedServiceOrder = OrderDetail::where('status', 3)->count();
        $pendingServiceOrder = OrderDetail::where('status', 0)->count();
        $totalServiceOrder = OrderDetail::count();
        $totalEngineer = User::where('user_type_id', 4)->count();
        $totalCustomer = User::where('user_type_id', 3)->count();


        $data = [
            'user_count' => $user_count,
            'category_count' => $category_count,
            'subcategory_count' => $subcategory_count,
            'blog_count' => $blog_count,
            'blog_like_count' => $blog_like_count,
            'blog_comment_count' => $blog_comment_count,
            'blog_view_count' => $blog_view_count,
            'countUpcomingServiceOrder' => $countUpcomingServiceOrder,
            'inProgressServiceOrder' => $inProgressServiceOrder,
            'completedServiceOrder' => $completedServiceOrder,
            'pendingServiceOrder' => $pendingServiceOrder,
            'totalServiceOrder' => $totalServiceOrder,
            'totalEngineer' => $totalEngineer,
            'totalCustomer' => $totalCustomer,


        ];
        return $data;
    }


}
