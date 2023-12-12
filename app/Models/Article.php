<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'prix',
        'description',
        'image_path',
        'categorie_id',
    ];
    public function categorie(){
        return $this->belongsTo(categorie::class);
    }
}
