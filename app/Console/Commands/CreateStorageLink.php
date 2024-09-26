<?php

// Creați o comandă Artisan personalizată (de exemplu, în app/Console/Commands/CreateStorageLink.php)

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateStorageLink extends Command
{
    protected $signature = 'storage:link-custom';
    protected $description = 'Create a custom storage link';

    public function handle()
    {
        $target = storage_path('app/public');
        $link = public_path('storage');

        if (File::exists($link)) {
            $this->error('The "public/storage" directory already exists.');
            return;
        }

        File::copyDirectory($target, $link);
        $this->info('The [public/storage] directory has been created and populated.');
    }
}