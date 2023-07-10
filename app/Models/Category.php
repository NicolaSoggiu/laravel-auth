<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function posts() {

        // hasMany si usa nel model della tabella che NON ha la chiave esterna, in una relazione uno a molti
        // altrimenti
        // hasOne si usa nel model della tabella che NON ha la chiave esterna, in una relazione uno a uno
        return $this->hasMany(Post::class);
    }
}