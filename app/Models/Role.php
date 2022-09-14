<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $guarded = ['id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    } public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
