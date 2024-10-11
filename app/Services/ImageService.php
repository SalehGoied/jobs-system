<?php

namespace App\Services;
use Intervention\Image\Laravel\Facades\Image;

class ImageService
{
    public function store($image, String $path = 'image')
    {
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension() ;
        $destinationPath = public_path().'/images' ;
        $image->move($destinationPath,$fileName);

        return 'images/'.$fileName;
        $path = $image->storeAs(
            'images',uniqid() . '.' . $image->getClientOriginalExtension()
          );
        return $path;
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $public_path = public_path('images/'.$path.'/' . $filename);

        if (!file_exists('images/'.$path)) {
            mkdir('images/'.$path, 666, true);
        }
        Image::make($image->getRealPath())->save($public_path);
        return 'images/'.$path.'/' . $filename;
    }
}
