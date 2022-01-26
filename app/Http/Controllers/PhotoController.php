<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Content;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // dd($id);
        $content = Content::where('id',$id)->first();   // ini buat passing lagi di konten mana
        $photos = Photo::paginate(12);
        // $photos = Photo::where('content_id',$id)->get();
        return view('content',['content'=>$content], ['photos'=>$photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $content = Content::where('id',$id)->first(); // ini buat passing lagi di konten mana
        return view('addphoto',['content'=>$content]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // dd($id);
        $content = Content::where('id',$id)->first();
        $request->validate([
            'image' => 'required'
        ]);

        $image = $request->image;
        if($image!=null){
            $namafileasli = md5($image->getClientOriginalName());
            $ekstensi = $image->getClientOriginalExtension();
            $namaBaru = '/image/'.time().'-'.$namafileasli.'.'.$ekstensi;
            $path = $image->storeAs('', $namaBaru);
        }
        else{
            $namabaru = null;
        }
    
        $photo = Photo::create([
            'content_id' => $id,
            'image' => $namaBaru,
        ]);
    
        return redirect()->route('content.index', $content->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show($photo, $content)
    {
        $content = Content::where('id',$content)->first();
        $photo = Photo::where('id',$photo)->first();
        return view('show',['content'=>$content],['photo'=>$photo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($photo, $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($photo, $content)
    {
        // dd($id_content);
        
        $content = Content::where('id',$content)->first();
        $photo = Photo::where('id',$photo)->first();
        $photo->delete();
        return redirect()->route('content.index', $content->id);
        // return back();
    }
}
