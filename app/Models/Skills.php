<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill_name'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
