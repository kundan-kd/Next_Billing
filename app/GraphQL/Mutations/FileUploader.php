<?php

namespace App\GraphQL\Mutations;

use Illuminate\Http\UploadedFile;

class FileUploader
{
    public function uploadFile($_, array $args): string
    {
        /** @var UploadedFile $file */
        $file = $args['file'];

        // Validate the file if necessary
        // Store the file publicly
        $path = $file->storePublicly('uploads', 'public'); // stores in storage/app/public/uploads

        return asset("storage/{$path}"); // returns full URL to the file
    }
}
