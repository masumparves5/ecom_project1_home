<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory, $image, $imageUrl;



    public static function newSubCategory($request)
    {
        self::saveBasicInfo(New SubCategory(), $request, getFileUrl($request->file('image'), 'upload/subCategory-image/'));
    }


    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);

        if ($request->file('image'))
        {
            deleteFile(self::$subCategory->image);
            self::$imageUrl = getFileUrl($request->file('image'), 'upload/subCategory-image/');
        }
        else
        {
            self::$imageUrl = self::$subCategory->image;
        }
        self::saveBasicInfo(self::$subCategory, $request, self::$imageUrl);
    }


    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        deleteFile(self::$subCategory->image);
        self::$subCategory->delete();
    }


    private static function saveBasicInfo($subCategory, $request, $imageUrl)
    {
        $subCategory->category_id    = $request->category_id;
        $subCategory->name           = $request->name;
        $subCategory->description    = $request->description;
        $subCategory->image          = $imageUrl;
        $subCategory->status         = $request->status;
        $subCategory->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
