<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Cart
        $this->app->bind('App\Contracts\Services\User\CartServiceInterface', 'App\Services\User\CartService');
        $this->app->bind('App\Contracts\Dao\User\CartDaoInterface', 'App\Dao\User\CartDao');

        // Category
        $this->app->bind('App\Contracts\Services\Admin\CategoryServiceInterface', 'App\Services\Admin\CategoryService');
        $this->app->bind('App\Contracts\Dao\Admin\CategoryDaoInterface', 'App\Dao\Admin\CategoryDao');

        // Order(admin)
        $this->app->bind('App\Contracts\Services\Admin\OrderServiceInterface', 'App\Services\Admin\OrderService');
        $this->app->bind('App\Contracts\Dao\Admin\OrderDaoInterface', 'App\Dao\Admin\OrderDao');

        // Order(user)
        $this->app->bind('App\Contracts\Services\User\OrderServiceInterface', 'App\Services\User\OrderService');
        $this->app->bind('App\Contracts\Dao\User\OrderDaoInterface', 'App\Dao\User\OrderDao');

        // Product
        $this->app->bind('App\Contracts\Services\Admin\ProductServiceInterface', 'App\Services\Admin\ProductService');
        $this->app->bind('App\Contracts\Dao\Admin\ProductDaoInterface', 'App\Dao\Admin\ProductDao');

        // User
        $this->app->bind('App\Contracts\Services\Admin\UserServiceInterface', 'App\Services\Admin\UserService');
        $this->app->bind('App\Contracts\Dao\Admin\UserDaoInterface', 'App\Dao\Admin\UserDao');

        // Admin
        $this->app->bind('App\Contracts\Services\Admin\AdminServiceInterface', 'App\Services\Admin\AdminService');
        $this->app->bind('App\Contracts\Dao\Admin\AdminDaoInterface', 'App\Dao\Admin\AdminDao');

        // Dashboard
        $this->app->bind('App\Contracts\Services\Admin\DashboardServiceInterface', 'App\Services\Admin\DashboardService');
        $this->app->bind('App\Contracts\Dao\Admin\DashboardDaoInterface', 'App\Dao\Admin\DashboardDao');

        // Home
        $this->app->bind('App\Contracts\Services\User\HomeServiceInterface', 'App\Services\User\HomeService');
        $this->app->bind('App\Contracts\Dao\User\HomeDaoInterface', 'App\Dao\User\HomeDao');

        // Authentication
        $this->app->bind('App\Contracts\Services\User\AuthServiceInterface', 'App\Services\User\AuthService');
        $this->app->bind('App\Contracts\Dao\User\AuthDaoInterface', 'App\Dao\User\AuthDao');

        // Profile
        $this->app->bind('App\Contracts\Services\User\ProfileServiceInterface', 'App\Services\User\ProfileService');
        $this->app->bind('App\Contracts\Dao\User\ProfileDaoInterface', 'App\Dao\User\ProfileDao');

        // Contact(user)
        $this->app->bind('App\Contracts\Services\User\ContactServiceInterface', 'App\Services\User\ContactService');
        $this->app->bind('App\Contracts\Dao\User\ContactDaoInterface', 'App\Dao\User\ContactDao');

        // Contact(admin)
        $this->app->bind('App\Contracts\Services\Admin\ContactServiceInterface', 'App\Services\Admin\ContactService');
        $this->app->bind('App\Contracts\Dao\Admin\ContactDaoInterface', 'App\Dao\Admin\ContactDao');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
