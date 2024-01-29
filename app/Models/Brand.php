<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $brand, $image, $imageName, $imageUrl, $directory, $extension;

    public static function newBrand($request)
    {
        self::$image        = $request->file('image');
        self::$extension    = self::$image->getClientOriginalExtension();
        self::$imageName    = time().'.'.self::$extension;
        self::$directory    = 'upload/brand-image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     =self::$directory.self::$imageName;

        self::$brand = New Brand();
        self::$brand->name           =$request->name;
        self::$brand->description    =$request->description;
        self::$brand->image          =self::$imageUrl;
        self::$brand->status         = $request->status;
        self::$brand->save();
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);

        if ($request->file('image'))
        {
            if (file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }

            self::$image        = $request->file('image');
            self::$extension    = self::$image->getClientOriginalExtension();
            self::$imageName    = time().'.'.self::$extension;
            self::$directory    = 'upload/brand-image/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl     =self::$directory.self::$imageName;
        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }

        self::$brand->name           =$request->name;
        self::$brand->description    =$request->description;
        self::$brand->image          =self::$imageUrl;
        self::$brand->status         = $request->status;
        self::$brand->save();
    }

    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if (file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
}
