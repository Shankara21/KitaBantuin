<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillWorker extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function skill(){
        return $this->belongsToMany(Skill::class, 'skill_worker_detail', 'skill_id', 'user_id');
    }

}
