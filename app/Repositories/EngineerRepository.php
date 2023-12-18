<?php
namespace App\Repositories;
use App\Repositories\Interfaces\EngineerRepositoryInterface;

use App\Models\User;

class EngineerRepository implements EngineerRepositoryInterface
{
    public function getEngineerList(){
        return User::where('user_type_id', 4)->paginate(20);
    }
}
