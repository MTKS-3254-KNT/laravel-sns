<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// リレーションの記述


class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
        // return $article->user('App\User');
    }
    // アソシエーションの記述
}
