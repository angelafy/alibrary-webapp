<?php
namespace App\Providers;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Models\Keranjang;

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
    public function boot()
    {
        // Custom rendering for HTTP exceptions
        $this->app->bind(HttpResponseException::class, function ($app, $parameters) {
            $status = $parameters['status'] ?? 500;

            if ($status === 404) {
                return redirect()->route('not-found');
            }

            return response()->view('errors.500', [], 500);
        });

        View::composer('components.client-sidebar', function ($view) {
            $keranjang = Keranjang::where('user_id', Auth::id())->with('detailKeranjang.buku')->first();
            $totalDetailKeranjang = $keranjang && $keranjang->detailKeranjang ? $keranjang->detailKeranjang->count() : 0;
            $view->with('totalDetailKeranjang', $totalDetailKeranjang);
        });
        
    }
}
