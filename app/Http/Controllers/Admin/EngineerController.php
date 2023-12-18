<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\EngineerRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class EngineerController extends Controller
{
    private $engineerRepository;

    public function __construct(EngineerRepositoryInterface $engineerRepository)
    {
        $this->engineerRepository = $engineerRepository;
    }

    public function index(){
        $engineerList = $this->engineerRepository->getEngineerList();
        // dd($engineerList);
        return view('admin.engineer-list.index', compact('engineerList'));
    }

    public function create(){
        return view('admin.engineer-list.create');
    }
}
