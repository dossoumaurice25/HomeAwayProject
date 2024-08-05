<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'chambre_id',
        'name',
        'email',
        'user_id',
        'date_debut',
        'date_fin',
        'prix_total',
        'number',
        'proprietaire_id',
        'commission_paid'
    ];

    public $timestamps = true;

    // Une réservation appartient à une chambre
    public function chambre(){
        return $this->belongsTo(Chambres::class);
    }

    // protected $fillable = ['user_id', 'chambre_id', 'date_debut', 'date_fin', 'prix_total'];

    // Une réservation appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function locataire()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function proprietaire()
    {
        return $this->belongsTo(Proprietaire::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'reservation_id');
    }
}
