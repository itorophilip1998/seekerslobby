<?php

namespace App\Models;

use App\Models\User;
use App\Models\Referral;
use App\Models\RequestFund;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requestfunds(){
        return $this->hasOne(RequestFund::class);
    }

    public function referral(){
        return $this->hasOne(Referral::class);
    }

}
