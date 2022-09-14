<?php

namespace App\Models;

use Doctrine\Inflector\Rules\Word;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

    public function result()
    {
        return $this->belongsTo(Project_result::class);
    }
}
