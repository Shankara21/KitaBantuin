<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerDetail extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function portofolio()
    {
        return $this->hasMany(Portofolio::class);
    }
    public function skill()
    {
        return $this -> belongsTo(Skill::class, 'skill_id');
    }
}
