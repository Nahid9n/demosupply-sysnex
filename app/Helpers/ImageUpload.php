<?php


namespace App\Helpers;


use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ImageUpload
{
    public static function upload($image, string $path, ?int $width = null, ?int $height = null, ?string $oldImage = null): string
    {
        // 1. Force the file extension to be .webp
        $filename = Str::random(10) . '_' . time() . '.webp';
        $cleanPath = trim($path, '/');
        $dbPath = $cleanPath . '/' . $filename;
        $destinationPath = public_path($cleanPath);

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // 2. Read the image using Intervention v3
        $img = Image::read($image);

        // 3. Proper Intervention v3 resizing (replaces old v2 aspect ratio callbacks)
        if ($width && $height) {
            // Strict resize to exact dimensions
            $img->resize($width, $height);
        } elseif ($width || $height) {
            // Smart scale maintaining aspect ratio without stretching upward (upsizing)
            $img->scale(width: $width, height: $height);
    }

        // 4. Encode directly to WebP (default quality is 80) and save
        $img->toWebp(80)->save($destinationPath . '/' . $filename);

        // 5. Clean up old image if it exists
        if ($oldImage && file_exists(public_path($oldImage))) {
            @unlink(public_path($oldImage));
        }

        return $dbPath;
    }
}
