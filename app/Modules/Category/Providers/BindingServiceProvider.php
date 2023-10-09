<?php

namespace App\Modules\Category\Providers;

use App\Modules\Category\Repositories\CategoryRepository;
use App\Modules\Category\Repositories\CategoryRepositoryImplementation;
use App\Modules\Category\Services\CategoryService;
use App\Modules\Category\Services\CategoryServiceImplementation;
use Illuminate\Support\ServiceProvider;

class BindingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryService::class, CategoryServiceImplementation::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryImplementation::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
