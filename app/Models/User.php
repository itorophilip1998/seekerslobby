<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Deposit;
use App\Models\Package;
use App\Models\Referral;
use App\Models\Transfer;
use App\Models\Withdraw;
use App\Models\Investment;
use App\Models\BillPayment;
use App\Models\RequestFund;
use App\Models\Transaction;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
        'ref_code',
        'refered_by',
        'verification_code',
        'oauth',
        'is_lock', 
        'is_ban',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_code'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }


        /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }



    public function accounts(){
        if($this->role = 'user'){
            return $this->hasOne(Account::class);
        }
    }

    public function transactions(){
        if($this->role = 'user'){
            return $this->hasMany(Transaction::class)->latest();
        }
    }

    public function packages(){
        if($this->role = 'user'){
            return $this->hasMany(Package::class);
        }
    }

    public function investments(){
        if($this->role = 'user'){
            return $this->hasMany(Investment::class)->latest();
        }
    }

    public function requestfunds(){
        if($this->role = 'user'){
            return $this->hasMany(RequestFund::class);
        }
    }

    public function withdraws(){
        if($this->role = 'user'){
            return $this->hasMany(Transaction::class);
        }
    }

    public function transfers(){
        if($this->role = 'user'){
            return $this->hasMany(Transfer::class);
        }
    }

    public function deposits(){
        if($this->role = 'user'){
            return $this->hasMany(Deposit::class);
        }
    }

    public function contacts(){
        if($this->role = 'user'){
            return $this->hasMany(Contact::class);
        }
    }

    public function bill_payments(){
        if($this->role = 'user'){
            return $this->hasMany(BillPayment::class);
        }
    }

    public function referrals(){
        if($this->role = 'user'){
            return $this->hasMany(Referral::class);
        }
    }
}
