<?php

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Utils\ImageLocalStorage;
use App\Utils\ImageS3Storage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function () {
            $driver = env('IMAGE_STORAGE_DRIVER', 'local');

            return match ($driver) {
                's3' => new ImageS3Storage(),
                default => new ImageLocalStorage(),
            };
        });
    }
}