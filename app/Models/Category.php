<?php

namespace App\Models;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $image, $imageName, $imageUrl, $directory, $extension;

    public static function newCategory($request)
    {
        self::$image        = $request->file('image');
        self::$extension    = self::$image->getClientOriginalExtension();
        self::$imageName    = time().'.'.self::$extension;
        self::$directory    = 'upload/category-image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     =self::$directory.self::$imageName;

        self::$category = New Category();
        self::$category->name           =$request->name;
        self::$category->description    =$request->description;
        self::$category->image          =self::$imageUrl;
        self::$category->status         = $request->status;
        self::$category->save();
    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);

        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }

            self::$image        = $request->file('image');
            self::$extension    = self::$image->getClientOriginalExtension();
            self::$imageName    = time().'.'.self::$extension;
            self::$directory    = 'upload/category-image/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl     =self::$directory.self::$imageName;
        }
        else
        {
            self::$imageUrl = self::$category->image;
        }

        self::$category->name           =$request->name;
        self::$category->description    =$request->description;
        self::$category->image          =self::$imageUrl;
        self::$category->status         = $request->status;
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }
}
