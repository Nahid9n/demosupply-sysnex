<?php


namespace App\Helpers;


use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ImageUpload
{
    public static function upload($image, string $path, ?int $width = null, ?int $height = null, ?string $oldImage = null): string
    {
        // 1. Validation Guard: Check if the input is actually valid before decoding
        if (!$image) {
            throw new \InvalidArgumentException("No valid image file provided for decoding.");
        }

        // 2. Force the file extension to be .webp
        $filename = Str::random(10) . '_' . time() . '.webp';
        $cleanPath = trim($path, '/');
        $dbPath = $cleanPath . '/' . $filename;
        $destinationPath = public_path($cleanPath);

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // 3. Read the image using Intervention v3
        // If $image is an UploadedFile, try passing getRealPath() if raw object fails
        $imageInput = ($image instanceof \Illuminate\Http\UploadedFile) ? $image->getRealPath() : $image;

        $img = Image::read($imageInput);

        // 4. Proper Intervention v3 resizing
        if ($width && $height) {
            // Strict resize to exact dimensions
            $img->resize($width, $height);
        } elseif ($width || $height) {
            // Smart scale maintaining aspect ratio
            $img->scale(width: $width, height: $height);
    }

        // 5. Save the image to the destination as WebP (Intervention v3 syntax)
        $img->toWebp()->save($destinationPath . '/' . $filename);

        // 6. Clean up old image if provided
        if ($oldImage && file_exists(public_path($oldImage))) {
            @unlink(public_path($oldImage));
        }

        return $dbPath;
    }
}
