<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{

    // Disable the model timestamps
    public $timestamps = false;

    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'body',
        'thumbnail',
        'category_id',
        'author_id',
        'is_featured'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
