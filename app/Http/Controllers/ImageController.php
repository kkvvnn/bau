<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemAdapter;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class ImageController extends Controller
{
    public function show($path)
    {
        // dd(1);
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            // 'source' => $filesystem->getDriver(),
            'source' => 'storage/',
            // 'source_path_prefix' => 'public',
            // 'cache' => $filesystem->getDriver(),
            'cache' => 'storage/',
            'cache_path_prefix' => '.cache',
            'base_url' => 'img',
        ]);

        // dd($server->getImageResponse($path, request()->all()));
        return $server->getImageResponse($path, request()->all());
    }
}
