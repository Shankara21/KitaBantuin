<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function testimoni()
    {
        return $this->hasMany(Testimoni::class);
    }
    public function project()
    {
        return $this->hasMany(Project::class);
    }
    public function bid()
    {
        return $this->hasMany(Bid::class);
    }
    public function portofolio()
    {
        return $this->hasMany(Portofolio::class);
    }
    public function workerDetail()
    {
        return $this->hasOne(WorkerDetail::class);
    }

    public function skillWorker()
    {
        return $this->hasMany(SkillWorker::class);
    }
    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
    public function getRouteKeyName()
    {
        return 'name';
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
    public function project2()
    {
        return $this->hasMany(Project::class);
    }

    public function projectResult()
    {
        return $this->hasMany(Project_result::class);
    }
    public function bankUser()
    {
        return $this->belongsTo(BankUser::class, 'bankuser_id');
    }
}
