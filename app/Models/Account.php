<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'wallet_id','is_active','balance','transaction_pin','bank_name',
        'account_no','account_name','phone_no','bank_code','recipient_code','recipient_id'
    ];
    protected $hidden = [
        'transaction_pin'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

