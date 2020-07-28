<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class UploadHelper
{
    private static $mainImgWidth = 700;
    private static $mainImgHeight = 700;
    private static $midImgWidth = 400;
    private static $midImgHeight = 400;
    private static $thumbImgWidth = 200;
    private static $thumbImgHeight = 200;
    private static $tinyMCEImgWidth = 500;
    private static $tinyMCEImgHeight = 500;
    private static $destinationFolder = 'public/images/';
    private static $midFolder = 'storage/images/mid/';
    private static $thumbFolder = 'storage/images/thumb/';

    public static function upload($field, $destinationPath = '', $newName = '', $width = 0, $height = 0, $makeOtherSizesImages = true)
    {
        if ($width > 0 && $height > 0) {
            self::$mainImgWidth = $width;
            self::$mainImgHeight = $height;
        }
        if(!empty($destinationPath)){
            self::$destinationFolder .= $destinationPath;
        }
        $midImagePath = $destinationPath . self::$midFolder;
        $thumbImagePath = $destinationPath . self::$thumbFolder;

        $extension = $field->getClientOriginalExtension();
        $fileName = time() . '-' . rand(1, 999) . '.' . $extension;

        $field->storeAs(self::$destinationFolder, $fileName);
        $destinationPath = public_path('storage/images/'.$destinationPath. $fileName);
        /*         * **** Resizing Images ******** */
        $imageToResize = Image::make($destinationPath);

        $imageToResize->resize(self::$mainImgWidth, self::$mainImgHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($destinationPath);

        if ($makeOtherSizesImages === true) {
            $field->storeAs(self::$destinationFolder.'/mid', $fileName);
            $medPath = public_path($midImagePath. $fileName);
            $imageToResize->resize(self::$midImgWidth, self::$midImgHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($medPath);

            $field->storeAs(self::$destinationFolder.'/thumb', $fileName);
            $thumbPath = public_path($thumbImagePath. $fileName);
            $imageToResize->resize(self::$thumbImgWidth, self::$thumbImgHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($thumbPath);
            /*             * **** End Resizing Images ******** */
        }

        return $fileName;
    }
}
