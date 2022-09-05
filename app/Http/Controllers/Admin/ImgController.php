<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['imgs'] = Img::orderBy('id', 'desc')->paginate(5);

        return view('admin.img.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.img.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
        ]);
        $path = $request->file('image')->store('/images');
        $img = new Img;
        $img->title = $request->title;
        $img->description = $request->description;
        $img->image = $path;
        $img->save();

        return redirect()->route('admin.img.index')
                        ->with('success', 'Img has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Img $img)
    {
        return view('admin.img.edit', compact('img'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $img = Img::find($id);
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = storage_path('app/'.$img->image);

            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image')->store('/images');
            $img->update([
                'title' => request()->title,
                'description' => request()->description,
                'image' => $image,
            ]);
        }

        return redirect()->route('admin.img.index')
                        ->with('success', 'Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Img::findOrFail($id);
        $imagePath = storage_path('app/'.$img->image);
        if (File::exists($imagePath)) {
            unlink($imagePath);
        }
        Img::where('id', $id)->delete();

        return redirect()->route('admin.img.index')
                        ->with('success', 'Image has been deleted successfully');
    }
}
