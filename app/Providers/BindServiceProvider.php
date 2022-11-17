<?php

namespace App\Providers;

use App\Repositories\Book\BookCommandRepository;
use App\Repositories\Book\BookQueryRepository;
use App\Repositories\Interfaces\Book\BookCommandRepositoryInterface;
use App\Repositories\Interfaces\Book\BookQueryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    public function register()
    {
        //#region books
        $this->app->bind(BookCommandRepositoryInterface::class, BookCommandRepository::class);
        $this->app->bind(BookQueryRepositoryInterface::class, BookQueryRepository::class);
        //#endregion
    }

    public function boot()
    {
    }
}
