<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        return view('image.index', [
            'images' => Image::published()->latest()->paginate(15)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('image.create');
    }

    public function store(ImageRequest $request)
    {
        Image::create($request->getData());

        return to_route('images.index')->with('message', 'Image has been created successfully');
    }

    public function show(Image $image)
    {
        return view('image.show', [
            'image' => $image,
        ]);
    }

    public function edit($image)
    {
        return view('image.edit', [
            'image' => $image,
        ]);
    }

    public function update(Image $image, ImageRequest $request)
    {
        $image->update($request->getData());

        return to_route('images.index')->with('message', 'Image has been updated successfully');

    }

    public function destroy(Image $image)
    {
        $image->delete();

        return to_route('images.index')->with('message', 'Image has been deleted successfully');
    }
}
