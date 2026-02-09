<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use Cloudinary\Cloudinary;

class UploadOldImagesToCloudinary extends Command
{
    protected $signature = 'upload:oldimages';
    protected $description = 'Upload old images from public/images to Cloudinary';

    public function handle()
    {
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);

        $articles = Article::whereNotNull('image')->get();

        foreach ($articles as $article) {
            // فقط المقالات اللي path ديالها محلي
            if (str_contains($article->image, 'images/')) {

                $localPath = public_path($article->image);

                if (file_exists($localPath)) {
                    $this->info('Uploading: ' . $article->image);

                    $result = $cloudinary->uploadApi()->upload($localPath, [
                        'folder' => 'articles'
                    ]);

                    $article->image = $result['secure_url'];
                    $article->save();

                    $this->info('Uploaded successfully: ' . $article->titre);
                } else {
                    $this->warn('File not found: ' . $article->image);
                }

            }
        }

        $this->info('All old images uploaded to Cloudinary!');
    }
}
