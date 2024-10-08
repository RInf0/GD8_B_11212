<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_movie',
        'class',
        'price',
    ];

    public function movie(){
        return $this->belongsTo(Movie::class, 'id_movie');
    }
}
