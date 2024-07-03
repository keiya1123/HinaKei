<?php

namespace App\Providers;

//ユーザーのみがアクションを起こせる実装(編集、削除、コメント)
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

use App\Models\Work;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //ユーザーしかupdateできない実装にする
        $this->registerPolicies();
        Gate::define('poster', function(User $user, Work $work){
        return $user->id==$work->user_id;
    });
        //ユーザーしかcommentできない実装にする
        $this->registerPolicies();
        Gate::define('commentator', function(User $user, Comment $comment){
        return $user->id==$comment->user_id;

    
    });
    }

}
