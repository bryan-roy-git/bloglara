<?php

namespace App\Models;

use App\Models\PostImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url_clean',
        'content',
        'category_id',
        'posted'
    ];

    public function category () {
        return $this->belongsTo(Category::class);
        //belongsTo = una estrucuta pertence a otra
        // Un post pertenece a una categoria
    }

    public function image () {
        return $this->hasOne(PostImage::class);
        // Un post contine una imagen
    
    }
}
