<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'body',
    ];

    public function comments(){
        return $this->hasMany(Comments::class);
    }
//    public function user() : BelongsTo
//    {
//        return $this->belongsTo(User::class);
//    }
}
