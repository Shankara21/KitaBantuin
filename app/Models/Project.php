<?php

namespace App\Models;

use Doctrine\Inflector\Rules\Word;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'projects';

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

    public function result()
    {
        return $this->belongsTo(Project_result::class);
    }

    public function testimoni()
    {
        return $this->hasOne(Testimoni::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_categories_id');
    }

    public function getRouteKeyName()
    {
        return 'title';
    }
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
