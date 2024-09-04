<?php

namespace App\Services;

use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Transformation;

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

        // Check if $file is a string (file path) or an object
        $filePath = is_string($file) ? $file : $file->getRealPath();

        $result = $this->cloudinary->uploadApi()->upload($filePath, $options);

        return $result;
    }

    public function getImageUrl($publicId, $options = [])
    {
        $transformation = new Transformation();

        if (isset($options['width']) && isset($options['height'])) {
            if (isset($options['crop']) && $options['crop'] === 'fill') {
                $transformation->resize(Resize::fill($options['width'], $options['height'])->gravity(Gravity::auto()));
            } else {
                $transformation->resize(Resize::scale($options['width'], $options['height']));
            }
        } elseif (isset($options['width'])) {
            $transformation->resize(Resize::scale($options['width']));
        } elseif (isset($options['height'])) {
            $transformation->resize(Resize::scale()->height($options['height']));
        }

        return $this->cloudinary->image($publicId)->addTransformation($transformation)->toUrl();
    }
}