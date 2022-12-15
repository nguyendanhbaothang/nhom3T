<?php

namespace App\Providers;

use App\Repositories\Eloquents\CategoryRepository;
use Illuminate\Support\ServiceProvider;
/* ProducrService */
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\ProductService;

/* ProductRepository */
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Eloquents\ProductRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\CategoryService;
use App\Services\Interfaces\CategoryServiceInterface;

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
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);



        /* Binding Repositories*/
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
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
