<?php

use Illuminate\Support\Facades\File;

/**
 * undocumented class
 */
class FileService
{
    public function upload(File $file)
    {
    }

    public function getUrl(string $filename)
    {
        return \Storage::temporaryUrl($filename, \Carbon\Carbon::now()->addMinutes(5));
    }
}
