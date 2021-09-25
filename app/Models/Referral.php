<?php

namespace App\Models;

use App\Models\User;
use App\Models\Investment;
use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'amount',
        'package_id',
        'investment_id',
        'user_id',
        'owner_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function investment(){
        return $this->hasOne(Investment::class);
    }

    public function package(){
        return $this->hasOne(Package::class);
    }
}
