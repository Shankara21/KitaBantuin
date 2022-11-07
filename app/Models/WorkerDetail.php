<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'skill_id' => 'array',
    ];

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
        return $this -> belongsToMany(Skill::class);
    }
}
