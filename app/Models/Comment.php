<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    //コメント機能
    public function work()
    {
        return $this->belongsTo('App\Models\Work');
    }

    //ユーザーの連携
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
