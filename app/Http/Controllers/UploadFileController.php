<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use StdClass;

class UploadFileController extends Controller
{
    public function upload(Request $request)
    {
        $files = $request->file('file');
        $multiple = is_array($files);
        $response = $multiple ? [] : $this->packResponse($files);
        if ($multiple) {
            foreach ($files as $file) {
                $response[] = $this->packResponse($file);
            }
        }
        return response()->json($response);
    }

    private function packResponse(UploadedFile $file)
    {
        $json = new StdClass();
        $json->name = $file->getClientOriginalName();
        $json->mime = $file->getClientMimeType();
        $json->path = $file->storePubliclyAs('', $this->getPublicName($file), 'public');
        $json->url = asset('storage/' . $json->path);
        return $json;
    }

    private function getPublicName(UploadedFile $file)
    {
        if (!$file->guessExtension()) {
            return uniqid('', true) . '.' . $file->clientExtension();
        } else {
            return $file->hashName();
        }
    }

    /**
     * Upload an image and resize it
     *
     * @param Request $request
     *
     * @return array
     */
    public function uploadImage(Request $request)
    {
        $files = $request->file('file');
        $multiple = is_array($files);
        $response = $multiple ? [] : $this->packImageResponse($files);
        if ($multiple) {
            foreach ($files as $file) {
                $response[] = $this->packImageResponse($file);
            }
        }
        return response()->json($response);
    }

    private function packImageResponse(UploadedFile $file)
    {
        $json = new StdClass();
        $json->name = $file->getClientOriginalName();
        $json->mime = $file->getClientMimeType();
        $json->path = $file->storePubliclyAs('', $this->getPublicName($file), 'public');
        $json->path = $this->resize($json->path, 580);
        $json->url = asset('storage/' . $json->path);
        return $json;
    }

    private function resize($file, $targetHeight)
    {
        $filePath = \storage_path('app/public/' . $file);
        $target = "{$filePath}.webp";
        $size = getimagesize($filePath);
        $ratio = $size[0] / $size[1];
        $width = $targetHeight * $ratio;
        $height = $targetHeight;
        $dst = imagecreatetruecolor($width, $height);
        $src = imagecreatefromstring(file_get_contents($filePath));
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
        imagedestroy($src);
        imagewebp($dst, $target, 90);
        imagedestroy($dst);
        unlink($filePath);
        return basename($target);
    }
}
