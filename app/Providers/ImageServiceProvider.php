<?php

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Utils\ImageLocalStorage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function () {
            return match (config('services.image_storage.driver', 'local')) {
                's3' => new S3ImageStorage(),
                default => new ImageLocalStorage(),
            };
        });
    }
}
