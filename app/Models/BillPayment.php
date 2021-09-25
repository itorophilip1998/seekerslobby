<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_no',
        'type',
        'beneficiary',
        'details',
        'user_id',
        'amount'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
