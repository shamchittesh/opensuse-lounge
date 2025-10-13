<?php

declare(strict_types=1);

namespace App\Providers;

use App\Support\StrMixin;
use App\View\Composers\MemberComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Str::mixin(new StrMixin);
        View::composer('members.*', MemberComposer::class);
    }
}
