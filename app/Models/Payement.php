<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'amount',
        'status',
        'user_id'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
