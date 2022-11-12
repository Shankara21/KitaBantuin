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
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        });
        $query->when($filters['subCategory'] ?? false, function ($query, $subCategory) {
            return $query->whereHas('subCategory', function ($query) use ($subCategory) {
                $query->where('name', $subCategory);
            });
        });
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'user',
                fn ($query) =>
                $query->where('name', $author)
            )
        );
    }
}
