<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    private static $productImage, $productImages, $image, $extension, $imageName, $directory, $imageUrl;

    private static function getImageUrl($image)
    {
        self::$extension    = $image->getClientOriginalExtension();
        self::$imageName    = rand(10000, 500000).'.'.self::$extension;
        self::$directory    = 'upload/product-other-images/';
        $image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newProductImage($images, $productId)
    {
        foreach ($images as $image)
        {
            self::$imageUrl = self::getImageUrl($image);

            self::$productImage = new ProductImage();
            self::$productImage->product_id = $productId;
            self::$productImage->image      = self::$imageUrl;
            self::$productImage->save();
        }
    }
    public static function updateProductImage($images, $id)
    {
        self::deleteProductImage($id);
        self::newProductImage($images, $id);
    }

    public static function deleteProductImage($id)
    {
        self::$productImages = ProductImage::where('product_id', $id) ->get();
        foreach (self::$productImages as $productImage)
        {
            if (file_exists($productImage->image))
            {
                unlink($productImage->image);
            }
            $productImage->delete();
        }
    }
}
