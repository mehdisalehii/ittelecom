<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class RebuildImageSizes extends Command
{
    protected $signature = 'ittelecom:rebuild-images';
    protected $description = 'Rebuild images for different sizes';

    public function handle()
    {
        $sourcePath = storage_path('uploads/picture/post');
        $this->_traverseFolderAndResizeImages($sourcePath, 'post', 340, 170);
        $this->_traverseFolderAndResizeImages($sourcePath, 'post', 300, 300);
        $this->_traverseFolderAndResizeImages($sourcePath, 'post', 80, 80);
        $this->_traverseFolderAndResizeImages($sourcePath, 'post', 85, 42);
        $this->_traverseFolderAndResizeImages($sourcePath, 'post', 473, 288);
        $this->_traverseFolderAndResizeImages($sourcePath, 'post', 800, 400);
        $this->_traverseFolderAndResizeImages($sourcePath, 'post', 340, 150);
        $this->_traverseFolderAndResizeImages($sourcePath, 'post', 100, 100);
        $this->_traverseFolderAndResizeImages($sourcePath, 'post', 1600);
        $this->_traverseFolderAndResizeImages($sourcePath, 'post', 600);
        $sourcePath = storage_path('uploads/picture/product');
        $this->_traverseFolderAndResizeImages($sourcePath, 'product', 340, 170);
        $this->_traverseFolderAndResizeImages($sourcePath, 'product', 85, 42);
        $this->_traverseFolderAndResizeImages($sourcePath, 'product', 80, 80);
        $this->_traverseFolderAndResizeImages($sourcePath, 'product', 170, 170);
        $this->_traverseFolderAndResizeImages($sourcePath, 'product', 500, 500);
        $this->_traverseFolderAndResizeImages($sourcePath, 'product', 300, 300);
        $sourcePath = storage_path('assets/forum');
        $this->_traverseFolderAndResizeImages($sourcePath, 'assets-forum', 1600, 200);
        $this->_traverseFolderAndResizeImages($sourcePath, 'assets-forum', 280, 280);
        return Command::SUCCESS;
    }

    private function _traverseFolderAndResizeImages(string $sourcePath, string $destinationPrefix, int $width, ?int $height = null): void
    {
        if (empty($width)) {
            $destinationPath = public_path('generated/images/' . $destinationPrefix . '/h' . $height);
        } else if (empty($height)) {
            $destinationPath = public_path('generated/images/' . $destinationPrefix . '/w' . $width);
        } else {
            $destinationPath = public_path('generated/images/' . $destinationPrefix . '/' . $width . 'x' . $height);
        }
        // Create the destination directory if it doesn't exist
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }
        // Get all files in the source directory
        $files = File::files($sourcePath);
        foreach ($files as $file) {
            $filename = $file->getFilename();
            $extension = $file->getExtension();
            $newFilename = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
            $destinationFullPath = $destinationPath . '/' . $newFilename;
            if (File::exists($destinationFullPath)) {
                continue;
            } else {
                $image = Image::make($file->getPathname());
                // Resize the image
                if (empty($width) || empty($height)) {
                    $image->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else {
                    $image->fit($width, $height);
                }
                // Optimize the image
                $image->encode('webp', 30);
                $image->interlace(true);
                // Save the resized and optimized image to the destination path
                $image->save($destinationFullPath);
                $this->info('saved: ' . $destinationFullPath);
            }
        }
        $this->info('Images resized and optimized successfully!');
    }
}
