<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/* ProducrService */
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\ProductService;

/* ProductRepository */
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Eloquents\ProductRepository;
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
