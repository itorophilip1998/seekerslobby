<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable =[
        'ref_no', 'amount', 'user_id', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
