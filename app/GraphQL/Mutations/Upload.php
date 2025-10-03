<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Storage;


class Upload
{
    /** @param  array{}  $args */
  public function __invoke($root, array $args)
    {
        $file = $args['file'];
        $path = $file->store('uploads', 'public');
        return Storage::url($path);
    }

}
