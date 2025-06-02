<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable;

    // Disable the model timestamps
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description'
    ];

    public function categoriesPosts() {
        return $this->hasMany(Category::class, 'category_id');
    }

}
