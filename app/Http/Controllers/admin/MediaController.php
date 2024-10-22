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

            $clientOriginalExtension = $request->file($inputName)->getClientOriginalExtension();

            $path = $request->file($inputName)->storeAs(date("Y"), md5(microtime()) . '.' . $clientOriginalExtension, ['disk' => 'public']);

            $realPath = storage_path('app/public/' . $path);

            $name = pathinfo($request->file($inputName)->getClientOriginalName(), PATHINFO_FILENAME);

            $size = File::size($realPath);

            $extension = File::extension($realPath);

            $mimeType = File::mimeType($realPath);

            $type = \App\Helpers\File::getFileTypeForMedia($mimeType);

            Media::create([
                'name' => $name,
                'address' => $path,
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
