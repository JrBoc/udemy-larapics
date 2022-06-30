<?php

namespace App\Providers;

use App\Models\Image;
use App\Policies\ImagePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Image::class => ImagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        auth()->loginUsingId(1);

        // Gate::define('update-image', [ImagePolicy::class, 'update']);
        // Gate::define('delete-image', [ImagePolicy::class, 'delete']);

        // Gate::before(function (User $user, $ability) {
        //     if ($user->role === Role::Admin) {
        //         return true;
        //     }
        // });
        //
    }
}
