<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use App\Helpers\CharacterHelper;

class CharacterController extends Controller
{
  private $characterHelper;
  public function __construct(CharacterHelper $characterHelper){
    $this->characterHelper = $characterHelper;
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $characters = Character::all();
    return view ('showAll',[
      'characters' => $characters
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view ('createCharacters');

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validateRequest($request);
    $post = $request->except('_token');
    Character::create($post);

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
    $character = Character::findOrFail($id);
    return view('showCharacter',[
      'character' => $character,
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $character=Character::findOrFail($id);
    return view ('edit',[
      'character' => $character
    ]);
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
    $this->validateRequest($request, $id);
    $character=Character::findOrFail($id);
    $post=$request->except('_token');
    $character->update($post);
    return redirect()->to('/');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $character=Character::findOrFail($id);
    $this->characterHelper->deleteOne($character);
    return redirect()->route('index');
  }
  protected function validateRequest($request, $id=NULL)
  {
    $rules=[
      'name'=> 'required|max:255|unique:characters',
      'race'=>'required',
      'power_level'=>'required|numeric|max:10000',
      'description' => 'required'
    ];
    if($id!=NULL){
      $rules['name'].= ',name,'.$id.',id';
    }
    $request->validate($rules);
  }
}
