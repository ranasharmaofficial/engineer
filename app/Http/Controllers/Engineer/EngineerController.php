<?php

namespace App\Http\Controllers\Engineer;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\EngineerInterface\EngineerRepositoryInterface;
use App\Models\UserLogin;

class EngineerController extends Controller
{
    private $engineerRepository;
    public function __construct(EngineerRepositoryInterface $engineerRepository)
    {
        $this->engineerRepository = $engineerRepository;
    }

    public function engineerDashboard()
    {
        return view('frontend.engineer.engineer-dashboard');
    }



}
