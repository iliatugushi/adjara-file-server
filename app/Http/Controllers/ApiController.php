<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Sakme;
use App\Models\File;

class ApiController extends Controller
{
    public function getSakmeFiles(Request $request)
    {
        $records_per_page = $request->per_page;

        if ($request->current_page == 1) {
            $skip = 0;
            $counter = 0;
        } else {
            $skip = ($request->current_page - 1) * $request->per_page;
            $counter = ($request->current_page - 1) * $request->per_page;
        }

        $data = [];

        $files = File::where('sakme_id', $request->identifikator)->skip($skip)->take($records_per_page)->get();
        if (count($files) > 0) {
            foreach ($files as $item) {
                $content = Storage::disk('files_root')->path($item->path);
                $data[] = [
                    'index' => $counter,
                    'id' => $item->identifikator,
                    'identifikator' => $item->identifikator,
                    'mime_type' => $item->mime_type,
                    'name' => $item->name,
                    'file_base_64' => base64_encode(file_get_contents($content)),

                ];
                $counter++;
            }

            return response()->json([
                'result' => 'success',
                'data' => $data,
                'total' => $files->count() + $skip
            ]);
        }
    }

    public function getFile(Request $request)
    {
        // Find File
        $file = File::where('identifikator', $request->identifikator)->first();
        if (!$file) {
            return response()->json([
                'result' => 'error',
                'message' => 'Not Found'
            ]);
        }
        $content = Storage::disk('files_root')->path($file->path);
        if (!$content) {
            return response()->json([
                'result' => 'error',
                'message' => 'Not Found'
            ]);
        }
        return response()->json([
            'result' => 'success',
            'identifikator' => $file->identifikator,
            'mime_type' => $file->mime_type,
            'name' => $file->name,
            'file_base_64' => base64_encode(file_get_contents($content)),
        ]);
    }
}
