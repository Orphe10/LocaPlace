<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle', 'description', 'type', 'statut',
        'available_from', 'available_until', 'is_approved',
        'path', 'price', 'image', 'qte', 'agence_id', 'article_id',
    ];

    public function agence()
    {
        return $this->belongsTo(Agence::class, 'agence_id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function reservation()
    {
        return $this->hasOne(Reservation::class, 'article_id');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
