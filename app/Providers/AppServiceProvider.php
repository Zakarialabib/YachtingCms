<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Language;
use App\Models\Setting;
use App\Models\Category;
use App\Models\City;

use App\Observers\SettingsObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        View::share('languages', $this->getLanguages());

        // $destinations = Cache::remember('destinations', 60 * 60, function () {
        //     return City::query()
        //         ->limit(10)
        //         ->get();
        // });

        // $popular_search_cities = Cache::remember('popular_search_cities', 60 * 60, function () {
        //     return City::query()
        //         ->inRandomOrder()
        //         ->limit(3)
        //         ->get();
        // });

        // $cat_menu = Category::query()
        // ->where('categories.type', Category::TYPE_OFFER)
        // ->get();
        // view::share('destinations');
        // view::share('popular_search_cities');
        // view::share('cat_menu');

        Setting::observe(SettingsObserver::class);

        // Model::shouldBeStrict(! $this->app->isProduction());
    }

    /** @return \App\Models\Language|\Illuminate\Database\Eloquent\Model|array|null */
    private function getLanguages()
    {
        if ( ! Schema::hasTable('languages')) {
            return;
        }

        return cache()->rememberForever('languages', function () {
            return Session::has('language')
                ? Language::pluck('name', 'code')->toArray()
                : Language::where('is_default', 1)->first();
        });
    }
}
