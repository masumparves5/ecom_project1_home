<?php


function getFileUrl($file, $directory)
{
    $extension = $file->getClientOriginalExtension();
    $fileName = rand(1000, 500000).'.'.$extension;
    $file->move($directory, $fileName);
    return $directory.$fileName;
}

function deleteFile($imageUrl)
{
    if (file_exists($imageUrl))
    {
        unlink($imageUrl);
    }
}
