<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_no',
        'amount',
        'status',
        'beneficiary',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
