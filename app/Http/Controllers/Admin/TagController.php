<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id','DESC')->paginate(10);
        return view('auth.admin.tags.index',compact('tags'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        if ($tag) {
            alert()->html('Etiqueta','
        <p><strong>Nombre: </strong>'.$tag->name.'</p>
        <p><strong>slug: </strong>'.$tag->slug.'</p>','info')
        ->showConfirmButton('Cerrar','#3085d6');
        return back();
        }

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
        $tag = Tag::find($id);
        $name = $tag->name;
        $tag->fill($request->all())->save();
        if ($tag->fill($request->all())->save()) {
            toast( $name.' se actualizo a '.$tag->name.'','success','top-right');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = Tag::find($id);
        $tag = Tag::find($id)->delete();
        if ($tag){
            toast('la etiqueta '.$tags->name.' fue eliminada','success','top-right');
            return back();
        }
    }
}
