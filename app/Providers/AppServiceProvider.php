<?php
namespace App\Providers;
use App\Http\Middleware\ApiKeyMiddleware;
use App\Http\Controllers\CourseEvaluationController; // Hakikisha umeongeza hii
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\CourseController;
class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $router = $this->app->make('router');
        $router->aliasMiddleware('apiKey', ApiKeyMiddleware::class);

        Route::prefix('api')->group(function () {
            Route::middleware(['apiKey'])->group(function () {
                Route::post('/course-evaluations', [CourseEvaluationController::class, 'storeApi']);
                Route::get('/courses', [CourseController::class, 'api_index']);
               
            });
        });
    }
}