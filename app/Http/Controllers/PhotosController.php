<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use App\Photo;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $character=Character::findOrFail($id);
      return view ('createPhotos',[
        'character' => $character,
        'id' => $id
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $character_id)
    {
        $validatedData = $request->validate([
          'upload'=>'required|mimes:jpeg,bmp,png|max:6000'
        ]);
        $path = $request ->file('upload')->storePublicly('public/photos');
        $post = [
          'file_name' => $path,
          'character_id' => $character_id
        ];
        Photo::create($post);
        return redirect()->route('index');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          if (file_exists(storage_path('app/' .$photo->file_name))){
            unlink(storage_path('app/' .$photo->file_name));
            echo $photo." was deleted";
          }
          $photo->delete();
          return redirect()->back;
        }
}
