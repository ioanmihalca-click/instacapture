<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class CloudinaryService
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary(config('cloudinary.url'));
    }

    public function uploadImage($file, $folder = null)
    {
        $options = [
            'folder' => $folder,
        ];

        $result = $this->cloudinary->uploadApi()->upload($file->getRealPath(), $options);

        return $result;
    }

    public function getImageUrl($publicId, $options = [])
    {
        return $this->cloudinary->image($publicId)->toUrl($options);
    }
}