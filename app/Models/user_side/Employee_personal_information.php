<?php

namespace App\Models\user_side;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_personal_information extends Model
{
    use HasFactory;

    public function notifications(){
        return $this->hasMany(Notification::class);
    }
}
