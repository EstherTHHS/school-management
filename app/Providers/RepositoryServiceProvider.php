<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Teacher\TeacherRepository;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Teacher\TeacherRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
    }
}
