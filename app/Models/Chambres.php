<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Chambres extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'name',
        'price',
        'adresse',
        'ville',
        'description',
        'image_path',
        'proprietaire_id',
        'is_approved',
        'status',
        'available_at'
    ];
    /**
     * Get the user that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo( CloudFile::class,'cloud_file_id');
    }

   public function getSlug():string {
        return Str::slug($this->name);
   }

   // Une chambre appartient à un propriétaire
   public function proprietaire()
   {
       return $this->belongsTo(Proprietaire::class, 'proprietaire_id');
   }

   // Une chambre peut avoir plusieurs réservations
   public function reservations()
   {
       return $this->hasMany(Reservation::class);
   }

   public function isReserved()
   {
       return $this->status === 'reserve';
   }

   public function isAvailable()
   {
       return $this->status === 'disponible';
   }

   public function willBeAvailable()
   {
       return $this->status === 'disponible_dans' && $this->available_at && Carbon::now()->lessThan($this->available_at);
   }
}
