<?php

namespace App\Models;

use App\Models\User;
use App\Models\Package;
use App\Models\Referral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 'start_date', 'end_date', 'user_id', 'package_id'
    ];

    public function packages(){
        return $this->hasMany(Package::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function referral(){
        return $this->hasOne(Referral::class);
    }
}
