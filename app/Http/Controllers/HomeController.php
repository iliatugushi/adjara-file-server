<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\File;
use App\Models\Sakme;

class HomeController extends Controller
{

    public function startPage()
    {
        $sakmes = Sakme::all();
        $files = File::all();
        return view('welcome', ['sakmes' => $sakmes, 'files' => $files]);
    }
    public function sakmeNew(Request $request)
    {
        $new = new Sakme;
        $new->identifikator = $request->identifikator;
        $new->path = $request->path;
        $new->save();
        return redirect()->back();
    }

    public function fileNew(Request $request)
    {
        $sakme = Sakme::where('identifikator', $request->sakme_id)->first();

        foreach ($request->file('files') as $file) {
            $new = new File;
            $new->sakme_id = $sakme->identifikator;
            $new->identifikator = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $new->path = $sakme->path . '/' . $file->getClientOriginalName();
            $new->name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $new->mime_type = $file->getMimeType();
            $new->save();
        }

        return redirect()->back();
    }


    public function fileNewOLD(Request $request)
    {
        $new = new File;
        $new->sakme_id = $request->sakme_id;
        $new->identifikator = $request->identifikator;
        $new->path = $request->path;
        $new->name = $request->name;
        $new->mime_type = $request->mime_type;
        $new->save();

        return redirect()->back();
    }

    public function delete($element, $elementID)
    {

        if ($element === 'sakme') {
            $sakme = Sakme::findOrFail($elementID);
            $sakme->delete();
        }
        if ($element === 'file') {
            $sakme = File::findOrFail($elementID);
            $sakme->delete();
        }

        return redirect()->back();
    }
}
