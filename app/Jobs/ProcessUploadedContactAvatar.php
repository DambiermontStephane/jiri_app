<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProcessUploadedContactAvatar implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {}

    /**
     * Execute the job.
     */

    public function handle(): void
    {
        $image = Image::read(Storage::disk('public'))
            ->resize(config('contactsavatars.sizes.width'), config('contactsavatars.sizes.height'));
        $sizes = config('contactsavatars.sizes');

        foreach ($sizes as $size) {
            // clone l'image
            $file_name = 'contact_' . uniqid() . "_'$size'. .jpg";
            $path = "contacts/$file_name";
        }


    }
}
