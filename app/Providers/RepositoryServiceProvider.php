<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\Interfaces\ReaderRepositoryInterface;
use App\Repositories\ReaderRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ReaderRepositoryInterface::class, ReaderRepository::class);

    }
}
