<?php

namespace App\Providers;

use App\Kingdom\Book;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Book::class, function () {
            return new Book();
        });
    }
}
