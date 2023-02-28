<?php

namespace App\Http\Controllers\Backend;

use App\Models\File;
use Illuminate\Http\Request;

/**
 * Class FileController.
 */
class FileController
{
    /**
     * @param App\Models\File $file
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(File $file)
    {
        $response = [];
        $response['name'] = $file->name;
        $response['size'] = $file->size;
        $response['mime'] = $file->mime;
        $response['path'] = \Storage::temporaryUrl($file['path'], \Carbon\Carbon::now()->addMinutes(5));

        return response()->json($response, 200);
    }

    /**
     * @param  DeleteRegulationRequest  $request
     * @param  App\Models\File  $regulation
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(Request $request, File $file)
    {
        \Storage::delete($file->path);
        $file->delete();

        return response()->json();
    }
}
