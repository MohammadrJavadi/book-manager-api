<?php

namespace App\Providers;

use App\Repositories\Book\BookCommandRepository;
use App\Repositories\Interfaces\Book\BookCommandRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(BookCommandRepositoryInterface::class, BookCommandRepository::class);
    }

    public function boot()
    {
    }
}
