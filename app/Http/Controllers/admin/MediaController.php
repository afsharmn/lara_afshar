<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\site\Controller;
use App\Models\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{

    public function index()
    {
        return view('admin::media.index');
    }

    public function upload(Request $request)
    {

        try {

            DB::beginTransaction();

            $inputName = collect($request->all())
                ->filter(fn($item, $key) => str_contains($key, 'FilePond'))
                ->keys()
                ->first();

            $name = md5(microtime());

            $extension = $request->file($inputName)->extension();

            $address = $request->file($inputName)->storeAs(date("Y"), $name . '.' . $extension, ['disk' => 'public']);

            $realPath = storage_path('app/public/' . $address);

            $size = File::size($realPath);

            $extension = File::extension($realPath);

            $mimeType = File::mimeType($realPath);

            $type = \App\Helpers\File::getFileTypeForMedia($mimeType);

            Media::create([
                'address' => $address,
                'size' => $size,
                'extension' => $extension,
                'type' => $type,
                'location' => 'local',
            ]);

            DB::commit();

        } catch (Exception $exception) {

            DB::rollBack();

            return $exception->getMessage();

        }

        return 'done';

    }
}
