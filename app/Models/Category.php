<?php

namespace App\Models;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $image, $imageName, $imageUrl, $directory, $extension;

    private static function getImageUrl($image)
    {
        self::$extension    = $image->getClientOriginalExtension();
        self::$imageName    = time().'.'.self::$extension;
        self::$directory    = 'upload/category-image/';
        $image->move(self::$directory, self::$imageName);
        self::$imageUrl     =self::$directory.self::$imageName;
        return self::$imageUrl;
    }


    public static function newCategory($request)
    {
        self::saveBasicInfo(New Category(), $request, self::getImageUrl($request->file('image')));
    }


    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);

        if ($request->file('image'))
        {
            self::deleteImageFormFolder(self::$category->image);
            self::$imageUrl = self::getImageUrl($request->file('image'));
        }
        else
        {
            self::$imageUrl = self::$category->image;
        }
        self::saveBasicInfo(self::$category, $request, self::$imageUrl);
    }


    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        self::deleteImageFormFolder(self::$category->image);
        self::$category->delete();
    }


    private static function saveBasicInfo($category, $request, $imageUrl)
    {
        $category->name           = $request->name;
        $category->description    = $request->description;
        $category->image          = $imageUrl;
        $category->status         = $request->status;
        $category->save();
    }

    private static function deleteImageFormFolder($imageUrl)
    {
        if (file_exists($imageUrl))
        {
            unlink($imageUrl);
        }
    }
}
