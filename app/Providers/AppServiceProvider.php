<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $menuItems = [
            'Administration' => [
                [
                    'url' => 'admin/dashboard',
                    'icon' => '',
                    'label' => 'Dashboard'
                ],
            ],

            'Users, Roles, & Permissions' => [
                [
                    'url' => 'admin/users',
                    'icon' => '',
                    'label' => 'Users'
                ],
            ],

            'News' => [
                [
                    'url' => 'admin/articles',
                    'icon' => '',
                    'label' => 'Articles'
                ],
                [
                    'url' => 'admin/categories',
                    'icon' => '',
                    'label' => 'Categories'
                ],
                [
                    'url' => 'admin/tags',
                    'icon' => '',
                    'label' => 'Tags'
                ],
                [
                    'url' => 'admin/pages',
                    'icon' => '',
                    'label' => 'Page'
                ],
            ],

            'Advanced' => [
                [
                    'url' => 'admin/setting',
                    'icon' => '',
                    'label' => 'Setting'
                ],
                [
                    'url' => 'admin/logout',
                    'icon' => '',
                    'label' => 'Logout'
                ],
            ],
        ];

        View::share('menuItems', $menuItems);
    }
}
