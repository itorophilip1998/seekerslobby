<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title', 'salary', 'description', 'location', 'qualifications', 'company_name', 'is_verified', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
