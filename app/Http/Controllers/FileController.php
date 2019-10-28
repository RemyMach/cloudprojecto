<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('downloadFile');
        $this->middleware('admin')->only(['create','store','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();

        $user = [];

        foreach ($files as $file){
            $adminPostFile = User::findOrFail($file->user_id);
            $user[$file->id]['name'] = $adminPostFile->name;
        }

        return view('files.index',["files" => $files,"user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributs = request()->validate([
            "description" => ["required","min:3"],
            "title" => ["required","min:5","string"],
        ]);
        // cache the file
        $file = $request->file('file');

        // Size of file : $file->getClientSize();

        $sizeFile = $file->getSize();

        $typeFile = $file->getMimeType();

        $name = str_replace(' ','_',$request->get('title'));


        // generate a new filename. getClientOriginalExtension() for the file extension
        $nameFile = $name . time() . '.' . $file->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('file', $nameFile);

        File::create([
            "user_id"       => auth()->user()->id,
            "name"          => $nameFile,
            "type"          => $typeFile,
            "size"          => $sizeFile,
            "description"   => $request->get('description'),
        ]);


        return redirect('files');
    }

    public function downloadFile(File $file){

        $pathToFile = storage_path() .'/app/file/' . $file->name;

        return response()->download($pathToFile);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();

        return back();
    }
}
