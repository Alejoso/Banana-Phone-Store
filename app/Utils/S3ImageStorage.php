<?php

namespace App\Utils;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3ImageStorage implements ImageStorage
{
    public function store(Request $request): ?string
    {
        if (!$request->hasFile('image')) {

            return null;
        }

        return $request->file('image')->store('phones', 's3');
    }

    public function url(?string $path): ?string
    {
        if (!$path) {
            
            return null;
        }

        return Storage::disk('s3')->temporaryUrl(
            $path,
            now()->addMinutes(30)
        );
    }
}