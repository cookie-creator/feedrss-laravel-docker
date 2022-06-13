<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageUploadHelper
{
    public function storeImage($url)
    {
        $fileName = pathinfo($url);

        $newFileName = $fileName['filename'].'_'.time().'.'.$fileName['extension'];

        $rs = Storage::disk('local')->put('public/files/'.$newFileName, file_get_contents($url));

        return ($rs) ? $newFileName : '';
    }

    /**
     * @param string imageName
     * @return string pathTofile
     */
    public function getImagePath($imageName)
    {
        return 'public/files/' . $imageName;
    }

    /**
     * @param string imageName
     * @return string urlToFile
     */
    public function getImageUrl($imageName)
    {
        return config('app.url') . 'storage/files/' . $imageName;
    }
}
