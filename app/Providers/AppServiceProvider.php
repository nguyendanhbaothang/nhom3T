<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

/* Product */
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Eloquents\ProductRepository;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\ProductService;

/*Category*/
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\CategoryService;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Repositories\Eloquents\CategoryRepository;
/* OrderService */
use App\Services\Interfaces\OrderServiceInterface;
use App\Services\OrderService;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Eloquents\OrderRepository;

/*User*/
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserService;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquents\UserRepository;
/* Customer */
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Services\CustomerService;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Repositories\Eloquents\CustomerRepository;

/*Group*/
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Services\GroupService;
use App\Services\Interfaces\GroupServiceInterface;
use App\Repositories\Eloquents\GroupRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProductServiceInterface::class, ProductService::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);

        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);

        $this->app->singleton(OrderServiceInterface::class, OrderService::class);
        $this->app->singleton(OrderRepositoryInterface::class, OrderRepository::class);


        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);

        $this->app->singleton(CustomerServiceInterface::class, CustomerService::class);
        $this->app->singleton(CustomerRepositoryInterface::class, CustomerRepository::class);

        $this->app->singleton(GroupServiceInterface::class, GroupService::class);
        $this->app->singleton(GroupRepositoryInterface::class, GroupRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
