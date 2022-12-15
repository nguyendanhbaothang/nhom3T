<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/* ProducrService */
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\ProductService;

/* ProductRepository */
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Eloquents\ProductRepository;

/* OrderService */
use App\Services\Interfaces\OrderServiceInterface;
use App\Services\OrderService;

/* OrderRepository */
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Eloquents\OrderRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(ProductServiceInterface::class, ProductService::class);



        /* Binding Repositories*/
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);




        $this->app->singleton(OrderServiceInterface::class, OrderService::class);



        /* Binding Repositories*/
        $this->app->singleton(OrderRepositoryInterface::class, OrderRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
