<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class MinioController extends Controller
{
    public static function getAdminFileUrl($path)
    {
        $file_url = Storage::cloud()->temporaryUrl($path, \Carbon\Carbon::now()->addSecond(20));
        return $file_url;
    }

    public static function getUserShortFileUrl($path)
    {
        $file_url = Storage::cloud()->temporaryUrl($path, \Carbon\Carbon::now()->addSecond(2000));
        return $file_url;
    }

    public static function getUserMediumFileUrl($path)
    {
        $file_url = Storage::cloud()->temporaryUrl($path, \Carbon\Carbon::now()->addSecond(40));
        return $file_url;
    }

    public static function getUserLargeFileUrl($path)
    {
        $file_url = Storage::cloud()->temporaryUrl($path, \Carbon\Carbon::now()->addSecond(60));
        return $file_url;
    }

    public static function getClientProofFileUrl($path)
    {
        $file_url = Storage::cloud()->temporaryUrl($path, \Carbon\Carbon::now()->addSecond(180));
        return $file_url;
    }
}
