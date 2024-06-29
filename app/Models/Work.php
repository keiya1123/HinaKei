<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Work extends Model
{
    use HasFactory;

    //お試しでコメントアウト
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    //ユーザーの連携
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    //コメント機能
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
