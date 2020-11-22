<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = "reviews";
    protected $fillable = ["title", "artist", "desc", "image", "link", "user_id"];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like')->withTimestamps();
    }

    public function isLiked($user_id)
    {
        return $this->likes()->where('user_id', $user_id)->exists();
    }
}
