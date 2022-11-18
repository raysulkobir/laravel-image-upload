<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ImageUpload::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->apk->extension();
        // php artisan storage:link


        // Store Image in Storage Folder

        // $request->image->storeAs('images', $imageName);
        // storage/app/images/file.png


        // Store Image in Public Folder
        // $request->image->move(public_path('images'), $imageName);
        // public/images/file.png


        // $request->image->storeAs('images', $imageName, 's3');


        $imageUpload = new ImageUpload;
        $imageName = time() . '.' . $request->image->extension();
        $apkName = time() . '.' . $request->apk->extension();

        $request->image->storeAs('public/images', $imageName);
        $request->image->storeAs('public/images', $apkName);


        $imageUpload->image = "storage/images/" . $imageName;
        $imageUpload->apk = "storage/images/" . $apkName;

        $imageUpload->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function show(ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageUpload $imageUpload)
    {
        //
    }
}
