<?php

namespace App\Utils;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): ?string
    {
        if ($request->hasFile('image')) {

            $path = $request->file('image')
                ->store('phones', 'public');

            return $path;
        }

        return null;
    }

    public function url(?string $path): ?string
    {
        if (!$path) {
            
            return null;
        }

        return asset('storage/' . $path);
    }
}
