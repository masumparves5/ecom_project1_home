<?php

namespace App\Models;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $image, $imageUrl;

    public static function newCategory($request)
    {
        self::saveBasicInfo(New Category(), $request, getFileUrl($request->file('image'), 'upload/category-image/'));
    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);

        if (self::$image = $request->file('image'))
        {
            deleteFile(self::$category->image);
            self::$imageUrl = getFileUrl(self::$image, 'upload/category-image/');
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
        deleteFile(self::$category->image);
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

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
