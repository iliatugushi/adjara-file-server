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
        $new = new File;
        $new->sakme_id = $request->sakme_id;
        $new->identifikator = $request->identifikator;
        $new->path = $request->path;
        $new->name = $request->name;
        $new->mime_type = $request->mime_type;
        $new->save();

        return redirect()->back();
    }

    public function index(Fond $fond)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('view_anaweris')) {
            return 'You Dont Have Permission';
        }
        $anaweris = Anaweri::where('fond_id', $fond->id)->get();
        return view('admin.anaweris.index', ['anaweris' => $anaweris, 'fond' => $fond]);
    }


    public function create(Fond $fond)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_anaweris')) {
            return 'You Dont Have Permission';
        }
        $mode = 'create';
        return view('admin.anaweris.create', ['mode' => $mode, 'fond' => $fond]);
    }

    public function store(Request $request)
    {
        $new = Anaweri::create($request->except(['_token', '_method',]));
        if ($new) {
            return redirect()->route('anaweris.index', ['fond' => $request->fond_id])->withSuccess('მონაცემი დაემატა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }


    public function edit(Anaweri $anaweri)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('edit_anaweris')) {
            return 'You Dont Have Permission';
        }
        $mode = 'edit';
        return view('admin.anaweris.create', ['anaweri' => $anaweri, 'mode' => $mode, 'fond' => $anaweri->fond]);
    }

    public function show(Anaweri $anaweri)
    {
        return view('admin.anaweris.show', ['anaweri' => $anaweri]);
    }

    public function update(Request $request, Anaweri $anaweri)
    {
        $update = $anaweri->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->back()->withSuccess('მონაცემი განახლდა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function destroy($id)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('delete_anaweris')) {
            return 'You Dont Have Permission';
        }
        $findItem = Anaweri::find($id);
        if ($findItem->delete()) {
            return redirect()->route('anaweris.index')->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }
}
