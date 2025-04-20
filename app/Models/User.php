<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_code',
        'phone',
        'user_type',
        'code_expires_at',
        'image',
        'base_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function get_vendor(){
        return $this->belongsTo(VendorsType::class, 'vendor_type');
    }
    public function gallery(){
        return $this->hasMany(Gallery::class, 'user_id');
    }
    public function services(){
        return $this->hasMany(Service::class, 'user_id');
    }
    public function pricings(){
        return $this->hasMany(ServicePricing::class, 'user_id');
    }
    public function payment_terms(){
        return $this->hasMany(PaymentTerm::class, 'user_id');
    }
    public function faqs(){
        return $this->hasMany(Faq::class, 'user_id');
    }
    public function reviews(){
        return $this->hasMany(VendorReview::class, 'vendor_id');
    }
}
