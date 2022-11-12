<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function bid()
    {
        return $this->belongsTo(Bid::class);
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function balance()
    {
        return $this->belongsTo(Balance::class);
    }
}
