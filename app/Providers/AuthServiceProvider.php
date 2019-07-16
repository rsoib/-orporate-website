<?php

namespace Corp\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Contracts\Auth\Access;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Gate;
use Corp\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Corp\Article' => 'Corp\Policies\ArticlePolicy',
        'Corp\Permission' => 'Corp\Policies\PermissionPolicy',
        'Corp\Menu' => 'Corp\Policies\MenusPolicy',
        'Corp\User' => 'Corp\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       Gate::define('VIEW_ADMIN', function($user){

            return $user->canDo(['VIEW_ADMIN','ADD_ARTICLES'],TRUE);
        });

       Gate::define('VIEW_ADMIN_ARTICLES', function($user){

            return $user->canDo(['VIEW_ADMIN_ARTICLES'],TRUE);
        });

       Gate::define('EDIT_USERS', function($user){

            return $user->canDo(['EDIT_USERS'],TRUE);
        });

       Gate::define('VIEW_ADMIN_MENU', function($user){

            return $user->canDo(['VIEW_ADMIN_MENU'],TRUE);
        });

        //
    }
}
