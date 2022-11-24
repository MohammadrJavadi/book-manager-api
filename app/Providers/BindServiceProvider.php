<?php

namespace App\Providers;

use App\Repositories\Author\AuthorCommandRepository;
use App\Repositories\Author\AuthorQueryRepository;
use App\Repositories\Book\BookCommandRepository;
use App\Repositories\Book\BookQueryRepository;
use App\Repositories\Category\CategoryCommandRepository;
use App\Repositories\Interfaces\Author\AuthorCommandRepositoryInterface;
use App\Repositories\Interfaces\Author\AuthorQueryRepositoryInterface;
use App\Repositories\Interfaces\Book\BookCommandRepositoryInterface;
use App\Repositories\Interfaces\Book\BookQueryRepositoryInterface;
use App\Repositories\Interfaces\Category\CategoryCommandRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    public function register()
    {
        //#region books
        $this->app->bind(BookCommandRepositoryInterface::class, BookCommandRepository::class);
        $this->app->bind(BookQueryRepositoryInterface::class, BookQueryRepository::class);
        //#endregion
        //#region authors
        $this->app->bind(AuthorCommandRepositoryInterface::class, AuthorCommandRepository::class);
        $this->app->bind(AuthorQueryRepositoryInterface::class, AuthorQueryRepository::class);
        //#endregion
        //#region categories
        $this->app->bind(CategoryCommandRepositoryInterface::class, CategoryCommandRepository::class);
        //#endregion
    }

    public function boot()
    {
    }
}
