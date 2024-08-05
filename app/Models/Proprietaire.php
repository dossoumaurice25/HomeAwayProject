<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Proprietaire extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
            /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
      /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $guarded = [];

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_activee',
        'photo',
        'bio',
        'profession',
        'adresse',
        'pays',
        'telephone',
        'carte_id'
    ];

    public function chambres()
    {
        return $this->hasMany(Chambres::class, 'proprietaire_id');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'proprietaire_id');
    }
}
