<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

final readonly class UploadProfilePhoto
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
         /** @var \Illuminate\Http\UploadedFile $file */
        $file = $args['file'];

        return $file->storePublicly('uploads');
    }
    
}
