<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $fillable = ["message", "user_id", "review_id"];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function review() {
        return $this->belongsTo('App\Models\Review');
    }

}
