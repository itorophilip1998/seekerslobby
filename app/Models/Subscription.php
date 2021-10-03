<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date', 'expiry_date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
