<?php

namespace App\Http\Controllers\Engineer;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\FrontEngInterface\FrontEngRepositoryInterface;
use App\Models\UserLogin;

class EngineerController extends Controller
{
    private $frontEngineerRepository;

    public function __construct(FrontEngRepositoryInterface $frontEngineerRepository)
    {
        $this->frontEngineerRepository = $frontEngineerRepository;
    }

    public function engineerDashboard()
    {
        return view('frontend.engineer.engineer-dashboard');
    }



}
