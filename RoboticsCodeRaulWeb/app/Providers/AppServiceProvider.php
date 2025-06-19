<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tshirts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        redirect()->setIntendedUrl('/login');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];

        foreach ($sizes as $size) {
            Tshirts::firstOrCreate(['tshirt_size' => $size]);
        }
    }
}
